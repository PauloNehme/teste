<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Assunto/Rule0004Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Assunto;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Assunto as AssuntoDto;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Assunto\Rule0004;
use SuppCore\AdministrativoBackend\Entity\Assunto as AssuntoEntity;
use SuppCore\AdministrativoBackend\Entity\Classificacao;
use SuppCore\AdministrativoBackend\Entity\Processo;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0004Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Assunto;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0004Test extends TestCase
{
    private MockObject|AssuntoDto $assuntoDto;

    private MockObject|AssuntoEntity $assuntoEntity;

    private MockObject|AuthorizationCheckerInterface $authorizationChecker;

    private MockObject|RulesTranslate $rulesTranslate;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->assuntoDto = $this->createMock(AssuntoDto::class);
        $this->assuntoEntity = $this->createMock(AssuntoEntity::class);
        $this->authorizationChecker = $this->createMock(AuthorizationCheckerInterface::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);

        $this->rule = new Rule0004(
            $this->rulesTranslate,
            $this->authorizationChecker
        );
    }

    public function testUsuarioSemPoder(): void
    {
        $this->authorizationChecker->expects(self::any())
            ->method('isGranted')
            ->willReturn(false);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->assuntoDto, $this->assuntoEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testUsuarioComPoder(): void
    {
        $this->authorizationChecker->expects(self::any())
            ->method('isGranted')
            ->willReturn(true);

        $classificacao = $this->createMock(Classificacao::class);
        $classificacao->expects(self::exactly(1))
            ->method('getId')
            ->willReturn(1);

        $processo = $this->createMock(Processo::class);
        $processo->expects(self::any())
            ->method('getClassificacao')
            ->willReturn($classificacao);

        $this->assuntoDto->expects(self::any())
            ->method('getProcesso')
            ->willReturn($processo);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->assuntoDto, $this->assuntoEntity, 'transaction'));
    }
}
