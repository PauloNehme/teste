<?php

declare(strict_types=1);
/**
 * /src/Utils/LoginLogger.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Utils;

use BadMethodCallException;
use DeviceDetector\DeviceDetector;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Exception;
use SuppCore\AdministrativoBackend\Entity\LogLogin;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Repository\UsuarioRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class LoginLogger.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoginLogger implements LoginLoggerInterface
{
    private UsuarioRepository $usuarioRepository;

    private RequestStack $requestStack;

    private ?Usuario $user = null;

    private DeviceDetector $deviceDetector;

    protected EntityManagerInterface $entityManager;

    /**
     * LoginLogger constructor.
     *
     * @param UsuarioRepository      $usuarioRepository
     * @param RequestStack           $requestStack
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        UsuarioRepository $usuarioRepository,
        RequestStack $requestStack,
        EntityManagerInterface $entityManager
    ) {
        // Store used services
        $this->usuarioRepository = $usuarioRepository;
        $this->requestStack = $requestStack;
        $this->entityManager = $entityManager;
    }

    /**
     * Setter for Usuario object.
     *
     * @param UserInterface|Usuario|null $user
     *
     * @return LoginLoggerInterface
     *
     * @throws NonUniqueResultException
     */
    public function setUser(?UserInterface $user = null): LoginLoggerInterface
    {
        if (null !== $user) {
            // We need to make sure that Usuario object is right one
            $user = $user instanceof Usuario ? $user : $this->usuarioRepository->loadUserByUsername(
                $user->getUsername()
            );

            $this->user = $user;
        }

        return $this;
    }

    /**
     * @param string $type
     *
     * @throws Exception
     */
    public function process(string $type): void
    {
        // Get current request
        $request = $this->requestStack->getCurrentRequest();

        if (null === $request) {
            throw new BadMethodCallException('Could not get request from current request stack');
        }

        // Specify user agent
        /** @var string $agent */
        $agent = $request->headers->get('User-Agent');

        // Parse user agent data with device detector
        $this->deviceDetector = new DeviceDetector($agent);
        $this->deviceDetector->parse();

        // Create entry
        $this->createEntry($type, $request);
    }

    /**
     * @param string  $type
     * @param Request $request
     *
     * @throws Exception
     */
    private function createEntry(string $type, Request $request): void
    {
        /** @var LogLogin $entry */
        $entry = new LogLogin($type, $request, $this->deviceDetector, $this->user);
        //$this->entityManager->persist($entry);
        //$this->entityManager->flush();
    }
}
