<?php

declare(strict_types=1);
/**
 * /src/Mercure/MessageHandler/PushMessageHandler.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Mercure\MessageHandler;

use Psr\Log\LoggerInterface;
use SuppCore\AdministrativoBackend\Mercure\Message\PushMessage;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Throwable;

/**
 * Class PushMessageHandler.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class PushMessageHandler implements MessageHandlerInterface
{
    private PublisherInterface $publisher;
    private LoggerInterface $logger;

    /**
     * PushMessageHandler constructor.
     *
     * @param PublisherInterface $publisher
     * @param LoggerInterface    $logger
     */
    public function __construct(
        PublisherInterface $publisher,
        LoggerInterface $logger
    ) {
        $this->publisher = $publisher;
        $this->logger = $logger;
    }

    /**
     * @param PushMessage $message
     */
    public function __invoke(PushMessage $message)
    {
        try {
            $update = new Update(
                $message->getChannel(),
                json_encode(
                    $message->getMessage()
                )
            );

            // The Publisher service is an invokable object
            $this->publisher->__invoke($update);
        } catch (Throwable $t) {
            $this->logger->critical($t->getMessage().' - '.$t->getTraceAsString());
        }
    }
}
