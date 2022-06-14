<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Triggers/Processo/Trigger0025.php.
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Triggers\Processo;

use Exception;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Processo;
use SuppCore\AdministrativoBackend\Api\V1\Triggers\Processo\Message\DownloadProcessoMessage;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Processo as ProcessoEntity;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use SuppCore\AdministrativoBackend\Triggers\TriggerInterface;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\RoleSecurityIdentity;
use Symfony\Component\Security\Acl\Model\AclProviderInterface;
use Symfony\Component\Security\Acl\Permission\BasicPermissionMap;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class Trigger0025.
 *
 * @descSwagger=Dispara processo de geração de download em segundo plano.
 * @classeSwagger=Trigger0025
 */
class Trigger0025 implements TriggerInterface
{
    /**
     * Trigger0025 constructor.
     * @param TransactionManager $transactionManager
     */
    public function __construct(private TransactionManager $transactionManager,
                                private TokenStorageInterface $tokenStorage)
    {
    }

    public function supports(): array
    {
        return [
            Processo::class => [
                'beforeDownload',
            ],
        ];
    }

    /**
     * @param Processo|RestDtoInterface|null $restDto
     * @param ProcessoEntity|EntityInterface $entity
     *
     * @throws Exception
     */
    public function execute(
        RestDtoInterface | Processo | null $restDto,
        EntityInterface | ProcessoEntity $entity,
        string $transactionId
    ): void {
        $message = new DownloadProcessoMessage(
            $entity->getUuid(),
            $this->transactionManager->getContext('tipoDownload', $transactionId)->getValue(),
            $this->tokenStorage->getToken()->getUsername(),
            $this->transactionManager->getContext('sequencial', $transactionId)->getValue(),
        );

        $this->transactionManager->addAsyncDispatch($message, $transactionId);
    }

    public function getOrder(): int
    {
        return 1;
    }
}
