<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Resource/LogLoginFailureResource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Resource;

use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\LogLoginFailure as Entity;
use SuppCore\AdministrativoBackend\Repository\LogLoginFailureRepository as Repository;
use SuppCore\AdministrativoBackend\Rest\RestResource;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
/**
 * Class LogLoginFailureResource.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository  getRepository(): Repository
 * @method Entity[]    find(?array $criteria = null, ?array $orderBy = null, ?int $limit = null, ?int $offset = null, ?array $search = null): array
 * @method Entity|null findOne(int $id, ?bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity|null findOneBy(array $criteria, ?array $orderBy = null, ?bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity      create(RestDtoInterface $dto, ?bool $skipValidation = null): EntityInterface
 * @method Entity      update(int $id, RestDtoInterface $dto, ?bool $skipValidation = null): EntityInterface
 * @method Entity      delete(int $id, string $transactionId): EntityInterface
 * @method Entity      save(EntityInterface $entity, string $transactionId, ?bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class LogLoginFailureResource extends RestResource
{
    /** @noinspection MagicMethodsValidityInspection */

    /**
     * LogLoginFailureResource constructor.
     */
    public function __construct(Repository $repository, ValidatorInterface $validator)
    {
        $this->setRepository($repository);
        $this->setValidator($validator);
    }

    public function reset(UserInterface $usuario): void
    {
        /* @psalm-suppress UndefinedMethod */
        $this->getRepository()->clear($usuario);
    }
}
