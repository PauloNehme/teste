<?php

declare(strict_types=1);
/**
 * /src/Triggers/TriggersManager.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Triggers;

use Doctrine\ORM\Proxy\Proxy;
use Symfony\Component\Stopwatch\Stopwatch;
use function get_class;
use function in_array;
use function ksort;
use Psr\Log\LoggerInterface as Logger;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class TriggersManager.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class TriggersManager
{
    /**
     * @var TriggerInterface[]
     */
    protected array $triggersWrite = [];
    protected array $triggersRead = [];
    protected array $triggersConfig = [];
    private Logger $logger;
    private AuthorizationCheckerInterface $authorizationChecker;
    private TokenStorageInterface $tokenStorage;

    /**
     * @return TriggerInterface[]
     */
    public function getTriggersWrite(): array
    {
        return $this->triggersWrite;
    }

    /**
     * @return TriggerInterface[]
     */
    public function getTriggersRead(): array
    {
        return $this->triggersRead;
    }

    /**
     * TriggersManager constructor.
     *
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @param ParameterBagInterface         $params
     * @param Logger                        $resourceLogger
     * @param TokenStorageInterface         $tokenStorage
     */
    public function __construct(
        AuthorizationCheckerInterface $authorizationChecker,
        ParameterBagInterface $params,
        Logger $resourceLogger,
        TokenStorageInterface $tokenStorage,
        private Stopwatch $stopwatch
    ) {
        $this->authorizationChecker = $authorizationChecker;
        $this->triggersConfig = $params->get('triggers');
        $this->logger = $resourceLogger;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param TriggerInterface $trigger
     */
    public function addTrigger(TriggerInterface $trigger): void
    {
        if ($trigger instanceof TriggerReadInterface) {
            $this->triggersRead[$trigger->getOrder()][] = $trigger;
        } else {
            $this->triggersWrite[$trigger->getOrder()][] = $trigger;
        }
    }

    /**
     * @param RestDtoInterface|null $restDto
     * @param EntityInterface       $entity
     * @param string                $transactionId
     * @param string                $support
     */
    public function proccess(
        ?RestDtoInterface $restDto,
        EntityInterface $entity,
        string $transactionId,
        string $support
    ): void {
        if (null !== $restDto) {
            $className = get_class($restDto);
        } else {
            $isProxy = $entity instanceof Proxy;
            $className = $isProxy ? get_parent_class($entity) : get_class($entity);
        }

        ksort($this->triggersWrite);

        foreach ($this->triggersWrite as $triggerOrdered) {
            /** @var TriggerWriteInterface $trigger */
            foreach ($triggerOrdered as $trigger) {
                $supports = $trigger->supports();
                if (array_key_exists($className, $supports) &&
                    in_array($support, $supports[$className], true)) {
                    if ((('cli' === php_sapi_name()) && in_array('skipWhenCommand', $supports[$className])) ||
                        (('cli' !== php_sapi_name()) && $this->tokenStorage->getToken()
                            && $this->authorizationChecker->isGranted('ROLE_ROOT'))
                    ) {
                        continue;
                    }
                    $this->stopwatch->start($support.':'.get_parent_class($trigger));
                    $trigger->execute($restDto, $entity, $transactionId);
                    $this->stopwatch->stop($support.':'.get_parent_class($trigger));
                }
            }
        }
    }

    /**
     * @param string $className
     * @param array  $criteria
     * @param array  $orderBy
     * @param int    $limit
     * @param int    $offset
     * @param array  $populate
     * @param array  $result
     * @param string $support
     */
    public function proccessRead(
        string $className,
        array &$criteria,
        array &$orderBy,
        int &$limit,
        int &$offset,
        array &$populate,
        array &$result,
        string $support
    ): void {
        ksort($this->triggersRead);

        foreach ($this->triggersRead as $triggerOrdered) {
            /** @var TriggerReadInterface $trigger */
            foreach ($triggerOrdered as $trigger) {
                $supports = $trigger->supports();
                if (array_key_exists($className, $supports) &&
                    in_array($support, $supports[$className], true)) {
                    if ((('cli' === php_sapi_name()) && in_array('skipWhenCommand', $supports[$className])) ||
                        (('cli' !== php_sapi_name()) && $this->tokenStorage->getToken()
                            && $this->authorizationChecker->isGranted('ROLE_ROOT'))
                    ) {
                        continue;
                    }
                    $trigger->execute($criteria, $orderBy, $limit, $offset, $populate, $result);
                }
            }
        }
    }
}
