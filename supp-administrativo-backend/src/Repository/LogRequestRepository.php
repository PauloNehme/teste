<?php

declare(strict_types=1);
/**
 * /src/Repository/LogRequestRepository.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Repository;

use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;
use SuppCore\AdministrativoBackend\Entity\LogRequest as Entity;

/**
 * Class LogRequestRepository.
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
class LogRequestRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected static string $entityName = Entity::class;

    /**
     * Helper method to clean history data from request_log table.
     *
     * @return int
     *
     * @throws Exception
     */
    public function cleanHistory(): int
    {
        // Determine date
        $date = new DateTime('now', new DateTimeZone('UTC'));
        $date->sub(new DateInterval('P3Y'));

        // Create query builder and define delete query
        $queryBuilder = $this
            ->createQueryBuilder('requestLog')
            ->delete()
            ->where('requestLog.date < :date')
            ->setParameter('date', $date->format('Y-m-d'));

        // Return deleted row count
        return (int) $queryBuilder->getQuery()->execute();
    }
}
