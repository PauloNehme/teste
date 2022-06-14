<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Transicao/Rule0004Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Transicao;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Transicao as TransicaoDto;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Transicao\Rule0004;
use SuppCore\AdministrativoBackend\Entity\ModalidadeFase;
use SuppCore\AdministrativoBackend\Entity\ModalidadeTransicao;
use SuppCore\AdministrativoBackend\Entity\Processo;
use SuppCore\AdministrativoBackend\Entity\Transicao as TransicaoEntity;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class Rule0004Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Transicao;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0004Test extends TestCase
{
    private MockObject|ModalidadeFase $modalidadeFase;

    private MockObject|ParameterBagInterface $parameterBag;

    private MockObject|Processo $processo;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|TransicaoDto $transicaoDto;

    private MockObject|TransicaoEntity $transicaoEntity;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->modalidadeFase = $this->createMock(ModalidadeFase::class);
        $this->parameterBag = $this->createMock(ParameterBagInterface::class);
        $this->processo = $this->createMock(Processo::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->transicaoDto = $this->createMock(TransicaoDto::class);
        $this->transicaoEntity = $this->createMock(TransicaoEntity::class);

        $this->rule = new Rule0004(
            $this->rulesTranslate,
            $this->parameterBag
        );
    }

    public function testNUPNaoNaFaseCorrente(): void
    {
        $this->parameterBag->expects(self::exactly(2))
            ->method('get')
            ->willReturnOnConsecutiveCalls('CORRENTE', 'DESARQUIVAMENTO');

        $this->modalidadeFase->expects(self::once())
            ->method('getValor')
            ->willReturn('CORRENTE');

        $modalidadeTransicao = $this->createMock(ModalidadeTransicao::class);
        $modalidadeTransicao->expects(self::once())
            ->method('getValor')
            ->willReturn('DESARQUIVAMENTO');

        $this->processo->expects(self::once())
            ->method('getModalidadeFase')
            ->willReturn($this->modalidadeFase);

        $this->transicaoDto->expects(self::once())
            ->method('getProcesso')
            ->willReturn($this->processo);

        $this->transicaoDto->expects(self::once())
            ->method('getModalidadeTransicao')
            ->willReturn($modalidadeTransicao);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->transicaoDto, $this->transicaoEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testNUPNaoEstaNaFaseCorrente(): void
    {
        $this->parameterBag->expects(self::once())
            ->method('get')
            ->willReturn('CORRENTE');

        $this->modalidadeFase->expects(self::once())
            ->method('getValor')
            ->willReturn('DEFINITIVA');

        $this->processo->expects(self::once())
            ->method('getModalidadeFase')
            ->willReturn($this->modalidadeFase);

        $this->transicaoDto->expects(self::once())
            ->method('getProcesso')
            ->willReturn($this->processo);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->transicaoDto, $this->transicaoEntity, 'transaction'));
    }
}
