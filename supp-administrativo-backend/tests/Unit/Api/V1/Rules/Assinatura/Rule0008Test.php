<?php
declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Assinatura/Rule0008Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Assinatura;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Assinatura\Rule0008;
use SuppCore\AdministrativoBackend\Entity\Assinatura as AssinaturaEntity;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Class Rule0008Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Assinatura;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0008Test extends TestCase
{
    private MockObject|AssinaturaEntity $assinaturaEntity;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|TokenInterface $token;

    private MockObject|TokenStorageInterface $tokenStorage;

    private MockObject|Usuario $usuario;

    private MockObject|Usuario $usuarioToken;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->assinaturaEntity = $this->createMock(AssinaturaEntity::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->token = $this->createMock(TokenInterface::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->usuario = $this->createMock(Usuario::class);
        $this->usuarioToken = $this->createMock(Usuario::class);

        $this->rule = new Rule0008(
            $this->rulesTranslate,
            $this->tokenStorage
        );
    }

    public function testUsuarioDono(): void
    {
        $this->usuario->expects(self::once())
            ->method('getId')
            ->willReturn(2);

        $this->usuarioToken->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $this->token->expects(self::exactly(2))
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::exactly(3))
            ->method('getToken')
            ->willReturn($this->token);

        $this->assinaturaEntity->expects(self::exactly(2))
            ->method('getCriadoPor')
            ->willReturn($this->usuario);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate(null, $this->assinaturaEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testUsuarioNaoDono(): void
    {
        $this->usuario->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $this->usuarioToken->expects(self::once())
            ->method('getId')
            ->willReturn(1);

        $this->token->expects(self::exactly(2))
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::exactly(3))
            ->method('getToken')
            ->willReturn($this->token);

        $this->assinaturaEntity->expects(self::exactly(2))
            ->method('getCriadoPor')
            ->willReturn($this->usuario);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate(null, $this->assinaturaEntity, 'transaction'));
    }
}
