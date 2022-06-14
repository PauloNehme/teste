<?php
declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/ComponenteDigital/Rule0004Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\ComponenteDigital;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\Rules\ComponenteDigital\Rule0004;
use SuppCore\AdministrativoBackend\Entity\Classificacao;
use SuppCore\AdministrativoBackend\Entity\ComponenteDigital as ComponenteDigitalEntity;
use SuppCore\AdministrativoBackend\Entity\Documento;
use SuppCore\AdministrativoBackend\Entity\Juntada;
use SuppCore\AdministrativoBackend\Entity\Processo;
use SuppCore\AdministrativoBackend\Entity\Volume;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0004Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\ComponenteDigital;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0004Test extends TestCase
{
    private MockObject|AuthorizationCheckerInterface $authorizationChecker;

    private MockObject|ComponenteDigitalEntity $componenteDigitalEntity;

    private MockObject|Documento $documento;

    private MockObject|Juntada $juntadaAtual;

    private MockObject|RulesTranslate $rulesTranslate;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->componenteDigitalEntity = $this->createMock(ComponenteDigitalEntity::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->authorizationChecker = $this->createMock(AuthorizationCheckerInterface::class);
        $this->documento = $this->createMock(Documento::class);
        $this->juntadaAtual = $this->createMock(Juntada::class);

        $this->rule = new Rule0004(
            $this->rulesTranslate,
            $this->authorizationChecker
        );
    }

    public function testUsuarioSemPoderesProcesso(): void
    {
        $this->documento->expects(self::exactly(2))
            ->method('getJuntadaAtual')
            ->willReturn($this->juntadaAtual);

        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn(false);

        $this->componenteDigitalEntity->expects(self::exactly(2))
            ->method('getDocumento')
            ->willReturn($this->documento);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate(null, $this->componenteDigitalEntity, 'transaction');
    }

    public function testUsuarioSemPoderesClassificacao(): void
    {
        $this->authorizationChecker->expects(self::exactly(2))
            ->method('isGranted')
            ->willReturnOnConsecutiveCalls(true, false);

        $classificacao = $this->createMock(Classificacao::class);
        $classificacao->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $processo = $this->createMock(Processo::class);
        $processo->expects(self::exactly(3))
            ->method('getClassificacao')
            ->willReturn($classificacao);

        $volume = $this->createMock(Volume::class);
        $volume->expects(self::once())
            ->method('getProcesso')
            ->willReturn($processo);

        $juntadaAtual = $this->createMock(Juntada::class);
        $juntadaAtual->expects(self::once())
            ->method('getVolume')
            ->willReturn($volume);

        $this->documento->expects(self::exactly(2))
            ->method('getJuntadaAtual')
            ->willReturn($juntadaAtual);

        $this->componenteDigitalEntity->expects(self::exactly(2))
            ->method('getDocumento')
            ->willReturn($this->documento);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate(null, $this->componenteDigitalEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testUsuarioComPoderes(): void
    {
        $this->authorizationChecker->expects(self::exactly(2))
            ->method('isGranted')
            ->willReturnOnConsecutiveCalls(true, true);

        $classificacao = $this->createMock(Classificacao::class);
        $classificacao->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $processo = $this->createMock(Processo::class);
        $processo->expects(self::exactly(3))
            ->method('getClassificacao')
            ->willReturn($classificacao);

        $volume = $this->createMock(Volume::class);
        $volume->expects(self::once())
            ->method('getProcesso')
            ->willReturn($processo);

        $juntadaAtual = $this->createMock(Juntada::class);
        $juntadaAtual->expects(self::once())
            ->method('getVolume')
            ->willReturn($volume);

        $this->documento->expects(self::exactly(2))
            ->method('getJuntadaAtual')
            ->willReturn($juntadaAtual);

        $this->componenteDigitalEntity->expects(self::exactly(2))
            ->method('getDocumento')
            ->willReturn($this->documento);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate(null, $this->componenteDigitalEntity, 'transaction'));
    }
}
