<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Rules/VinculacaoProcesso/Rule0002.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\VinculacaoProcesso;

use SuppCore\AdministrativoBackend\Api\V1\DTO\VinculacaoProcesso;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Repository\ProcessoRepository;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class Rule0002.
 *
 * @descSwagger=Processos/Documentos Avulsos em tramitação não podem ser vinculados!
 * @classeSwagger=Rule0002
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0002 implements RuleInterface
{
    private RulesTranslate $rulesTranslate;

    private ProcessoRepository $processoRepository;

    /**
     * Rule0002 constructor.
     */
    public function __construct(RulesTranslate $rulesTranslate,
                                ProcessoRepository $processoRepository,
                                private ParameterBagInterface $parameterBag)
    {
        $this->rulesTranslate = $rulesTranslate;
        $this->processoRepository = $processoRepository;
    }

    public function supports(): array
    {
        return [
            VinculacaoProcesso::class => [
                'beforeCreate',
            ],
        ];
    }

    /**
     * @param VinculacaoProcesso|RestDtoInterface|null                                  $restDto
     * @param \SuppCore\AdministrativoBackend\Entity\VinculacaoProcesso|EntityInterface $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        $emTramitacao = $this->processoRepository->findProcessoEmTramitacao($restDto->getProcesso()->getId());
        $emTramitacaoVinculado = $this->processoRepository->findProcessoEmTramitacao($restDto->getProcessoVinculado()->getId());

        if (($this->parameterBag->get('constantes.entidades.modalidade_vinculacao_processo.const_3') == $restDto->getModalidadeVinculacaoProcesso()->getValor() ||
                $this->parameterBag->get('constantes.entidades.modalidade_vinculacao_processo.const_2') == $restDto->getModalidadeVinculacaoProcesso()->getValor()) &&
            $emTramitacao && $emTramitacaoVinculado) {
            $this->rulesTranslate->throwException('vinculacaoProcesso', '0002');
        }

        return true;
    }

    public function getOrder(): int
    {
        return 2;
    }
}
