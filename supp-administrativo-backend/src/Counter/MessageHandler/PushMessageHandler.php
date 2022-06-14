<?php

declare(strict_types=1);
/**
 * /src/Counter/MessageHandler/PushMessageHandler.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Counter\MessageHandler;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use SuppCore\AdministrativoBackend\Counter\Message\PushMessage;
use SuppCore\AdministrativoBackend\Rest\RestResource;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Throwable;

/**
 * Class NotificacaoMessageHandler.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class PushMessageHandler implements MessageHandlerInterface
{
    private PublisherInterface $publisher;
    private ContainerInterface $container;
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    /**
     * PushMessageHandler constructor.
     *
     * @param PublisherInterface     $publisher
     * @param ContainerInterface     $container
     * @param EntityManagerInterface $entityManager
     * @param LoggerInterface        $logger
     */
    public function __construct(
        PublisherInterface $publisher,
        ContainerInterface $container,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ) {
        $this->publisher = $publisher;
        $this->container = $container;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    /**
     * @param PushMessage $message
     */
    public function __invoke(PushMessage $message)
    {
        try {
            /** @var RestResource $resource */
            $resource = $this->container->get($message->getResource());

            if ($message->getDesabilitaSoftDeleteable()) {
                if (array_key_exists('softdeleteable', $this->entityManager->getFilters()->getEnabledFilters())) {
                    $this->entityManager->getFilters()->disable('softdeleteable');
                }
            }

            $count = $resource->count(
                $message->getCriteria()
            );

            if ($message->getDesabilitaSoftDeleteable()) {
                if (!array_key_exists('softdeleteable', $this->entityManager->getFilters()->getEnabledFilters())) {
                    $this->entityManager->getFilters()->enable('softdeleteable');
                }
            }

            $update = new Update(
                $message->getChannel(),
                json_encode(
                    [
                        'counter' => [
                            'identifier' => $message->getIdentifier(),
                            'count' => $count,
                        ],
                    ]
                )
            );

            // The Publisher service is an invokable object
            $this->publisher->__invoke($update);
        } catch (Throwable $t) {
            $this->logger->critical($t->getMessage().' - '.$t->getTraceAsString());
        }
    }
}
