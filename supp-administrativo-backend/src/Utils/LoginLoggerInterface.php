<?php

declare(strict_types=1);
/**
 * /src/Utils/LoginLoggerInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Utils;

use BadMethodCallException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use SuppCore\AdministrativoBackend\Repository\UsuarioRepository;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Interface LoginLogger.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface LoginLoggerInterface
{
    /**
     * LoginLoggerInterface constructor.
     *
     * @param UsuarioRepository      $usuarioRepository
     * @param RequestStack           $requestStack
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        UsuarioRepository $usuarioRepository,
        RequestStack $requestStack,
        EntityManagerInterface $entityManager
    );

    /**
     * Setter for User object.
     *
     * @param UserInterface|null $user
     *
     * @return LoginLoggerInterface
     *
     * @throws NonUniqueResultException
     */
    public function setUser(?UserInterface $user = null): self;

    /**
     * Method to handle login event.
     *
     * @param string $type
     *
     * @throws BadMethodCallException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws SuspiciousOperationException
     */
    public function process(string $type): void;
}
