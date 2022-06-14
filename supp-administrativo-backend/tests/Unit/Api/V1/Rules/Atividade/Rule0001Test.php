<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Atividade/Rule0001Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Atividade;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Atividade as AtividadeDto;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Atividade\Rule0001;
use SuppCore\AdministrativoBackend\Document\Unidade;
use SuppCore\AdministrativoBackend\Entity\Atividade as AtividadeEntity;
use SuppCore\AdministrativoBackend\Entity\EspecieAtividade;
use SuppCore\AdministrativoBackend\Entity\Lotacao;
use SuppCore\AdministrativoBackend\Entity\ModalidadeOrgaoCentral;
use SuppCore\AdministrativoBackend\Entity\Setor;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Repository\LotacaoRepository;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Class Rule0001Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Atividade;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0001Test extends TestCase
{
    private MockObject|AtividadeDto $atividadeDto;

    private MockObject|AtividadeEntity $atividadeEntity;

    private MockObject|EspecieAtividade $especieAtividade;

    private MockObject|Lotacao $lotacao;

    private MockObject|LotacaoRepository $lotacaoRepository;

    private MockObject|ModalidadeOrgaoCentral $modalidadeOrgaoCentral;

    private MockObject|ParameterBagInterface $parameterBag;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|Setor $setor;

    private MockObject|TokenInterface $token;

    private MockObject|TokenStorageInterface $tokenStorage;

    private MockObject|Unidade $unidade;

    private MockObject|Usuario $usuarioToken;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->atividadeDto = $this->createMock(AtividadeDto::class);
        $this->atividadeEntity = $this->createMock(AtividadeEntity::class);
        $this->especieAtividade = $this->createMock(EspecieAtividade::class);
        $this->lotacao = $this->createMock(Lotacao::class);
        $this->lotacaoRepository = $this->createMock(LotacaoRepository::class);
        $this->modalidadeOrgaoCentral = $this->createMock(ModalidadeOrgaoCentral::class);
        $this->parameterBag = $this->createMock(ParameterBagInterface::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->setor = $this->createMock(Setor::class);
        $this->token = $this->createMock(TokenInterface::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->unidade = $this->createMock(Setor::class);
        $this->usuarioToken = $this->createMock(Usuario::class);

        $this->rule = new Rule0001(
            $this->rulesTranslate,
            $this->tokenStorage,
            $this->lotacaoRepository,
            $this->parameterBag,
        );
    }

    public function testUsoInibido(): void
    {
        $this->parameterBag->expects(self::exactly(4))
            ->method('get')
            ->willReturnOnConsecutiveCalls(
                'NOTA (JURÍDICA) NA FORMA DA PORTARIA N° 1.399/2009, ELABORAÇÃO',
                'DIVISÃO DE ASSUNTOS DISCIPLINARES',
                'PGF',
                'CGU'
            );

        $this->especieAtividade->expects(self::once())
            ->method('getNome')
            ->willReturn(
                'NOTA (JURÍDICA) NA FORMA DA PORTARIA N° 1.399/2009, ELABORAÇÃO',
            );

        $this->token->expects(self::once())
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::once())
            ->method('getToken')
            ->willReturn($this->token);

        $this->modalidadeOrgaoCentral->expects(self::exactly(2))
            ->method('getValor')
            ->willReturn('CGU');

        $this->unidade->expects(self::exactly(2))
            ->method('getModalidadeOrgaoCentral')
            ->willReturn($this->modalidadeOrgaoCentral);

        $this->unidade->expects(self::once())
            ->method('getNome')
            ->willReturn('DIVISÃO DE ASSUNTOS DISCIPLINARES DIFERENTE');

        $this->setor->expects(self::exactly(3))
            ->method('getUnidade')
            ->willReturn($this->unidade);

        $this->lotacao->expects(self::exactly(3))
            ->method('getSetor')
            ->willReturn($this->setor);

        $this->lotacaoRepository->expects(self::once())
            ->method('findLotacaoPrincipal')
            ->willReturn($this->lotacao);

        $this->atividadeDto->expects(self::once())
            ->method('getEspecieAtividade')
            ->willReturn($this->especieAtividade);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->atividadeDto, $this->atividadeEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testUsoNaoInibidoEspecieAtividade(): void
    {
        $this->parameterBag->expects(self::exactly(2))
            ->method('get')
            ->willReturnOnConsecutiveCalls(
                'PARECER (JURÍDICO) NA FORMA DA PORTARIA N° 1.399/2009, ELABORAÇÃO DE',
                'DIVISÃO DE ASSUNTOS DISCIPLINARES',
            );

        $this->especieAtividade->expects(self::exactly(2))
            ->method('getNome')
            ->willReturn('APROVAR DOCUMENTO');

        $this->atividadeDto->expects(self::exactly(2))
            ->method('getEspecieAtividade')
            ->willReturn($this->especieAtividade);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->atividadeDto, $this->atividadeEntity, 'transaction'));
    }

    /**
     * @throws RuleException
     */
    public function testUsoNaoInibidoModalidadeOrgaoCentral(): void
    {
        $this->parameterBag->expects(self::exactly(4))
            ->method('get')
            ->willReturnOnConsecutiveCalls(
                'NOTA (JURÍDICA) NA FORMA DA PORTARIA N° 1.399/2009, ELABORAÇÃO',
                'DIVISÃO DE ASSUNTOS DISCIPLINARES',
                'PGF',
                'CGU'
            );

        $this->especieAtividade->expects(self::once())
            ->method('getNome')
            ->willReturn(
                'NOTA (JURÍDICA) NA FORMA DA PORTARIA N° 1.399/2009, ELABORAÇÃO',
            );

        $this->token->expects(self::once())
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::once())
            ->method('getToken')
            ->willReturn($this->token);

        $this->modalidadeOrgaoCentral->expects(self::exactly(2))
            ->method('getValor')
            ->willReturn('AGU');

        $this->unidade->expects(self::exactly(2))
            ->method('getModalidadeOrgaoCentral')
            ->willReturn($this->modalidadeOrgaoCentral);

        $this->unidade->expects(self::once())
            ->method('getNome')
            ->willReturn('DIVISÃO DE ASSUNTOS DISCIPLINARES DIFERENTE');

        $this->setor->expects(self::exactly(3))
            ->method('getUnidade')
            ->willReturn($this->unidade);

        $this->lotacao->expects(self::exactly(3))
            ->method('getSetor')
            ->willReturn($this->setor);

        $this->lotacaoRepository->expects(self::once())
            ->method('findLotacaoPrincipal')
            ->willReturn($this->lotacao);

        $this->atividadeDto->expects(self::once())
            ->method('getEspecieAtividade')
            ->willReturn($this->especieAtividade);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->atividadeDto, $this->atividadeEntity, 'transaction'));
    }
}
