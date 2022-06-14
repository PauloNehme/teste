<?php

declare(strict_types=1);
/**
 * /src/Security/UserProvider.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Security;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use function get_class;
use function is_subclass_of;
use function sprintf;
use SuppCore\AdministrativoBackend\Entity\Usuario as Entity;
use SuppCore\AdministrativoBackend\Repository\Traits\LoadUserByUserNameTrait;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserProvider.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class UserProvider extends EntityRepository implements UserProviderInterface, UserLoaderInterface
{
    // Traits
    use LoadUserByUserNameTrait;

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be totally reloaded (e.g. from the database),
     * or if the UserInterface object can just be merged into some internal array of users / identity map.
     *
     * @param UserInterface $user
     *
     * @return Entity
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     * @throws UnsupportedUserException
     */
    public function refreshUser(UserInterface $user): Entity
    {
        $class = get_class($user);

        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instance of "%s" is not supported.', $class));
        }

        $output = $this->loadUserByUsername($user->getUsername());

        if (null === $output) {
            throw new NoResultException();
        }

        return $output;
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class): bool
    {
        return $class === $this->getEntityName() || is_subclass_of($class, $this->getEntityName());
    }
}
