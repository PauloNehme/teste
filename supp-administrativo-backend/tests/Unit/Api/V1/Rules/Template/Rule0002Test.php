<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Template/Rule0002Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Template;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Template\Rule0002;
use SuppCore\AdministrativoBackend\Entity\Template as TemplateEntity;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0002Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Template;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0002Test extends TestCase
{
    private MockObject|AuthorizationCheckerInterface $authorizationChecker;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|TemplateEntity $templateEntity;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->authorizationChecker = $this->createMock(AuthorizationCheckerInterface::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->templateEntity = $this->createMock(TemplateEntity::class);

        $this->rule = new Rule0002(
            $this->rulesTranslate,
            $this->authorizationChecker
        );
    }

    public function testUsuarioSemPoderes(): void
    {
        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn(false);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate(null, $this->templateEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testUsuarioComPoderes(): void
    {
        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn(true);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate(null, $this->templateEntity, 'transaction'));
    }
}
