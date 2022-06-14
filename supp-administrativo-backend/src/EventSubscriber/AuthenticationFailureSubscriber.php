<?php

declare(strict_types=1);
/**
 * /src/EventSubscriber/AuthenticationFailureSubscriber.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\EventSubscriber;

use Doctrine\ORM\NonUniqueResultException;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use SuppCore\AdministrativoBackend\Doctrine\DBAL\Types\EnumLogLoginType;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Repository\UsuarioRepository;
use SuppCore\AdministrativoBackend\Utils\LoginLogger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Class AuthenticationFailureSubscriber.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class AuthenticationFailureSubscriber implements EventSubscriberInterface
{
    protected LoginLogger $loginLogger;

    protected UsuarioRepository $usuarioRepository;

    /**
     * AuthenticationFailureSubscriber constructor.
     *
     * @param LoginLogger       $loginLogger
     * @param UsuarioRepository $usuarioRepository
     */
    public function __construct(LoginLogger $loginLogger, UsuarioRepository $usuarioRepository)
    {
        $this->loginLogger = $loginLogger;
        $this->usuarioRepository = $usuarioRepository;
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
            Events::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
        ];
    }

    /**
     * Method to log login failures to database.
     *
     * This method is called when '\Lexik\Bundle\JWTAuthenticationBundle\Events::AUTHENTICATION_FAILURE'
     * event is broadcast.
     *
     * @param AuthenticationFailureEvent $event
     *
     * @throws NonUniqueResultException
     */
    public function onAuthenticationFailure(AuthenticationFailureEvent $event): void
    {
        // Fetch user entity
        if ($event->getException()->getToken() instanceof TokenInterface) {
            /** @var string $username */
            $username = $event->getException()->getToken()->getUser();

            /** @var Usuario $user */
            $user = $this->usuarioRepository->loadUserByUsername($username);

            $this->loginLogger->setUser($user);
        }

        $this->loginLogger->process(EnumLogLoginType::TYPE_FAILURE);
    }
}
