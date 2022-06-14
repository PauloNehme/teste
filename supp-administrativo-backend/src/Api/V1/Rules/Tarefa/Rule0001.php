<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Rules/Tarefa/Rule0001.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\Tarefa;

use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Repository\ProcessoRepository;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;

/**
 * Class Rule0001.
 *
 * @descSwagger=O NUP está em tramitação externa! Não é possível abrir uma tarefa antes do recebimento da tramitação!
 * @classeSwagger=Rule0001
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0001 implements RuleInterface
{
    private RulesTranslate $rulesTranslate;

    private ProcessoRepository $processoRepository;

    private TransactionManager $transactionManager;

    /**
     * Rule0001 constructor.
     */
    public function __construct(
        RulesTranslate $rulesTranslate,
        ProcessoRepository $processoRepository,
        TransactionManager $transactionManager
    ) {
        $this->rulesTranslate = $rulesTranslate;
        $this->processoRepository = $processoRepository;
        $this->transactionManager = $transactionManager;
    }

    public function supports(): array
    {
        return [
            Tarefa::class => [
                'beforeCreate',
            ],
        ];
    }

    /**
     * @param Tarefa|RestDtoInterface|null                                  $restDto
     * @param \SuppCore\AdministrativoBackend\Entity\Tarefa|EntityInterface $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        if ($this->transactionManager->getContext('criacaoProcessoBarramento', $transactionId)) {
            return true;
        }

        if ($this->processoRepository->findProcessoEmTramitacaoExterna($restDto->getProcesso()->getId())) {
            $this->rulesTranslate->throwException('tarefa', '0001');
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
