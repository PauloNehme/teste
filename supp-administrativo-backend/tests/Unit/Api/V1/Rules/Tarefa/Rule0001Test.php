<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Tarefa/Rule0001Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Tarefa;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa as TarefaDto;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Tarefa\Rule0001;
use SuppCore\AdministrativoBackend\Entity\Processo;
use SuppCore\AdministrativoBackend\Entity\Tarefa as TarefaEntity;
use SuppCore\AdministrativoBackend\Repository\ProcessoRepository;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use SuppCore\AdministrativoBackend\Transaction\Context;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;

/**
 * Class Rule0001Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Tarefa;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0001Test extends TestCase
{
    private MockObject|ProcessoRepository $processoRepository;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|TarefaDto $tarefaDto;

    private MockObject|TarefaEntity $tarefaEntity;

    private MockObject|TransactionManager $transactionManager;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->processoRepository = $this->createMock(ProcessoRepository::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->tarefaDto = $this->createMock(TarefaDto::class);
        $this->tarefaEntity = $this->createMock(TarefaEntity::class);
        $this->transactionManager = $this->createMock(TransactionManager::class);

        $this->rule = new Rule0001(
            $this->rulesTranslate,
            $this->processoRepository,
            $this->transactionManager
        );
    }

    public function testNUPTramitacaoExterna(): void
    {
        $this->processoRepository->expects(self::once())
            ->method('findProcessoEmTramitacaoExterna')
            ->willReturn(true);

        $processo = $this->createMock(Processo::class);
        $processo->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $this->tarefaDto->expects(self::once())
            ->method('getProcesso')
            ->willReturnOnConsecutiveCalls($processo);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->tarefaDto, $this->tarefaEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testNUPSemTramitacaoExterna(): void
    {
        $this->processoRepository->expects(self::once())
            ->method('findProcessoEmTramitacaoExterna')
            ->willReturn(false);

        $processo = $this->createMock(Processo::class);
        $processo->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $this->tarefaDto->expects(self::once())
            ->method('getProcesso')
            ->willReturnOnConsecutiveCalls($processo);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->tarefaDto, $this->tarefaEntity, 'transaction'));
    }

    /**
     * @throws RuleException
     */
    public function testContextoCriacaoProcessoBarramento(): void
    {
        $context = $this->createMock(Context::class);
        $this->transactionManager->expects(self::once())
            ->method('getContext')
            ->willReturn($context);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->tarefaDto, $this->tarefaEntity, 'transaction'));
    }
}
