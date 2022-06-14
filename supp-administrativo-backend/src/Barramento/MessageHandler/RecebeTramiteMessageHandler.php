<?php

declare(strict_types=1);

/**
 * /src/MessageHandler/RecebeTramiteMessageHandler.php.
 */

namespace SuppCore\AdministrativoBackend\Barramento\MessageHandler;

/*
 * Class RecebeTramiteMessageHandler
 *
 * @package SuppCore\AdministrativoBackend\Command\Barramento\MessageHandler
 */

use Exception;
use SuppCore\AdministrativoBackend\Barramento\Message\RecebeTramiteMessage;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoLogger;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoRecebeTramite;
use SuppCore\AdministrativoBackend\Barramento\Service\BarramentoSolicitacao;
use SuppCore\AdministrativoBackend\Transaction\Context;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Throwable;

/**
 * Classe responsável por realizar o processamento do job Recebe Tramite.
 */
class RecebeTramiteMessageHandler implements MessageHandlerInterface
{
    private BarramentoLogger $logger;

    private BarramentoSolicitacao $barramentoSolicitacao;

    private BarramentoRecebeTramite $barramentoRecebeTramite;

    private TransactionManager $transactionManager;

    /**
     * EnviaComponentesDigitaisMessageHandler constructor.
     */
    public function __construct(
        BarramentoLogger $logger,
        BarramentoSolicitacao $barramentoSolicitacao,
        BarramentoRecebeTramite $barramentoRecebeTramite,
        TransactionManager $transactionManager
    ) {
        $this->logger = $logger;
        $this->barramentoSolicitacao = $barramentoSolicitacao;
        $this->barramentoRecebeTramite = $barramentoRecebeTramite;
        $this->transactionManager = $transactionManager;
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function __invoke(RecebeTramiteMessage $recebeTramiteMessage)
    {
        $idt = $recebeTramiteMessage->getIdt();
        $transactionId = $this->transactionManager->begin();

        try {
            $this->transactionManager->addContext(
                new Context('criacaoProcessoBarramento', true),
                $transactionId
            );
            $this->barramentoRecebeTramite->receberTramite($idt, $transactionId);
            $this->transactionManager->commit($transactionId);
        } catch (Throwable $e) {
            $mensagem = strlen($e->getMessage()) < 255 ? $e->getMessage() : 'Não foi possível receber o processo.';
            // Rollback Transaction
            $this->barramentoSolicitacao->recusarTramite(
                $idt,
                99,
                $mensagem
            );
            $this->logger->critical("Falha no RecebeTramiteMessageHandler: {$e->getMessage()}  
            .' - '.{$e->getTraceAsString()}");
            $transactionId = $this->transactionManager->getCurrentTransactionId();
            if ($transactionId) {
                $this->transactionManager->resetTransaction($transactionId);
            }
            $this->transactionManager->clearManager();
            throw $e;
        }
    }
}
