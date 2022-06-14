<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Triggers\Processo;

use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\ComponenteDigital;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Documento;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Juntada;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Processo as ProcessoDto;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ComponenteDigitalResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\DocumentoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\JuntadaResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\TipoDocumentoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\VinculacaoPessoaUsuarioResource;
use SuppCore\AdministrativoBackend\Api\V1\Triggers\Processo\Trigger0015;
use SuppCore\AdministrativoBackend\Entity\Pessoa;
use SuppCore\AdministrativoBackend\Entity\Processo as ProcessoEntity;
use SuppCore\AdministrativoBackend\Entity\Setor;
use SuppCore\AdministrativoBackend\Entity\TipoDocumento;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Entity\VinculacaoPessoaUsuario;
use SuppCore\AdministrativoBackend\Entity\Volume;
use SuppCore\AdministrativoBackend\Repository\VinculacaoPessoaUsuarioRepository;
use SuppCore\AdministrativoBackend\Triggers\TriggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Trigger0015Test.
 */
class Trigger0015Test extends TestCase
{
    private MockObject|AuthorizationCheckerInterface $authorizationChecker;

    private MockObject|ComponenteDigitalResource $componenteDigitalResource;

    private MockObject|DocumentoResource $documentoResource;

    private MockObject|JuntadaResource $juntadaResource;

    private MockObject|ParameterBagInterface $parameterBag;

    private MockObject|Pessoa $pessoa;

    private MockObject|ProcessoDto $processoDto;

    private MockObject|ProcessoEntity $processoEntity;

    private MockObject|Setor $setor;

    private MockObject|TipoDocumento $tipoDocumento;

    private MockObject|TipoDocumentoResource $tipoDocumentoResource;

    private MockObject|TokenInterface $token;

    private MockObject|TokenStorageInterface $tokenStorage;

    private MockObject|Usuario $usuarioToken;

    private MockObject|VinculacaoPessoaUsuario $vinculacaoPessoaUsuario;

    private MockObject|VinculacaoPessoaUsuarioRepository $vinculacaoPessoaUsuarioRepository;

    private MockObject|VinculacaoPessoaUsuarioResource $vinculacaoPessoaUsuarioResource;

    private MockObject|Volume $volume;

    private TriggerInterface $trigger;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authorizationChecker = $this->createMock(AuthorizationCheckerInterface::class);
        $this->componenteDigitalResource = $this->createMock(ComponenteDigitalResource::class);
        $this->documentoResource = $this->createMock(DocumentoResource::class);
        $this->juntadaResource = $this->createMock(JuntadaResource::class);
        $this->parameterBag = $this->createMock(ParameterBagInterface::class);
        $this->pessoa = $this->createMock(Pessoa::class);
        $this->processoDto = $this->createMock(ProcessoDto::class);
        $this->processoEntity = $this->createMock(ProcessoEntity::class);
        $this->setor = $this->createMock(Setor::class);
        $this->tipoDocumento = $this->createMock(TipoDocumento::class);
        $this->tipoDocumentoResource = $this->createMock(TipoDocumentoResource::class);
        $this->token = $this->createMock(TokenInterface::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->usuarioToken = $this->createMock(Usuario::class);
        $this->vinculacaoPessoaUsuario = $this->createMock(VinculacaoPessoaUsuario::class);
        $this->vinculacaoPessoaUsuarioRepository = $this->createMock(VinculacaoPessoaUsuarioRepository::class);
        $this->vinculacaoPessoaUsuarioResource = $this->createMock(VinculacaoPessoaUsuarioResource::class);
        $this->volume = $this->createMock(Volume::class);

        $this->trigger = new Trigger0015(
            $this->authorizationChecker,
            $this->tokenStorage,
            $this->componenteDigitalResource,
            $this->documentoResource,
            $this->tipoDocumentoResource,
            $this->juntadaResource,
            $this->vinculacaoPessoaUsuarioResource,
            $this->parameterBag
        );
    }

    /**
     * @throws Exception
     */
    public function testCriarDocumentoDigitalUsuarioConveniado(): void
    {
        $this->processoDto->expects(self::exactly(2))
            ->method('getRequerimento')
            ->willReturn('Requerimento');

        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn(false);

        $this->usuarioToken->expects(self::once())
            ->method('getNome')
            ->willReturn('NOME');

        $this->token->expects(self::exactly(2))
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::exactly(2))
            ->method('getToken')
            ->willReturn($this->token);

