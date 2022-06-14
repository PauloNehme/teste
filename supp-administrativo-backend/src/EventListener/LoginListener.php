<?php

declare(strict_types=1);
/**
 * /src/EventListener/AclListener.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Security\RolesServiceInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Class LoginListener.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoginListener
{
    /**
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface $session
     * @param RolesServiceInterface $rolesService
     * @param JWTEncoderInterface $jwtEncoder
     */
    public function __construct(private TokenStorageInterface $tokenStorage,
                                private SessionInterface $session,
                                private RolesServiceInterface $rolesService,
                                private JWTEncoderInterface $jwtEncoder) {
    }

    /**
     * Invoked after a successful login.
     *
     * @param InteractiveLoginEvent $event The event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        /** @var Usuario $usuario */
        $usuario = $event->getAuthenticationToken()->getUser();
        $roles = $this->rolesService->getContextualRoles($usuario);

        $token = $event->getAuthenticationToken();
        if ($token->hasAttribute('trusted')) {
            $roles[] = 'ROLE_'.mb_strtoupper($token->getAttribute('trusted'));
            $usuario->setValidado(true);
        }

        $providerKey = $token?->getProviderKey();

        // comes from refresh token, maintain initial auth provider key
        if ($token instanceof JWTUserToken) {
            $providerKey = ($this->jwtEncoder->decode($token->getCredentials()) ?? [])['authProviderKey'];
        }

        if ($usuario instanceof Usuario) {
            $newToken = new UsernamePasswordToken(
                $usuario,
                $providerKey,
                $roles
            );
            if ($token->hasAttribute('trusted')) {
                $newToken->setAttribute('trusted', $token->getAttribute('trusted'));
            }

            $this->tokenStorage->setToken($newToken);

            $this->session->set('_security_main', serialize($newToken));
        }
    }
}
