<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Rules/Usuario/Rule0010.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\Usuario;

use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario as UsuarioDTO;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class Rule0010.
 *
 * @descSwagger=A senha não confere com a senha anterior!
 * @classeSwagger=Rule0010
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0010 implements RuleInterface
{


    /**
     * Rule0010 constructor.
     */
    public function __construct(private RulesTranslate $rulesTranslate,
                                private EncoderFactoryInterface $userPasswordEncoder) {
    }

    public function supports(): array
    {
        return [
            UsuarioDTO::class => [
                'beforeAlterarSenha',
            ],
        ];
    }

    /**
     * @param RestDtoInterface|null $restDto
     * @param EntityInterface $entity
     * @param string $transactionId
     * @return bool
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {

        if (!$this->userPasswordEncoder->getEncoder($entity)->isPasswordValid(
            $entity->getPassword(),
            $restDto->getCurrentPlainPassword(),
            $entity->getSalt())) {

            $this->rulesTranslate->throwException('usuario', '0010');
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
