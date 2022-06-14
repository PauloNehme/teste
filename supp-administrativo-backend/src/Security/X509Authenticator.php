<?php

declare(strict_types=1);
/**
 * /src/Security/X509Authenticator.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Security;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use phpseclib3\File\X509;
use Psr\Log\LoggerInterface;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario as UsuarioDTO;
use SuppCore\AdministrativoBackend\Api\V1\Resource\UsuarioResource;
use SuppCore\AdministrativoBackend\Entity\Usuario as UsuarioEntity;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

/**
 * Class X509Authenticator.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class X509Authenticator implements AuthenticatorInterface
{
    private UsuarioResource $usuarioResource;
    private TransactionManager $transactionManager;
    private RolesService $rolesService;
    private LoggerInterface $logger;

    /**
     * X509Authenticator constructor.
     *
     * @param UsuarioResource          $usuarioResource
     * @param TransactionManager       $transactionManager
     * @param RolesService             $rolesService
     * @param EventDispatcherInterface $eventDispatcher
     * @param LoggerInterface          $logger
     */
    public function __construct(
        UsuarioResource $usuarioResource,
        TransactionManager $transactionManager,
        RolesService $rolesService,
        EventDispatcherInterface $eventDispatcher,
        LoggerInterface $logger
    ) {
        $this->usuarioResource = $usuarioResource;
        $this->transactionManager = $transactionManager;
        $this->rolesService = $rolesService;
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function supports(Request $request): bool
    {
        return $request->server->has('HTTP_SSL_CLIENT_CERT');
    }

    /**
     * @param Request                      $request
     * @param AuthenticationException|null $authException
     *
     * @return JsonResponse
     */
    public function start(Request $request, ?AuthenticationException $authException = null): JsonResponse
    {
        $data = [
            'message' => 'Authentication Required',
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentials(Request $request)
    {
        $x509 = new X509();
        $this->logger->critical(print_r($request->server->all(), true));
        $c = $x509->loadX509(urldecode($request->server->get('HTTP_SSL_CLIENT_CERT')));

        $cn = null;
        $username = null;
        $nome = null;
        $email = null;

        // cn
        if (isset($c['tbsCertificate']['subject']['rdnSequence'])) {
            foreach ($c['tbsCertificate']['subject']['rdnSequence'] as $rdnSequence) {
                foreach ($rdnSequence as $sequence) {
                    foreach ($sequence as $sequence2) {
                        if (isset($sequence2['type']['id-at-commonName']) &&
                            isset($sequence2['value']['utf8String'])) {
                            $cn = $sequence2['value']['utf8String'];
                            $nome = explode(':', $cn)[0];
                        }
                    }
                }
            }
        }

        // cpf
        if (isset($c['tbsCertificate']['extensions'])) {
            foreach ($c['tbsCertificate']['extensions'] as $extension) {
                if (isset($extension['extnValue'])) {
                    foreach ($extension['extnValue'] as $extensionValue) {
                        if (isset($extensionValue['otherName']['type-id']) &&
                            isset($extensionValue['otherName']['value']['octetString']) &&
                            (('2.16.76.1.3.1' === $extensionValue['otherName']['type-id']) ||
                                ('2.16.76.1.3.4' === $extensionValue['otherName']['type-id']))) {
                            $username =
                                substr($extensionValue['otherName']['value']['octetString'], 8, 11);
                            $email = $username.'@inexistente.com';
                        }
                    }
                }
            }
        }

        // cnpj
        if (isset($c['tbsCertificate']['extensions'])) {
            foreach ($c['tbsCertificate']['extensions'] as $extension) {
                if (isset($extension['extnValue'])) {
                    foreach ($extension['extnValue'] as $extensionValue) {
                        if (isset($extensionValue['otherName']['type-id']) &&
                            isset($extensionValue['otherName']['value']['octetString']) &&
                            ('2.16.76.1.3.3' === $extensionValue['otherName']['type-id'])) {
                            $username =
                                substr($extensionValue['otherName']['value']['octetString'], 0, 14);
                            $email = $username.'@inexistente.com';
                        }
                    }
                }
            }
        }

        return [
            'username' => $username,
            'nome' => $nome,
            'email' => $email,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        return $credentials['username'] === $user->getUsername();
    }

    /**
     * {@inheritdoc}
     */
    public function getUser($credentials, UserProviderInterface $userProvider): ?UserInterface
    {
        try {
            $usuario = $userProvider->loadUserByUsername($credentials['username']);
        } catch (UsernameNotFoundException) {
            $usuario = $this->createUsuario($credentials);
        }

        return $usuario;
    }

    /**
     * @param $username
     * @param $credentials
     *
     * @return UsuarioEntity
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    private function createUsuario($credentials): UsuarioEntity
    {
        $usuarioDTO = new UsuarioDTO();
        $usuarioDTO->setUsername($credentials['username']);
        $usuarioDTO->setEmail($credentials['email']);
        $usuarioDTO->setNome($credentials['nome']);
        $usuarioDTO->setEnabled(true);

        $strongPassword = $this->usuarioResource->generateStrongPassword();
        $usuarioDTO->setPlainPassword($strongPassword);

        $transactionId = $this->transactionManager->begin();
        $usuario = $this->usuarioResource->create($usuarioDTO, $transactionId);
        $this->transactionManager->commit($transactionId);

        return $usuario;
    }

    /**
     * {@inheritdoc}
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): JsonResponse
    {
        $data = [
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData()),
        ];

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    public function supportsRememberMe(): bool
    {
        return false;
    }

    /**
     * Shortcut to create a PostAuthenticationGuardToken for you, if you don't really
     * care about which authenticated token you're using.
     *
     * @return PostAuthenticationGuardToken
     */
    public function createAuthenticatedToken(UserInterface $user, string $providerKey)
    {
        $token = new PostAuthenticationGuardToken(
            $user,
            $providerKey,
            $this->rolesService->getContextualRoles($user)
        );

        $token->setAttribute('trusted', 'x509');

        return $token;
    }
}
