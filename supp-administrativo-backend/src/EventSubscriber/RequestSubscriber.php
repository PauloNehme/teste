<?php

declare(strict_types=1);
/**
 * /src/EventSubscriber/RequestSubscriber.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\EventSubscriber;

use Exception;
use SuppCore\AdministrativoBackend\Entity\Usuario as ApplicationUser;
use SuppCore\AdministrativoBackend\Security\ApiKeyUser;
use SuppCore\AdministrativoBackend\Utils\RequestLogger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class RequestSubscriber.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class RequestSubscriber implements EventSubscriberInterface
{
    private RequestLogger $logger;

    private TokenStorageInterface $tokenStorage;

    /**
     * RequestSubscriber constructor.
     *
     * @param RequestLogger         $requestLogger
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(RequestLogger $requestLogger, TokenStorageInterface $tokenStorage, private SessionInterface $session)
    {
        // Store logger service
        $this->logger = $requestLogger;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @codeCoverageIgnore
     *
     * @return mixed[] The event names to listen to
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => [
                'onKernelResponse',
                15,
            ],
        ];
    }

    /**
     * Subscriber method to log every request / response.
     *
     * @param ResponseEvent $event
     *
     * @throws Exception
     */
    public function onKernelResponse(ResponseEvent $event): void
    {
        $request = $event->getRequest();
        $path = $request->getPathInfo();

        // We don't want to log /healthz , /version and OPTIONS requests
        if ('OPTIONS' === $request->getRealMethod() &&
            !$request->hasSession()
        ) {
            $request->setSession($this->session);
        }

        // We don't want to log /healthz , /version and OPTIONS requests
        if ('/healthz' === $path
            || '/version' === $path
            || 'OPTIONS' === $request->getRealMethod()
        ) {
            return;
        }

        $this->process($event);
    }

    /**
     * Method to process current request event.
     *
     * @param ResponseEvent $event
     *
     * @throws Exception
     */
    private function process(ResponseEvent $event): void
    {
        $request = $event->getRequest();

        // Set needed data to logger and handle actual log
        $this->logger->setRequest($request);
        $this->logger->setResponse($event->getResponse());

        $user = $this->getUser();

        if ($user instanceof ApplicationUser) {
            $this->logger->setUser($user);
        } elseif ($user instanceof ApiKeyUser) {
            $this->logger->setApiKey($user->getApiKey());
        }

        $this->logger->setMasterRequest($event->isMasterRequest());
        $this->logger->handle();
    }

    /**
     * Method to get current user from token storage.
     *
     * @return string|mixed|UserInterface|ApplicationUser|ApiKeyUser|null
     */
    private function getUser()
    {
        $token = $this->tokenStorage->getToken();

        return null === $token || $token instanceof AnonymousToken ? null : $token->getUser();
    }
}
