<?php

/** @noinspection PhpUnused */

declare(strict_types=1);
/**
 * /src/EventListener/AuthenticationListener.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\EventListener;

use Predis\Client;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

/**
 * Class AuthenticationListener.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class AuthenticationListener implements EventSubscriberInterface
{
    private Client $redisClient;

    protected RequestStack $requestStack;

    /**
     * AuthenticationListener constructor.
     *
     * @param Client       $redisClient
     * @param RequestStack $requestStack
     */
    public function __construct(
        Client $redisClient,
        RequestStack $requestStack
    ) {
        $this->redisClient = $redisClient;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            AuthenticationEvents::AUTHENTICATION_SUCCESS => 'onAuthenticationSuccess',
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
        ];
    }

    /**
     * @param AuthenticationEvent $event
     */
    public function onAuthenticationSuccess(AuthenticationEvent $event)
    {
        $currentRequest = $this->requestStack->getCurrentRequest();
        if ($currentRequest) {
            $clientIp = $currentRequest->getClientIp();
            $token = $event->getAuthenticationToken();

            if ($token instanceof UsernamePasswordToken) {
                $username = $token->getUsername();
            } elseif ($token instanceof PostAuthenticationGuardToken) {
                $username = $token->getUser()->getUsername();
                if ($token->hasAttribute('username')) {
                    $username = $token->getAttribute('username');
                }
            } else {
                return null;
            }

            $clientId = 'auth_'.$clientIp.':'.$username;

            $this->isBLocked($clientId);

            $this->redisClient->hset('auth_tentativas', $clientId, 0);
        }
    }

    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailure(AuthenticationFailureEvent $event)
    {
        $currentRequest = $this->requestStack->getCurrentRequest();
        if ($currentRequest) {
            $clientIp = $currentRequest->getClientIp();
            $token = $event->getAuthenticationToken();
            if ($token instanceof UsernamePasswordToken) {
                $username = $token->getUsername();
            } else {
                $username = $token->getCredentials()['username'];
            }

            $clientId = 'auth_'.$clientIp.':'.$username;

            $this->isBLocked($clientId);

            $tentativas = $this->redisClient->hget('auth_tentativas', $clientId);

            if ($tentativas < 4) {
                $this->redisClient->hincrby('auth_tentativas', $clientId, 1);

                $message = 'Dados não conferem, você possui mais ';
                $message .= (string) (4 - $tentativas).' tentativas antes de ser bloqueado!';

                throw new BadRequestHttpException($message, null, 401);
            } else {
                // blacklist por 10 minutos
                $this->redisClient->set($clientId, 'auth_blocked');
                $this->redisClient->expire($clientId, 600);
                $this->redisClient->hset('auth_tentativas', $clientId, 0);
            }
        }
    }

    /**
     * @param string $clientId
     */
    private function isBLocked(string $clientId): void
    {
        // está na blacklist?
        if ($this->redisClient->exists($clientId)) {
            $message = <<<MSG
O usuário foi bloqueado por 10 (dez) minutos, 
pois a senha foi digitada incorretamente por 5 (cinco) vezes!
MSG;
            throw new BadRequestHttpException($message, null, 403);
        }
    }
}
