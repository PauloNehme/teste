<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/VinculacaoEtiqueta.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\DTO;

use DateTime;
use DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Documento as DocumentoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\DocumentoAvulso as DocumentoAvulsoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Etiqueta as EtiquetaDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\ModalidadeOrgaoCentral as ModalidadeOrgaoCentralDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Processo as ProcessoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\RegraEtiqueta as RegraEtiquetaDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Relatorio as RelatorioDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Setor as SetorDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa as TarefaDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario as UsuarioDTO;
use SuppCore\AdministrativoBackend\DTO\RestDto;
use SuppCore\AdministrativoBackend\DTO\Traits\Blameable;
use SuppCore\AdministrativoBackend\DTO\Traits\IdUuid;
use SuppCore\AdministrativoBackend\DTO\Traits\Softdeleteable;
use SuppCore\AdministrativoBackend\DTO\Traits\Timeblameable;
use SuppCore\AdministrativoBackend\Entity\Documento as DocumentoEntity;
use SuppCore\AdministrativoBackend\Entity\DocumentoAvulso as DocumentoAvulsoEntity;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Etiqueta as EtiquetaEntity;
use SuppCore\AdministrativoBackend\Entity\ModalidadeOrgaoCentral as ModalidadeOrgaoCentralEntity;
use SuppCore\AdministrativoBackend\Entity\Processo as ProcessoEntity;
use SuppCore\AdministrativoBackend\Entity\RegraEtiqueta as RegraEtiquetaEntity;
use SuppCore\AdministrativoBackend\Entity\Relatorio as RelatorioEntity;
use SuppCore\AdministrativoBackend\Entity\Setor as SetorEntity;
use SuppCore\AdministrativoBackend\Entity\Tarefa as TarefaEntity;
use SuppCore\AdministrativoBackend\Entity\Usuario as UsuarioEntity;
use SuppCore\AdministrativoBackend\Form\Annotations as Form;
use SuppCore\AdministrativoBackend\Mapper\Annotations as DTOMapper;
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class VinculacaoEtiqueta.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @DTOMapper\JsonLD(
 *     jsonLDId="/v1/administrativo/vinculacao_etiqueta/{id}",
 *     jsonLDType="VinculacaoEtiqueta",
 *     jsonLDContext="/api/doc/#model-VinculacaoEtiqueta"
 * )
 *
 * @Form\Form()
 */
class VinculacaoEtiqueta extends RestDto
{
    use IdUuid;
    use Timeblameable;
    use Blameable;
    use Softdeleteable;

    /**
     * @Form\Field(
     *     "Symfony\Component\Form\Extension\Core\Type\TextType",
     *     required=true
     * )
     *
     * @Assert\Length(
     *     max = 4000,
     *     maxMessage = "O campo deve ter no máximo { 4000 } caracteres!"
     * )
     *
     * @Filter\StripTags()
     * @Filter\Trim()
     * @Filter\StripNewlines()
     * @Filter\ToUpper(encoding="UTF-8")
     *
     * @OA\Property(type="string")
     * @DTOMapper\Property()
     */
    protected ?string $conteudo = null;

    /**
     * @Form\Field(
     *     "Symfony\Component\Form\Extension\Core\Type\CheckboxType",
     *     required=false
     * )
     *
     * @OA\Property(type="boolean")
     * @DTOMapper\Property()
     */
    protected ?bool $privada = null;

    /**
     * @Form\Field(
     *     "Symfony\Component\Form\Extension\Core\Type\DateTimeType",
     *     widget="single_text",
     *     required=false
     * )
     *
     * @OA\Property(type="string", format="date-time")
     * @DTOMapper\Property()
     */
    protected ?DateTime $dataHoraExpiracao = null;

