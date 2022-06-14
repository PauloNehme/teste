<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/ComponenteDigital/Rule0003Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\ComponenteDigital;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\Rules\ComponenteDigital\Rule0003;
use SuppCore\AdministrativoBackend\Entity\ComponenteDigital as ComponenteDigitalEntity;
use SuppCore\AdministrativoBackend\Entity\Documento;
use SuppCore\AdministrativoBackend\Entity\Juntada;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;

/**
 * Class Rule0003Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\ComponenteDigital
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0003Test extends TestCase
{
    private MockObject|ComponenteDigitalEntity $componenteDigitalEntity;

    private MockObject|Documento $documento;

    private MockObject|Juntada $juntada;

    private MockObject|RulesTranslate $rulesTranslate;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->componenteDigitalEntity = $this->createMock(ComponenteDigitalEntity::class);
        $this->documento = $this->createMock(Documento::class);
        $this->juntada = $this->createMock(Juntada::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);

        $this->rule = new Rule0003(
            $this->rulesTranslate
        );
    }

    public function testDocumentoNaoMinuta(): void
    {
        $this->juntada->expects(self::once())
            ->method('getId')
            ->willReturn(2);

        $this->documento->expects(self::exactly(2))
            ->method('getJuntadaAtual')
            ->willReturn($this->juntada);

        $this->componenteDigitalEntity->expects(self::exactly(3))
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
    public function testDocumentoMinuta(): void
    {
        $this->juntada->expects(self::once())
            ->method('getId')
            ->willReturn(null);

        $this->documento->expects(self::exactly(2))
            ->method('getJuntadaAtual')
            ->willReturn($this->juntada);

        $this->componenteDigitalEntity->expects(self::exactly(3))
            ->method('getDocumento')
            ->willReturn($this->documento);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate(null, $this->componenteDigitalEntity, 'transaction'));
    }
}
