<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Tarefa/Rule0013Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Tarefa;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa as TarefaDto;
use SuppCore\AdministrativoBackend\Api\V1\Resource\AfastamentoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\LotacaoResource;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Tarefa\Rule0013;
use SuppCore\AdministrativoBackend\Entity\Colaborador;
use SuppCore\AdministrativoBackend\Entity\Lotacao;
use SuppCore\AdministrativoBackend\Entity\Setor;
use SuppCore\AdministrativoBackend\Entity\Tarefa as TarefaEntity;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Repository\AfastamentoRepository;
use SuppCore\AdministrativoBackend\Repository\LotacaoRepository;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use SuppCore\AdministrativoBackend\Transaction\Context;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Class Rule0013Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Tarefa;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0013Test extends TestCase
{
    private MockObject|AfastamentoRepository $afastamentoRepository;

    private MockObject|AfastamentoResource $afastamentoResource;

    private MockObject|Colaborador $colaboradorLotacao;

    private MockObject|Colaborador $colaboradorSetor;

    private MockObject|Colaborador $colaboradorToken;

    private MockObject|Lotacao $lotacao;

    private MockObject|LotacaoRepository $lotacaoRepository;

    private MockObject|LotacaoResource $lotacaoResource;

    private MockObject|RulesTranslate $rulesTranslate;

    private MockObject|Setor $setorLotacao;

    private MockObject|Setor $setorResponsavel;

    private MockObject|TarefaDto $tarefaDto;

    private MockObject|TarefaEntity $tarefaEntity;

    private MockObject|TokenInterface $token;

    private MockObject|TokenStorageInterface $tokenStorage;

    private MockObject|TransactionManager $transactionManager;

    private MockObject|Usuario $usuarioResponsavel;

    private MockObject|Usuario $usuarioToken;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->afastamentoRepository = $this->createMock(AfastamentoRepository::class);
        $this->afastamentoResource = $this->createMock(AfastamentoResource::class);
        $this->colaboradorLotacao = $this->createMock(Colaborador::class);
        $this->colaboradorSetor = $this->createMock(Colaborador::class);
        $this->colaboradorToken = $this->createMock(Colaborador::class);
        $this->lotacao = $this->createMock(Lotacao::class);
        $this->lotacaoRepository = $this->createMock(LotacaoRepository::class);
        $this->lotacaoResource = $this->createMock(LotacaoResource::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);
        $this->setorLotacao = $this->createMock(Setor::class);
        $this->setorResponsavel = $this->createMock(Setor::class);
        $this->tarefaDto = $this->createMock(TarefaDto::class);
        $this->tarefaEntity = $this->createMock(TarefaEntity::class);
        $this->token = $this->createMock(TokenInterface::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->transactionManager = $this->createMock(TransactionManager::class);
        $this->usuarioResponsavel = $this->createMock(Usuario::class);
        $this->usuarioToken = $this->createMock(Usuario::class);

        $this->rule = new Rule0013(
            $this->rulesTranslate,
            $this->tokenStorage,
            $this->afastamentoResource,
            $this->lotacaoResource,
            $this->transactionManager
        );
    }

    public function testUsuarioLotadoNaoDistribuidor(): void
    {
        $this->transactionManager->expects(self::once())
            ->method('getContext')
            ->willReturn(null);

        $this->lotacao->expects(self::atLeast(1))
            ->method('getColaborador')
            ->willReturn($this->colaboradorLotacao);

        $this->lotacao->expects(self::atLeast(1))
            ->method('getSetor')
            ->willReturn($this->setorLotacao);

        $this->lotacao->expects(self::atLeast(1))
            ->method('getDistribuidor')
            ->willReturn(true);

        $lotacoes = new ArrayCollection();
        $lotacoes->add($this->lotacao);

        $this->colaboradorToken->expects(self::once())
            ->method('getLotacoes')
            ->willReturn($lotacoes);

        $this->usuarioToken->expects(self::once())
            ->method('getColaborador')
            ->willReturn($this->colaboradorToken);

        $this->token->expects(self::exactly(2))
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::exactly(3))
            ->method('getToken')
            ->willReturn($this->token);

        $this->colaboradorLotacao->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(1);

        $this->setorLotacao->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(1);

        $this->colaboradorSetor->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(10);

        $this->setorResponsavel->expects(self::once())
            ->method('getLotacoes')
            ->willReturn($lotacoes);

        $this->setorResponsavel->expects(self::once())
            ->method('getApenasDistribuidor')
            ->willReturn(true);

        $this->setorResponsavel->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(5);

        $this->usuarioResponsavel->expects(self::once())
            ->method('getColaborador')
            ->willReturn($this->colaboradorSetor);

        $this->afastamentoRepository->expects(self::once())
            ->method('findAfastamento')
            ->willReturn([]);

        $this->afastamentoResource->expects(self::once())
            ->method('getRepository')
            ->willReturn($this->afastamentoRepository);

        $this->lotacaoRepository->expects(self::once())
            ->method('findIsDistribuidor')
            ->willReturn(false);

        $this->lotacaoResource->expects(self::once())
            ->method('getRepository')
            ->willReturn($this->lotacaoRepository);

        $this->tarefaDto->expects(self::atLeast(3))
            ->method('getSetorResponsavel')
            ->willReturn($this->setorResponsavel);

        $this->tarefaDto->expects(self::once())
            ->method('getUsuarioResponsavel')
            ->willReturn($this->usuarioResponsavel);

        $this->tarefaDto->expects(self::once())
            ->method('getDataHoraFinalPrazo')
            ->willReturn(new DateTime());

        $this->tarefaDto->expects(self::once())
            ->method('getVisited')
            ->willReturn(['setorResponsavel']);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->tarefaDto, $this->tarefaEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testUsuarioLotadoDistribuidor(): void
    {
        $this->transactionManager->expects(self::once())
            ->method('getContext')
            ->willReturn(null);

        $this->lotacao->expects(self::atLeast(1))
            ->method('getColaborador')
            ->willReturn($this->colaboradorLotacao);

        $this->lotacao->expects(self::atLeast(1))
            ->method('getSetor')
            ->willReturn($this->setorLotacao);

        $this->lotacao->expects(self::atLeast(1))
            ->method('getDistribuidor')
            ->willReturn(true);

        $lotacoes = new ArrayCollection();
        $lotacoes->add($this->lotacao);

        $this->colaboradorToken->expects(self::once())
            ->method('getLotacoes')
            ->willReturn($lotacoes);

        $this->usuarioToken->expects(self::once())
            ->method('getColaborador')
            ->willReturn($this->colaboradorToken);

        $this->token->expects(self::exactly(2))
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::exactly(3))
            ->method('getToken')
            ->willReturn($this->token);

        $this->colaboradorLotacao->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(1);

        $this->setorLotacao->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(1);

        $this->colaboradorSetor->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(10);

        $this->setorResponsavel->expects(self::once())
            ->method('getLotacoes')
            ->willReturn($lotacoes);

        $this->setorResponsavel->expects(self::once())
            ->method('getApenasDistribuidor')
            ->willReturn(true);

        $this->setorResponsavel->expects(self::atLeast(1))
            ->method('getId')
            ->willReturn(5);

        $this->usuarioResponsavel->expects(self::once())
            ->method('getColaborador')
            ->willReturn($this->colaboradorSetor);

        $this->afastamentoRepository->expects(self::once())
            ->method('findAfastamento')
            ->willReturn([]);

        $this->afastamentoResource->expects(self::once())
            ->method('getRepository')
            ->willReturn($this->afastamentoRepository);

        $this->lotacaoRepository->expects(self::once())
            ->method('findIsDistribuidor')
            ->willReturn(true);

        $this->lotacaoResource->expects(self::once())
            ->method('getRepository')
            ->willReturn($this->lotacaoRepository);

        $this->tarefaDto->expects(self::atLeast(3))
            ->method('getSetorResponsavel')
            ->willReturn($this->setorResponsavel);

        $this->tarefaDto->expects(self::once())
            ->method('getUsuarioResponsavel')
            ->willReturn($this->usuarioResponsavel);

        $this->tarefaDto->expects(self::once())
            ->method('getDataHoraFinalPrazo')
            ->willReturn(new DateTime());

        $this->tarefaDto->expects(self::once())
            ->method('getVisited')
            ->willReturn(['setorResponsavel']);

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->tarefaDto, $this->tarefaEntity, 'transaction'));
    }

    /**
     * @throws RuleException
     */
    public function testContextoAtividadeAprovacao(): void
    {
        $this->transactionManager->expects(self::once())
            ->method('getContext')
            ->willReturn($this->createMock(Context::class));

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->tarefaDto, $this->tarefaEntity, 'transaction'));
    }
}