        $this->pessoa->expects(self::once())
            ->method('getNome')
            ->willReturn('NOME');

        $this->vinculacaoPessoaUsuario->expects(self::once())
            ->method('getPessoa')
            ->willReturn($this->pessoa);

        $this->vinculacaoPessoaUsuarioRepository->expects(self::once())
            ->method('findBy')
            ->willReturn([$this->vinculacaoPessoaUsuario]);

        $this->vinculacaoPessoaUsuarioResource->expects(self::once())
            ->method('getRepository')
            ->willReturn($this->vinculacaoPessoaUsuarioRepository);

        $this->setor->expects(self::once())
            ->method('getNome')
            ->willReturn('NOME');

        $this->processoDto->expects(self::once())
            ->method('getSetorAtual')
            ->willReturn($this->setor);

        $this->parameterBag->expects(self::once())
            ->method('get')
            ->willReturn('REQUERIMENTO');

        $this->tipoDocumentoResource->expects(self::once())
            ->method('findOneBy')
            ->willReturn($this->tipoDocumento);

        $this->documentoResource->expects(self::once())
            ->method('create')
            ->with(self::isInstanceOf(Documento::class), self::isType('string'));

        $this->componenteDigitalResource->expects(self::once())
            ->method('create')
            ->with(self::isInstanceOf(ComponenteDigital::class), self::isType('string'));

        $this->processoDto->expects(self::once())
            ->method('getVolumes')
            ->willReturn([$this->volume]);

        $this->juntadaResource->expects(self::once())
            ->method('create')
            ->with(self::isInstanceOf(Juntada::class), self::isType('string'));

        $this->trigger->execute($this->processoDto, $this->processoEntity, 'transaction');
    }

    /**
     * @throws Exception
     */
    public function testCriarDocumentoDigitalColaborador(): void
    {
        $this->processoDto->expects(self::once())
            ->method('getRequerimento')
            ->willReturn('Requerimento');

        $this->authorizationChecker->expects(self::once())
            ->method('isGranted')
            ->willReturn($this->trigger);

        $this->usuarioToken->expects(self::never())
            ->method('getNome')
            ->willReturn('NOME');

        $this->token->expects(self::never())
            ->method('getUser')
            ->willReturn($this->usuarioToken);

        $this->tokenStorage->expects(self::never())
            ->method('getToken')
            ->willReturn($this->token);

        $this->pessoa->expects(self::never())
            ->method('getNome')
            ->willReturn('NOME');

        $this->vinculacaoPessoaUsuario->expects(self::never())
            ->method('getPessoa')
            ->willReturn($this->pessoa);

        $this->vinculacaoPessoaUsuarioRepository->expects(self::never())
            ->method('findBy')
            ->willReturn([$this->vinculacaoPessoaUsuario]);

        $this->vinculacaoPessoaUsuarioResource->expects(self::never())
            ->method('getRepository')
            ->willReturn($this->vinculacaoPessoaUsuarioRepository);

        $this->setor->expects(self::never())
            ->method('getNome')
            ->willReturn('NOME');

        $this->processoDto->expects(self::never())
            ->method('getSetorAtual')
            ->willReturn($this->setor);

        $this->parameterBag->expects(self::never())
            ->method('get')
            ->willReturn('REQUERIMENTO');

        $this->tipoDocumentoResource->expects(self::never())
            ->method('findOneBy')
            ->willReturn($this->tipoDocumento);

        $this->documentoResource->expects(self::never())
            ->method('create')
            ->with(self::isInstanceOf(Documento::class), self::isType('string'));

        $this->componenteDigitalResource->expects(self::never())
            ->method('create')
            ->with(self::isInstanceOf(ComponenteDigital::class), self::isType('string'));

        $this->processoDto->expects(self::never())
            ->method('getVolumes')
            ->willReturn([$this->volume]);

        $this->juntadaResource->expects(self::never())
            ->method('create')
            ->with(self::isInstanceOf(Juntada::class), self::isType('string'));

        $this->trigger->execute($this->processoDto, $this->processoEntity, 'transaction');
    }
}
