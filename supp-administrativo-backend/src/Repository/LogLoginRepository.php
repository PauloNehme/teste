<?php

declare(strict_types=1);
/**
 * /src/Repository/LogLoginRepository.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Repository;

use SuppCore\AdministrativoBackend\Entity\LogLogin as Entity;

/**
 * Class LogLoginRepository.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Entity|null find(int $id, ?string $lockMode = null, ?string $lockVersion = null)
 * @method Entity|null findOneBy(array $criteria, ?array $orderBy = null)
 * @method Entity[]    findBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null)
 * @method Entity[]    findByAdvanced(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null, ?array $search = null): array
 * @method Entity[] findAll()
 *
 * @codingStandardsIgnoreEnd
 */
class LogLoginRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected static string $entityName = Entity::class;
}
