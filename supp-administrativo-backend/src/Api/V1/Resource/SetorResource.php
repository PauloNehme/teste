<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Resource/SetorResource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Resource;

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Processo;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Setor as SetorDTO;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Setor as Entity;
use SuppCore\AdministrativoBackend\Repository\ProcessoRepository;
use SuppCore\AdministrativoBackend\Repository\SetorRepository as Repository;
use SuppCore\AdministrativoBackend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class SetorResource.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository  getRepository(): Repository
 * @method Entity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method Entity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method Entity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method Entity      delete(int $id, string $transactionId): EntityInterface
 * @method Entity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class SetorResource extends RestResource
{
    /** @noinspection MagicMethodsValidityInspection */

    /**
     * SetorResource constructor.
     *
     * @param Repository         $repository
     * @param ValidatorInterface $validator
     * @param ProcessoRepository $processoRepository
     * @param ProcessoResource   $processoResource
     */
    public function __construct(
        private Repository $repository,
        private ValidatorInterface $validator,
        protected ProcessoRepository $processoRepository,
        protected ProcessoResource $processoResource
    ) {
        $this->setRepository($repository);
        $this->setValidator($validator);
        $this->setDtoClass(SetorDTO::class);
    }

    /**
     * Método que transfere os processos de um setor para o protocolo da unidade.
     *
     * @throws AnnotationException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws \ReflectionException
     */
    public function transferirProcessosSetorParaProtocolo(int $id, SetorDTO $setorDTO, string $transactionId): Entity
    {
        $setorEntity = $this->getReference($id);

        $this->beforeTransferirProcessosSetorParaProtocolo($id, $setorDTO, $setorEntity, $transactionId);

        $protocoloUnidade = $this->getRepository()->findProtocoloInUnidade($setorDTO->getUnidade());

        if ($setorDTO->getId() === $protocoloUnidade->getId()) {
            throw new \RuntimeException('Não é possível transferir os processo do setor PROTOCOLO.');
        }

        $processosSetor = $this->processoRepository->findBy(['setorAtual' => $setorEntity]);

        foreach ($processosSetor as $processoEntity) {
            $processoEntity->setSetorAtual($protocoloUnidade);

            $processoDTO = $this->processoResource->getDtoForEntity(
                $processoEntity->getId(),
                Processo::class,
                null,
                $processoEntity
            );

            $this->processoResource->update(
                $processoEntity->getId(),
                $processoDTO,
                $transactionId
            );
        }

        $this->afterTransferirProcessosSetorParaProtocolo($id, $setorDTO, $setorEntity, $transactionId);

        return $setorEntity;
    }

    public function beforeTransferirProcessosSetorParaProtocolo(
        int &$id,
        RestDtoInterface $dto,
        EntityInterface $entity,
        string $transactionId
    ): void {
        $this->rulesManager->proccess(
            $dto,
            $entity,
            $transactionId,
            'assertAfterTransferirProcessosSetorParaProtocolo'
        );
        $this->triggersManager->proccess(
            $dto,
            $entity,
            $transactionId,
            'beforeTransferirProcessosSetorParaProtocolo'
        );
        $this->rulesManager->proccess(
            $dto,
            $entity,
            $transactionId,
            'beforeTransferirProcessosSetorParaProtocolo'
        );
    }

    public function afterTransferirProcessosSetorParaProtocolo(
        int &$id,
        RestDtoInterface $dto,
        EntityInterface $entity,
        string $transactionId
    ): void {
        $this->triggersManager->proccess(
            $dto,
            $entity,
            $transactionId,
            'afterTransferirProcessosSetorParaProtocolo'
        );
    }
}
