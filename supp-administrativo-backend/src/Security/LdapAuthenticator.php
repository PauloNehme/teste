<?php

declare(strict_types=1);
/**
 * /src/Security/LdapAuthenticator.php.
 */

namespace SuppCore\AdministrativoBackend\Security;

use Exception;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario as UsuarioDTO;
use SuppCore\AdministrativoBackend\Api\V1\Resource\UsuarioResource;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

/**
 * Class LdapAuthenticator.
 */
class LdapAuthenticator implements AuthenticatorInterface
{
    private LdapService $ldapService;
    private UsuarioResource $usuarioResource;
    private TransactionManager $transactionManager;
    private RolesService $rolesService;
    private EncoderFactoryInterface $userPasswordEncoder;
    private string $username;

    /**
     * LdapAuthenticator constructor.
     *
     * @param LdapService             $ldapService
     * @param UsuarioResource         $usuarioResource
     * @param TransactionManager      $transactionManager
     * @param RolesService            $rolesService
     * @param EncoderFactoryInterface $userPasswordEncoder
     */
    public function __construct(
        LdapService $ldapService,
        UsuarioResource $usuarioResource,
        TransactionManager $transactionManager,
        RolesService $rolesService,
        EncoderFactoryInterface $userPasswordEncoder
    ) {
        $this->ldapService = $ldapService;
        $this->usuarioResource = $usuarioResource;
        $this->transactionManager = $transactionManager;
        $this->rolesService = $rolesService;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @return LdapService
     */
    public function getLdapService(): LdapService
    {
        return $this->ldapService;
    }

    /**
     * @return UsuarioResource
     */
    protected function getUsuarioResource(): UsuarioResource
    {
        return $this->usuarioResource;
    }

    /**
     * @return TransactionManager
     */
    protected function getTransactionManager(): TransactionManager
    {
        return $this->transactionManager;
    }

    /**
     * @return RolesService
     */
    protected function getRolesService(): RolesService
    {
        return $this->rolesService;
    }

    /**
     * @return EncoderFactoryInterface
     */
    public function getUserPasswordEncoder(): EncoderFactoryInterface
    {
        return $this->userPasswordEncoder;
    }

    /**
     * Método de inicialização do authenticator.
     *
     * @param Request                      $request
     * @param AuthenticationException|null $authException
     *
     * @return Response
     */
    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        $data = [
            'message' => 'Authentication Required',
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Verifica se o autenticador é suportado.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function supports(Request $request): bool
    {
        return $request->get('username')
            && $request->get('password');
    }

    /**
     * Retorna as credenciais do usuário.
     *
     * @param Request $request
     *
     * @return array
     */
    public function getCredentials(Request $request): ?array
    {
        if (!$request->get('username') || !$request->get('password')) {
            return null;
        }

        $this->username = $request->get('username');

        return [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ];
    }

    /**
     * @param mixed                 $credentials
     * @param UserProviderInterface $userProvider
     *
     * @return UserInterface|null
     *
     * @throws Exception
     */
    public function getUser($credentials, UserProviderInterface $userProvider): ?UserInterface
    {
        if (null === $credentials) {
            return null;
        }

        $userData = $this->getLdapService()->getUserData($credentials['username'], $credentials['password']);

        if (!$userData) {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $credentials['username']));
        }

        // Verificando credênciais LDAP
        if (!$this->checkLdapCredentials($credentials, $userData['ldapUser'])) {
            throw new BadCredentialsException('Dados incorretos!');
        }

        try {
            $usuario = $userProvider->loadUserByUsername($userData['cpf']);
        } catch (UsernameNotFoundException $exception) {
            $strongPassword = $this->usuarioResource->generateStrongPassword();
            $usuarioDTO = (new UsuarioDTO())
                ->setUsername($userData['cpf'])
                ->setEmail($userData['email'])
                ->setNome(mb_strtoupper($userData['nome'], 'UTF-8'))
                ->setEnabled(true)
                ->setPlainPassword($strongPassword);

            $transactionId = $this->getTransactionManager()->begin();
            $usuario = $this->getUsuarioResource()->create($usuarioDTO, $transactionId);
            $this->getTransactionManager()->commit();
        }

        return $usuario;
    }

    /**
     * Verifica as credênciais do usuário.
     *
     * @param mixed         $credentials
     * @param UserInterface $user
     *
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        return true;
    }

    /**
     * Verifica as credênciais do usuário.
     *
     * @param mixed         $credentials
     * @param UserInterface $user
     *
     * @return bool
     */
    public function checkLdapCredentials($credentials, UserInterface $user): bool
    {
        if ($this->ldapService::TYPE_AUTH_AD) {
            return true;
        }

        return $credentials['password'] === $user->getPassword();
    }

    /**
     * Listener de falha de autenticação.
     *
     * @param Request                 $request
     * @param AuthenticationException $exception
     *
     * @return Response|null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData()),
        ];

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    /**
     * Listener de evento de autenticação realizada com sucesso.
     *
     * @param Request        $request
     * @param TokenInterface $token
     * @param string         $providerKey
     *
     * @return Response|null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): ?Response
    {
        return null;
    }

    /**
     * Configuração de suporte ao "Remember me".
     *
     * @return bool
     */
    public function supportsRememberMe(): bool
    {
        return false;
    }

    /**
     * Criação do Authentication Token.
     *
     * @param UserInterface $user
     * @param string        $providerKey
     *
     * @return PostAuthenticationGuardToken
     */
    public function createAuthenticatedToken(UserInterface $user, string $providerKey): PostAuthenticationGuardToken
    {
        $token = new PostAuthenticationGuardToken(
            $user,
            $providerKey,
            $this->getRolesService()->getContextualRoles($user)
        );

        $token->setAttribute('username', $this->username);

        return $token;
    }
}
