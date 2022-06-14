<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Triggers/Usuario/Trigger0004.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Triggers\Usuario;

use SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario as UsuarioDTO;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Triggers\TriggerInterface;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class Trigger0004.
 *
 * @descSwagger=Envia email para o usuário que teve a senha resetada!
 * @classeSwagger=Trigger0004
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Trigger0004 implements TriggerInterface
{
    private Environment $twig;

    private Swift_Mailer $mailer;

    private ParameterBagInterface $parameterBag;

    /**
     * Trigger0004 constructor.
     */
    public function __construct(
        Environment $twig,
        Swift_Mailer $mailer,
        ParameterBagInterface $parameterBag
    ) {
        $this->twig = $twig;
        $this->mailer = $mailer;
        $this->parameterBag = $parameterBag;
    }

    public function supports(): array
    {
        return [
            UsuarioDTO::class => [
                'afterResetaSenha',
            ],
        ];
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function execute(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): void
    {
        $message = (new Swift_Message('Reset de senha no '.$this->parameterBag
                ->get('supp_core.administrativo_backend.nome_sistema')))
            ->setFrom($this->parameterBag->get('supp_core.administrativo_backend.email_suporte'))
            ->setTo($entity->getEmail())
            ->setBody(
                $this->twig->render(
                    $this->parameterBag->get('supp_core.administrativo_backend.template_email_reset_senha'),
                    [
                        'sistema' => $this->parameterBag->get('supp_core.administrativo_backend.nome_sistema'),
                        'ambiente' => $this->parameterBag->get(
                            'supp_core.administrativo_backend.kernel_environment_mapping'
                        )[$this->parameterBag->get('kernel.environment')],
                        'url' => $this->parameterBag->get('supp_core.administrativo_backend.url_sistema_frontend'),
                        'username' => $entity->getUsername(),
                        'nome' => $entity->getNome(),
                        'senha' => $restDto->getPlainPassword(),
                    ]
                ),
                'text/html'
            );

        $this->mailer->send($message);
    }

    public function getOrder(): int
    {
        return 2;
    }
}
