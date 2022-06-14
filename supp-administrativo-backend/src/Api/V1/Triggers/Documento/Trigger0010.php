<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Triggers/Documento/Trigger0010.php.
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Triggers\Documento;

use Doctrine\ORM\EntityManagerInterface;
use SuppCore\AdministrativoBackend\Api\V1\DTO\VinculacaoEtiqueta;
use SuppCore\AdministrativoBackend\Api\V1\Resource\VinculacaoEtiquetaResource;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\Documento;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Triggers\TriggerInterface;

/**
 * Class Trigger0010.
 *
 * @descSwagger=Após restaurar documento, restaura a vinculacao da etiqueta caso exista!
 * @classeSwagger=Trigger0010
 */
class Trigger0010 implements TriggerInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private VinculacaoEtiquetaResource $vinculacaoEtiquetaResource
    ) {
    }

    public function supports(): array
    {
        return [
            Documento::class => [
                'afterUndelete',
            ],
        ];
    }

    /**
     * @param RestDtoInterface|null $restDto
     * @param EntityInterface       $entity
     * @param string                $transactionId
     */
    public function execute(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): void
    {
        if ($entity) {
            if (array_key_exists('softdeleteable', $this->entityManager->getFilters()->getEnabledFilters())) {
                $this->entityManager->getFilters()->disable('softdeleteable');
            }

            $vinculacaoEtiqueta = $this->vinculacaoEtiquetaResource->getRepository()->findOneBy([
                'objectClass' => 'SuppCore\\AdministrativoBackend\\Entity\\Documento',
                'objectUuid' => $entity->getUuid(),
                'tarefa' => $entity->getTarefaOrigem()
            ]);

            if ($vinculacaoEtiqueta) {
                $this->vinculacaoEtiquetaResource->undelete($vinculacaoEtiqueta->getId(), $transactionId);
            }

            if (array_key_exists('softdeleteable', $this->entityManager->getFilters()->getEnabledFilters())) {
                $this->entityManager->getFilters()->enable('softdeleteable');
            }
        }
    }

    public function getOrder(): int
    {
        return 1;
    }
}
