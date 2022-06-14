<?php

declare(strict_types=1);
/**
 * /src/Security/SsoGovBrAuthenticator.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Security;

use InvalidArgumentException;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario as UsuarioDTO;
use SuppCore\AdministrativoBackend\Api\V1\Resource\UsuarioResource;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

/**
 * Class SsoGovBrAuthenticator.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class SsoGovBrAuthenticator extends AbstractGuardAuthenticator
{
    private LoginUnicoGovBrService $loginUnicoGovBrService;
    private UsuarioResource $usuarioResource;
    private TransactionManager $transactionManager;
    private RolesService $rolesService;

    /**
     * SsoGovBrAuthenticator constructor.
     *
     * @param LoginUnicoGovBrService $loginUnicoGovBrService
     * @param UsuarioResource        $usuarioResource
     * @param TransactionManager     $transactionManager
     * @param RolesService           $rolesService
     */
    public function __construct(
        LoginUnicoGovBrService $loginUnicoGovBrService,
        UsuarioResource $usuarioResource,
        TransactionManager $transactionManager,
        RolesService $rolesService
    ) {
        $this->loginUnicoGovBrService = $loginUnicoGovBrService;
        $this->usuarioResource = $usuarioResource;
        $this->transactionManager = $transactionManager;
        $this->rolesService = $rolesService;
    }

    /**
     * @return LoginUnicoGovBrService
     */
    public function getLoginUnicoGovBrService(): LoginUnicoGovBrService
    {
        return $this->loginUnicoGovBrService;
    }

    /**
     * @return UsuarioResource
     */
    public function getUsuarioResource(): UsuarioResource
    {
        return $this->usuarioResource;
    }

    /**
     * @return TransactionManager
     */
    public function getTransactionManager(): TransactionManager
    {
        return $this->transactionManager;
    }

    /**
     * @return RolesService
     */
    public function getRolesService(): RolesService
    {
        return $this->rolesService;
    }

    /**
     * Método de inicialização do authenticator.
     *
     * @param Request                      $request
     * @param AuthenticationException|null $authException
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
        return (bool) $request->get('code');
    }

    /**
     * Retorna as credenciais do usuário.
     *
     * @param Request $request
     *
     * @return array|null
     *
     * @throws \Exception
     */
    public function getCredentials(Request $request): ?array
    {
        $dadosUsuario = $this->getLoginUnicoGovBrService()->retornaDadosUsuario($request->get('code'));

        if (!$dadosUsuario) {
            throw new BadCredentialsException('Dados incorretos!');
        }

        return $dadosUsuario;
    }

    /**
     * @param mixed                 $credentials
     * @param UserProviderInterface $userProvider
     *
     * @return UserInterface|null
     *
     * @throws \Exception
     */
    public function getUser($credentials, UserProviderInterface $userProvider): ?UserInterface
    {
        if (null === $credentials) {
            return null;
        }
        try {
            $usuario = $userProvider->loadUserByUsername($credentials['username']);
        } catch (UsernameNotFoundException $exception) {
            $usuarioDTO = (new UsuarioDTO())
                ->setUsername($credentials['username'])
                ->setEmail($credentials['email'])
                ->setNome($credentials['nome'])
                ->setEnabled(true);

            $usuarioDTO->setPlainPassword($this->getUsuarioResource()->generateStrongPassword());

            $transactionId = $this->getTransactionManager()->begin();
            $usuario = $this->getUsuarioResource()->create($usuarioDTO, $transactionId);
            $this->getTransactionManager()->commit();
        }

        $ssoGovBrUsuario = new SsoGovBrUsuario();
        $ssoGovBrUsuario->setUsuario($usuario);
        $ssoGovBrUsuario->setAccessToken($credentials['access_token']);
        $ssoGovBrUsuario->setIdToken($credentials['id_token']);

        return $ssoGovBrUsuario;
    }

    /**
     * Verifica se o usuário e senha é valido.
     * Colocando como true pois não é necessário validar.
     *
     * @param mixed         $credentials
     * @param UserInterface $user
     *
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        return $credentials['username'] === $user->getUsername();
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
     * Shortcut to create a PostAuthenticationGuardToken for you, if you don't really
     * care about which authenticated token you're using.
     *
     * @return PostAuthenticationGuardToken
     */
    public function createAuthenticatedToken(UserInterface $user, string $providerKey)
    {
        if (!($user instanceof SsoGovBrUsuarioInterface)) {
            throw new InvalidArgumentException('O user interface recebido não é uma instância de  '.SsoGovBrUsuarioInterface::class);
        }

        $confiabilidadesUsuario = $this->getLoginUnicoGovBrService()
                ->getConfiabilidadesUsuarioData($user->getUsername(), $user->getAccessToken());

        $confiavel = $this->getLoginUnicoGovBrService()
            ->validaConfiabilidadesUsuario($confiabilidadesUsuario);

        $token = new PostAuthenticationGuardToken(
            $user->getUsuario(),
            $providerKey,
            $this->getRolesService()->getContextualRoles($user->getUsuario())
        );

        if ($confiavel) {
            $token->setAttribute('trusted', 'ssoGovBr');
        }

        return $token;
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
}
