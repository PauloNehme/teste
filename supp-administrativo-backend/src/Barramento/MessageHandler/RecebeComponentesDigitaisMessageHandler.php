<?php

declare(strict_types=1);

/**
 * /src/MessageHandler/RecebeComponentesDigitaisMessageHandler.php.
 */

namespace SuppCore\AdministrativoBackend\Barramento\MessageHandler;

use Exception;
use SuppCore\AdministrativoBackend\Barramento\Message\RecebeComponentesDigitaisMessage;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoLogger;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoRecebeComponenteDigital;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoSolicitacao;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Throwable;

/**
 * Class RecebeComponentesDigitaisMessageHandler.
 */
class RecebeComponentesDigitaisMessageHandler implements MessageHandlerInterface
{
    private BarramentoLogger $logger;

    private BarramentoSolicitacao $barramentoSolicitacao;

    private BarramentoRecebeComponenteDigital $barramentoRecebeComponenteDigital;

    private TransactionManager $transactionManager;

    /**
     * RecebeComponentesDigitaisMessageHandler constructor.
     * @param BarramentoLogger $logger
     * @param BarramentoSolicitacao $barramentoSolicitacao
     * @param BarramentoRecebeComponenteDigital $barramentoRecebeComponenteDigital
     * @param TransactionManager $transactionManager
     */
    public function __construct(
        BarramentoLogger $logger,
        BarramentoSolicitacao $barramentoSolicitacao,
        BarramentoRecebeComponenteDigital $barramentoRecebeComponenteDigital,
        TransactionManager $transactionManager
    ) {
        $this->logger = $logger;
        $this->barramentoSolicitacao = $barramentoSolicitacao;
        $this->barramentoRecebeComponenteDigital = $barramentoRecebeComponenteDigital;
        $this->transactionManager = $transactionManager;
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function __invoke(RecebeComponentesDigitaisMessage $recebeComponentesDigitaisMessageHandler)
    {
        $idt = $recebeComponentesDigitaisMessageHandler->getIdt();
        $transactionId = $this->transactionManager->begin();

        try {
            $this->barramentoRecebeComponenteDigital->receberComponentesDigitais($idt, $transactionId);
            $this->transactionManager->commit($transactionId);
        } catch (Throwable $e) {
            // Rollback Transaction
            $this->barramentoSolicitacao->recusarTramite(
                $idt,
                99,
                'Erro ao receber os componentes digitais no super.br'
            );
            $this->logger->critical("Falha no RecebeComponentesDigitaisMessageHandler: 
            {$e->getMessage()}.' - '.{$e->getTraceAsString()}");
            $transactionId = $this->transactionManager->getCurrentTransactionId();
            if ($transactionId) {
                $this->transactionManager->resetTransaction($transactionId);
            }
            $this->transactionManager->clearManager();

            //cria uma nova transacao apenas para o catch
            $transactionIdCatch = $this->transactionManager->begin();
            $this->barramentoRecebeComponenteDigital->alteraStatusSincronizacao(2, $transactionIdCatch);
            $this->transactionManager->commit($transactionIdCatch);
            throw $e;
        }
    }
}
