<?php

declare(strict_types=1);
/**
 * /src/Repository/Traits/LoadUserByUserNameTrait.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Repository\Traits;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use SuppCore\AdministrativoBackend\Entity\Usuario as Entity;

/**
 * Trait LoadUserByUserNameTrait.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method QueryBuilder createQueryBuilder(string $alias = null, string $indexBy = null): QueryBuilder
 */
trait LoadUserByUserNameTrait
{
    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not found.
     *
     * Method is override for performance reasons see link below.
     *
     * @see http://symfony2-document.readthedocs.org/en/latest/cookbook/security/entity_provider.html
     *       #managing-roles-in-the-database
     *
     * @psalm-suppress ImplementedReturnTypeMismatch
     *
     * @param string $username The username
     *
     * @return Entity|null
     *
     * @throws NonUniqueResultException
     */
    public function loadUserByUsername($username): ?Entity
    {
        // Build query
        $query = $this
            ->createQueryBuilder('u')
            ->select('u, g')
            ->leftJoin('u.vinculacoesRoles', 'g')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}
