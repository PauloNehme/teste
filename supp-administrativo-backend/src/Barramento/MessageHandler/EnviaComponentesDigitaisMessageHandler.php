<?php

declare(strict_types=1);

/**
 * /src/MessageHandler/EnviaComponentesDigitaisMessageHandler.php.
 */

namespace SuppCore\AdministrativoBackend\Barramento\MessageHandler;

use Exception;
use SuppCore\AdministrativoBackend\Barramento\Message\EnviaComponentesDigitaisMessage;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoEnviaComponenteDigital;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoLogger;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoSolicitacao;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Throwable;

/**
 * Class EnviaComponentesDigitaisMessageHandler.
 */
class EnviaComponentesDigitaisMessageHandler implements MessageHandlerInterface
{
    private BarramentoLogger $logger;

    private BarramentoEnviaComponenteDigital $barramentoEnvioComponente;

    private BarramentoSolicitacao $barramentoSolicitacao;

    private TransactionManager $transactionManager;

    /**
     * EnviaComponentesDigitaisMessageHandler constructor.
     * @param BarramentoLogger $logger
     * @param BarramentoSolicitacao $barramentoSolicitacao
     * @param BarramentoEnviaComponenteDigital $enviaComponenteDigital
     * @param TransactionManager $transactionManager
     */
    public function __construct(
        BarramentoLogger $logger,
        BarramentoSolicitacao $barramentoSolicitacao,
        BarramentoEnviaComponenteDigital $enviaComponenteDigital,
        TransactionManager $transactionManager
    ) {
        $this->logger = $logger;
        $this->barramentoSolicitacao = $barramentoSolicitacao;
        $this->barramentoEnvioComponente = $enviaComponenteDigital;
        $this->transactionManager = $transactionManager;
    }

    /**
     * @throws Exception
     */
    public function __invoke(EnviaComponentesDigitaisMessage $enviaComponentesDigitaisMessage)
    {
        $idt = $enviaComponentesDigitaisMessage->getIdt();
        $transactionId = $this->transactionManager->begin();

        try {
            $this->barramentoEnvioComponente->enviaComponentesDigitais($idt, $transactionId);
            $this->transactionManager->commit($transactionId);
        } catch (Throwable $e) {
            $this->logger->critical("Falha no EnviaComponentesDigitaisMessageHandler: {$e->getMessage()}");
            $this->barramentoSolicitacao->cancelaTramite($idt);
            $transactionId = $this->transactionManager->getCurrentTransactionId();
            if ($transactionId) {
                $this->transactionManager->resetTransaction($transactionId);
            }
            $this->transactionManager->clearManager();
            throw $e;
        }
    }
}
