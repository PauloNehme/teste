<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Rules/Volume/Rule0001.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\Volume;

use SuppCore\AdministrativoBackend\Api\V1\DTO\Volume;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class Rule0001.
 *
 * @descSwagger=Processos eletrônicas só podem ter volumes eletrônicos!
 * @classeSwagger=Rule0001
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0001 implements RuleInterface
{
    private RulesTranslate $rulesTranslate;

    /**
     * Rule0001 constructor.
     */
    public function __construct(
        RulesTranslate $rulesTranslate,
        private ParameterBagInterface $parameterBag
    ) {
        $this->rulesTranslate = $rulesTranslate;
    }

    public function supports(): array
    {
        return [
            Volume::class => [
                'beforeCreate',
                'beforeUpdate',
                'beforePatch',
            ],
        ];
    }

    /**
     * @param Volume|RestDtoInterface|null                                  $restDto
     * @param \SuppCore\AdministrativoBackend\Entity\Volume|EntityInterface $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        if ($this->parameterBag->get('constantes.entidades.modalidade_meio.const_1') === $restDto->getProcesso()->getModalidadeMeio()->getValor() &&
            $this->parameterBag->get('constantes.entidades.modalidade_meio.const_1') !== $restDto->getModalidadeMeio()->getValor()) {
            $this->rulesTranslate->throwException('volume', '0001');
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