    /**
     * @Assert\NotNull(
     *     message="O campo não pode ser nulo!"
     * )
     *
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Etiqueta",
     *     required=true,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=EtiquetaDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Etiqueta")
     */
    protected ?EntityInterface $etiqueta = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Tarefa",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=TarefaDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa")
     */
    protected ?EntityInterface $tarefa = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Documento",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=DocumentoDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Documento")
     */
    protected ?EntityInterface $documento = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Usuario",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=UsuarioDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario")
     */
    protected ?EntityInterface $usuario = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Processo",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=ProcessoDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Processo")
     */
    protected ?EntityInterface $processo = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Setor",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=SetorDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Setor")
     */
    protected ?EntityInterface $setor = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Setor",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=SetorDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Setor")
     */
    protected ?EntityInterface $unidade = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\ModalidadeOrgaoCentral",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=ModalidadeOrgaoCentralDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\ModalidadeOrgaoCentral")
     */
    protected ?EntityInterface $modalidadeOrgaoCentral = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\DocumentoAvulso",
     *     required=false,
     *     methods={
     *          @Form\Method(
     *              "createMethod"
     *          ),
     *          @Form\Method(
     *              "updateMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          ),
     *          @Form\Method(
     *              "patchMethod",
     *              roles={
     *                  "ROLE_ROOT"
     *              }
     *          )
     *     }
     * )
     *
     * @OA\Property(ref=@Model(type=DocumentoAvulsoDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\DocumentoAvulso")
     */
    protected ?EntityInterface $documentoAvulso = null;

    /**
     * @OA\Property(type="string")
     * @DTOMapper\Property()
     */
    protected ?string $label = null;

    /**
     * @OA\Property(type="string")
     * @DTOMapper\Property()
     */
    protected ?string $objectClass = null;

    /**
     * @OA\Property(type="string")
     * @DTOMapper\Property()
     */
    protected ?string $objectUuid = null;

    /**
     * @OA\Property(type="integer")
     */
    protected ?int $objectId = null;

    /**
     * @OA\Property(type="string")
     */
    protected ?string $objectContext = null;

    /**
     * @Form\Field(
     *     "Symfony\Bridge\Doctrine\Form\Type\EntityType",
     *     class="SuppCore\AdministrativoBackend\Entity\Relatorio",
     *     required=false
     * )
     *
     * @OA\Property(ref=@Model(type=RelatorioDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Relatorio")
     */
    protected ?EntityInterface $relatorio = null;

    /**
     * @OA\Property(ref=@Model(type=RegraEtiquetaDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\RegraEtiqueta")
     */
    protected ?EntityInterface $regraEtiquetaOrigem = null;

    /**
     * @Form\Field(
     *     "Symfony\Component\Form\Extension\Core\Type\CheckboxType",
     *     required=false
     * )
     *
     * @OA\Property(type="boolean")
     * @DTOMapper\Property()
     */
    protected ?bool $sugestao = null;

    /**
     * @OA\Property(type="string", format="date-time")
     * @DTOMapper\Property()
     */
    protected ?DateTime $dataHoraAprovacaoSugestao = null;

    /**
     * @OA\Property(ref=@Model(type=UsuarioDTO::class))
     * @DTOMapper\Property(dtoClass="SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario")
     */
    protected ?EntityInterface $usuarioAprovacaoSugestao = null;

    /**
     * @return EntityInterface|EtiquetaDTO|EtiquetaEntity|null
     */
    public function getEtiqueta(): ?EntityInterface
    {
        return $this->etiqueta;
    }

    /**
     * @param EntityInterface|EtiquetaDTO|EtiquetaEntity|null $etiqueta
     */
    public function setEtiqueta(?EntityInterface $etiqueta): self
    {
        $this->setVisited('etiqueta');

        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * @return EntityInterface|TarefaDTO|TarefaEntity|null
     */
    public function getTarefa(): ?EntityInterface
    {
        return $this->tarefa;
    }

    /**
     * @param EntityInterface|TarefaDTO|TarefaEntity|null $tarefa
     */
    public function setTarefa(?EntityInterface $tarefa): self
    {
        $this->setVisited('tarefa');

        $this->tarefa = $tarefa;

        return $this;
    }

    /**
     * @return EntityInterface|DocumentoDTO|DocumentoEntity|null
     */
    public function getDocumento(): ?EntityInterface
    {
        return $this->documento;
    }

    /**
     * @param EntityInterface|DocumentoDTO|DocumentoEntity|null $documento
     */
    public function setDocumento(?EntityInterface $documento): self
    {
        $this->setVisited('documento');

        $this->documento = $documento;

        return $this;
    }

    /**
     * @return EntityInterface|UsuarioDTO|UsuarioEntity|null
     */
    public function getUsuario(): ?EntityInterface
    {
        return $this->usuario;
    }

    /**
     * @param EntityInterface|UsuarioDTO|UsuarioEntity|null $usuario
     */
    public function setUsuario(?EntityInterface $usuario): self
    {
        $this->setVisited('usuario');

        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return EntityInterface|ProcessoDTO|ProcessoEntity|null
     */
    public function getProcesso(): ?EntityInterface
    {
        return $this->processo;
    }

    /**
     * @param EntityInterface|ProcessoDTO|ProcessoEntity|null $processo
     */
    public function setProcesso(?EntityInterface $processo): self
    {
        $this->setVisited('processo');

        $this->processo = $processo;

        return $this;
    }

    public function getDataHoraExpiracao(): ?DateTime
    {
        return $this->dataHoraExpiracao;
    }

    public function setDataHoraExpiracao(?DateTime $dataHoraExpiracao): self
    {
        $this->setVisited('dataHoraExpiracao');

        $this->dataHoraExpiracao = $dataHoraExpiracao;

        return $this;
    }

    public function getConteudo(): ?string
    {
        return $this->conteudo;
    }

    public function setConteudo(?string $conteudo): self
    {
        $this->setVisited('conteudo');

        $this->conteudo = $conteudo;

        return $this;
    }

    public function getPrivada(): ?bool
    {
        return $this->privada;
    }

    public function setPrivada(?bool $privada): self
    {
        $this->setVisited('privada');

        $this->privada = $privada;

        return $this;
    }

    /**
     * @return EntityInterface|SetorDTO|SetorEntity|null
     */
    public function getSetor(): ?EntityInterface
    {
        return $this->setor;
    }

    /**
     * @param EntityInterface|SetorDTO|SetorEntity|null $setor
     */
    public function setSetor(?EntityInterface $setor): self
    {
        $this->setVisited('setor');

        $this->setor = $setor;

        return $this;
    }

    /**
     * @return EntityInterface|SetorDTO|SetorEntity|null
     */
    public function getUnidade(): ?EntityInterface
    {
        return $this->unidade;
    }

    /**
     * @param EntityInterface|SetorDTO|SetorEntity|null $unidade
     */
    public function setUnidade(?EntityInterface $unidade): self
    {
        $this->setVisited('unidade');

        $this->unidade = $unidade;

        return $this;
    }

    /**
     * @return EntityInterface|ModalidadeOrgaoCentralDTO|ModalidadeOrgaoCentralEntity|null
     */
    public function getModalidadeOrgaoCentral(): ?EntityInterface
    {
        return $this->modalidadeOrgaoCentral;
    }

    /**
     * @param EntityInterface|ModalidadeOrgaoCentralDTO|ModalidadeOrgaoCentralEntity|null $modalidadeOrgaoCentral
     */
    public function setModalidadeOrgaoCentral(?EntityInterface $modalidadeOrgaoCentral): self
    {
        $this->setVisited('modalidadeOrgaoCentral');

        $this->modalidadeOrgaoCentral = $modalidadeOrgaoCentral;

        return $this;
    }

    /**
     * @return EntityInterface|DocumentoAvulsoDTO|DocumentoAvulsoEntity|null
     */
    public function getDocumentoAvulso(): ?EntityInterface
    {
        return $this->documentoAvulso;
    }

    /**
     * @param EntityInterface|DocumentoAvulsoDTO|DocumentoAvulsoEntity|null $documentoAvulso
     */
    public function setDocumentoAvulso(?EntityInterface $documentoAvulso): self
    {
        $this->setVisited('documentoAvulso');

        $this->documentoAvulso = $documentoAvulso;

        return $this;
    }

    /**
     * @var bool|null
     *
     * @OA\Property(type="boolean")
     */
    protected $podeAlterarConteudo;

    public function getPodeAlterarConteudo(): ?bool
    {
        return $this->podeAlterarConteudo;
    }

    public function setPodeAlterarConteudo(?bool $podeAlterarConteudo): self
    {
        $this->setVisited('podeAlterarConteudo');

        $this->podeAlterarConteudo = $podeAlterarConteudo;

        return $this;
    }

    /**
     * @var bool|null
     *
     * @OA\Property(type="boolean")
     */
    protected $podeExcluir;

    public function getPodeExcluir(): ?bool
    {
        return $this->podeExcluir;
    }

    public function setPodeExcluir(?bool $podeExcluir): self
    {
        $this->setVisited('podeExcluir');

        $this->podeExcluir = $podeExcluir;

        return $this;
    }

    public function setLabel(?string $label): self
    {
        $this->setVisited('label');

        $this->label = $label;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setObjectClass(?string $objectClass): self
    {
        $this->setVisited('objectClass');

        $this->objectClass = $objectClass;

        return $this;
    }

    public function getObjectClass(): ?string
    {
        return $this->objectClass;
    }

    public function setObjectUuid(?string $objectUuid): self
    {
        $this->setVisited('objectUuid');

        $this->objectUuid = $objectUuid;

        return $this;
    }

    public function getObjectUuid(): ?string
    {
        return $this->objectUuid;
    }

    public function setObjectContext(?string $objectContext): self
    {
        $this->setVisited('objectContext');

        $this->objectContext = $objectContext;

        return $this;
    }

    public function getObjectContext(): ?string
    {
        return $this->objectContext;
    }

    public function setObjectId(?int $objectId): self
    {
        $this->setVisited('objectId');

        $this->objectId = $objectId;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * @return EntityInterface|RelatorioDTO|RelatorioEntity|null
     */
    public function getRelatorio(): ?EntityInterface
    {
        return $this->relatorio;
    }

    /**
     * @param EntityInterface|RelatorioDTO|RelatorioEntity|null $relatorio
     */
    public function setRelatorio(?EntityInterface $relatorio): self
    {
        $this->setVisited('relatorio');

        $this->relatorio = $relatorio;

        return $this;
    }

    /**
     * @return EntityInterface|RegraEtiquetaDTO|RegraEtiquetaEntity|null
     */
    public function getRegraEtiquetaOrigem(): ?EntityInterface
    {
        return $this->regraEtiquetaOrigem;
    }

    /**
     * @param EntityInterface|RegraEtiquetaDTO|RegraEtiquetaEntity|null $regraEtiquetaOrigem
     */
    public function setRegraEtiquetaOrigem(?EntityInterface $regraEtiquetaOrigem): self
    {
        $this->setVisited('regraEtiquetaOrigem');

        $this->regraEtiquetaOrigem = $regraEtiquetaOrigem;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSugestao(): ?bool
    {
        return $this->sugestao;
    }

    /**
     * @param bool|null $sugestao
     * @return VinculacaoEtiqueta
     */
    public function setSugestao(?bool $sugestao): self
    {
        $this->setVisited('sugestao');
        $this->sugestao = $sugestao;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataHoraAprovacaoSugestao(): ?DateTime
    {
        return $this->dataHoraAprovacaoSugestao;
    }

    /**
     * @param DateTime|null $dataHoraAprovacaoSugestao
     * @return VinculacaoEtiqueta
     */
    public function setDataHoraAprovacaoSugestao(?DateTime $dataHoraAprovacaoSugestao): self
    {
        $this->setVisited('dataHoraAprovacaoSugestao');
        $this->dataHoraAprovacaoSugestao = $dataHoraAprovacaoSugestao;

        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getUsuarioAprovacaoSugestao(): ?EntityInterface
    {
        return $this->usuarioAprovacaoSugestao;
    }

    /**
     * @param EntityInterface|null $usuarioAprovacaoSugestao
     * @return VinculacaoEtiqueta
     */
    public function setUsuarioAprovacaoSugestao(?EntityInterface $usuarioAprovacaoSugestao): self
    {
        $this->setVisited('usuarioAprovacaoSugestao');
        $this->usuarioAprovacaoSugestao = $usuarioAprovacaoSugestao;

        return $this;
    }
}
