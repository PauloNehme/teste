<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Setor/Rule0011Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Setor;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Setor as SetorDto;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Setor\Rule0011;
use SuppCore\AdministrativoBackend\Entity\ModalidadeOrgaoCentral;
use SuppCore\AdministrativoBackend\Entity\Setor as SetorEntity;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use SuppCore\AdministrativoBackend\Utils\CoordenadorService;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0011Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Setor;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0011Test extends TestCase
{
    private MockObject|AuthorizationCheckerInterface $authorizationChecker;

    private MockObject|CoordenadorService $coordenadorService;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|SetorDto $setorDto;

    private MockObject|SetorEntity $setorEntity;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->authorizationChecker = $this->createMock(AuthorizationCheckerInterface::class);
        $this->coordenadorService = $this->createMock(CoordenadorService::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->setorDto = $this->createMock(SetorDto::class);
        $this->setorEntity = $this->createMock(SetorEntity::class);

        $this->rule = new Rule0011(
            $this->rulesTranslate,
            $this->authorizationChecker,
            $this->coordenadorService
        );
    }

    /**
     * @throws RuleException
     */
    public function testRoleAdmin(): void
    {
        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn(true);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->setorDto, $this->setorEntity, 'transaction'));
    }

    /**
     * @throws RuleException
     */
    public function testCoordenadorUnidade(): void
    {
        $unidade = $this->createMock(SetorEntity::class);
        $this->setorDto->expects(self::once())
            ->method('getUnidade')
            ->willReturn($unidade);

        $this->coordenadorService->expects(self::once())
            ->method('verificaUsuarioCoordenadorUnidade')
            ->willReturn(true);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->setorDto, $this->setorEntity, 'transaction'));
    }

    /**
     * @throws RuleException
     */
    public function testCoordenadorOrgaoCentral(): void
    {
        $modalidadeOrgaoCentral = $this->createMock(ModalidadeOrgaoCentral::class);

        $unidade = $this->createMock(SetorEntity::class);
        $unidade->expects(self::once())
            ->method('getModalidadeOrgaoCentral')
            ->willReturn($modalidadeOrgaoCentral);

        $this->setorDto->expects(self::exactly(2))
            ->method('getUnidade')
            ->willReturn($unidade);

        $this->coordenadorService->expects(self::once())
            ->method('verificaUsuarioCoordenadorOrgaoCentral')
            ->willReturn(true);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->setorDto, $this->setorEntity, 'transaction'));
    }

    public function testUsuarioSemPermissao(): void
    {
        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn(false);

        $modalidadeOrgaoCentral = $this->createMock(ModalidadeOrgaoCentral::class);

        $unidade = $this->createMock(SetorEntity::class);
        $unidade->expects(self::once())
            ->method('getModalidadeOrgaoCentral')
            ->willReturn($modalidadeOrgaoCentral);

        $this->setorDto->expects(self::exactly(2))
            ->method('getUnidade')
            ->willReturn($unidade);

        $this->coordenadorService->expects(self::once())
            ->method('verificaUsuarioCoordenadorUnidade')
            ->willReturn(false);

        $this->coordenadorService->expects(self::once())
            ->method('verificaUsuarioCoordenadorOrgaoCentral')
            ->willReturn(false);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->setorDto, $this->setorEntity, 'transaction');
    }
}
