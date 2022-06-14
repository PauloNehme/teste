<?php

declare(strict_types=1);
/**
 * /src/Entity/VinculacaoEtiqueta.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Entity;

use DateTime;
use DMS\Filter\Rules as Filter;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use SuppCore\AdministrativoBackend\Entity\Traits\Blameable;
use SuppCore\AdministrativoBackend\Entity\Traits\Id;
use SuppCore\AdministrativoBackend\Entity\Traits\Softdeleteable;
use SuppCore\AdministrativoBackend\Entity\Traits\Timestampable;
use SuppCore\AdministrativoBackend\Entity\Traits\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class VinculacaoEtiqueta.
 *
 *  @ORM\Table(
 *     name="ad_vinc_etiqueta",
 * )
 * @ORM\Entity()
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 *
 * @Gedmo\SoftDeleteable(fieldName="apagadoEm")
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class VinculacaoEtiqueta implements EntityInterface
{
    // Traits
    use Blameable;
    use Timestampable;
    use Softdeleteable;
    use Id;
    use Uuid;

    /**
     * Constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @Assert\NotNull(
     *     message="O campo não pode ser nulo!"
     * )
     *
     * @ORM\ManyToOne(
     *     targetEntity="Etiqueta",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="etiqueta_id",
     *     referencedColumnName="id",
     *     nullable=false
     * )
     */
    protected ?Etiqueta $etiqueta = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Tarefa",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="tarefa_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Tarefa $tarefa = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Documento",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="documento_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Documento $documento = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Processo",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="processo_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Processo $processo = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Relatorio",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="relatorio_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Relatorio $relatorio = null;

    /**
     * @Assert\Length(
     *     max = 4000,
     *     maxMessage = "O campo deve ter no máximo {{ limit }} caracteres!"
     * )
     *
     * @Filter\StripTags()
     * @Filter\Trim()
     * @Filter\StripNewlines()
     * @Filter\ToUpper(encoding="UTF-8")
     * @ORM\Column(
     *     type="text",
     *     nullable=true
     * )
     */
    protected ?string $conteudo = null;

    /**
     * @ORM\Column(
     *     name="data_expiracao",
     *     type="datetime",
     *     nullable=true
     * )
     */
    protected ?DateTime $dataHoraExpiracao = null;

    /**
     * @ORM\Column(
     *     type="boolean",
     *     nullable=true
     * )
     */
    protected bool $privada = false;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Usuario",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="usuario_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Usuario $usuario = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Setor",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="setor_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Setor $setor = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Setor"
     * )
     * @ORM\JoinColumn(
     *     name="unidade_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Setor $unidade = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="ModalidadeOrgaoCentral",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="mod_orgao_central_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?ModalidadeOrgaoCentral $modalidadeOrgaoCentral = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="DocumentoAvulso",
     *     inversedBy="vinculacoesEtiquetas"
     * )
     * @ORM\JoinColumn(
     *     name="documento_avulso_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?DocumentoAvulso $documentoAvulso = null;

    /**
     * @ORM\Column(
     *     type="text",
     *     name="object_class",
     *     nullable=true
     * )
     */
    protected ?string $objectClass = null;

    /**
     * @ORM\Column(
     *     type="text",
     *     name="object_uuid",
     *     nullable=true
     * )
     */
    protected ?string $objectUuid = null;

    /**
     * @ORM\Column(
     *     type="text",
     *     nullable=true
     * )
     */
    protected ?string $label = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="RegraEtiqueta"
     * )
     * @ORM\JoinColumn(
     *     name="regra_etiqueta_origem_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?RegraEtiqueta $regraEtiquetaOrigem = null;

    /**
     * @ORM\Column(
     *     type="boolean",
     *     nullable=true
     * )
     */
    protected ?bool $sugestao = null;

    /**
     * @ORM\Column(
     *     type="datetime",
     *     name="data_hora_aprov_sugestao",
     *     nullable=true
     * )
     */
    protected ?DateTime $dataHoraAprovacaoSugestao = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Usuario"
     * )
     * @ORM\JoinColumn(
     *     name="usuario_aprov_sugestao_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Usuario $usuarioAprovacaoSugestao = null;

    /**
     * @return Etiqueta|null
     */
    public function getEtiqueta(): ?Etiqueta
    {
        return $this->etiqueta;
    }

    /**
     * @param Etiqueta|null $etiqueta
     *
     * @return VinculacaoEtiqueta
     */
    public function setEtiqueta(?Etiqueta $etiqueta): self
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * @return Usuario|null
     */
    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    /**
     * @param Usuario|null $usuario
     *
     * @return VinculacaoEtiqueta
     */
    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return Tarefa|null
     */
    public function getTarefa(): ?Tarefa
    {
        return $this->tarefa;
    }

    /**
     * @param Tarefa|null $tarefa
     *
     * @return VinculacaoEtiqueta
     */
    public function setTarefa(?Tarefa $tarefa): self
    {
        $this->tarefa = $tarefa;

        return $this;
    }

    /**
     * @return Documento|null
     */
    public function getDocumento(): ?Documento
    {
        return $this->documento;
    }

    /**
     * @param Documento|null $documento
     *
     * @return VinculacaoEtiqueta
     */
    public function setDocumento(?Documento $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * @return Processo|null
     */
    public function getProcesso(): ?Processo
    {
        return $this->processo;
    }

    /**
     * @param Processo|null $processo
     *
     * @return VinculacaoEtiqueta
     */
    public function setProcesso(?Processo $processo): self
    {
        $this->processo = $processo;

        return $this;
    }

    /**
     * @return Setor|null
     */
    public function getSetor(): ?Setor
    {
        return $this->setor;
    }

    /**
     * @param Setor|null $setor
     */
    public function setSetor(?Setor $setor): void
    {
        $this->setor = $setor;
    }

    /**
     * @return Setor|null
     */
    public function getUnidade(): ?Setor
    {
        return $this->unidade;
    }

    /**
     * @param Setor|null $unidade
     */
    public function setUnidade(?Setor $unidade): void
    {
        $this->unidade = $unidade;
    }

    /**
     * @return ModalidadeOrgaoCentral|null
     */
    public function getModalidadeOrgaoCentral(): ?ModalidadeOrgaoCentral
    {
        return $this->modalidadeOrgaoCentral;
    }

    /**
     * @param ModalidadeOrgaoCentral|null $modalidadeOrgaoCentral
     */
    public function setModalidadeOrgaoCentral(?ModalidadeOrgaoCentral $modalidadeOrgaoCentral): void
    {
        $this->modalidadeOrgaoCentral = $modalidadeOrgaoCentral;
    }

    /**
     * @return string|null
     */
    public function getConteudo(): ?string
    {
        return $this->conteudo;
    }

    /**
     * @param string|null $conteudo
     *
     * @return VinculacaoEtiqueta
     */
    public function setConteudo(?string $conteudo): self
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPrivada(): bool
    {
        return $this->privada;
    }

    /**
     * @param bool $privada
     *
     * @return VinculacaoEtiqueta
     */
    public function setPrivada(bool $privada): self
    {
        $this->privada = $privada;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataHoraExpiracao(): ?DateTime
    {
        return $this->dataHoraExpiracao;
    }

    /**
     * @param DateTime|null $dataHoraExpiracao
     *
     * @return VinculacaoEtiqueta
     */
    public function setDataHoraExpiracao(?DateTime $dataHoraExpiracao): self
    {
        $this->dataHoraExpiracao = $dataHoraExpiracao;

        return $this;
    }

    /**
     * @return DocumentoAvulso|null
     */
    public function getDocumentoAvulso(): ?DocumentoAvulso
    {
        return $this->documentoAvulso;
    }

    /**
     * @param DocumentoAvulso|null $documentoAvulso
     *
     * @return VinculacaoEtiqueta
     */
    public function setDocumentoAvulso(?DocumentoAvulso $documentoAvulso): self
    {
        $this->documentoAvulso = $documentoAvulso;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getObjectClass(): ?string
    {
        return $this->objectClass;
    }

    /**
     * @param string|null $objectClass
     *
     * @return VinculacaoEtiqueta
     */
    public function setObjectClass(?string $objectClass): self
    {
        $this->objectClass = $objectClass;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getObjectUuid(): ?string
    {
        return $this->objectUuid;
    }

    /**
     * @param string|null $objectUuid
     *
     * @return VinculacaoEtiqueta
     */
    public function setObjectUuid(?string $objectUuid): self
    {
        $this->objectUuid = $objectUuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     *
     * @return VinculacaoEtiqueta
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Relatorio|null
     */
    public function getRelatorio(): ?Relatorio
    {
        return $this->relatorio;
    }

    /**
     * @param Relatorio|null $relatorio
     *
     * @return VinculacaoEtiqueta
     */
    public function setRelatorio(?Relatorio $relatorio): self
    {
        $this->relatorio = $relatorio;

        return $this;
    }

    /**
     * @return RegraEtiqueta|null
     */
    public function getRegraEtiquetaOrigem(): ?RegraEtiqueta
    {
        return $this->regraEtiquetaOrigem;
    }

    /**
     * @param RegraEtiqueta|null $regraEtiquetaOrigem
     */
    public function setRegraEtiquetaOrigem(?RegraEtiqueta $regraEtiquetaOrigem): void
    {
        $this->regraEtiquetaOrigem = $regraEtiquetaOrigem;
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
    public function setSugestao(?bool $sugestao): VinculacaoEtiqueta
    {
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
    public function setDataHoraAprovacaoSugestao(?DateTime $dataHoraAprovacaoSugestao): VinculacaoEtiqueta
    {
        $this->dataHoraAprovacaoSugestao = $dataHoraAprovacaoSugestao;

        return $this;
    }

    /**
     * @return Usuario|null
     */
    public function getUsuarioAprovacaoSugestao(): ?Usuario
    {
        return $this->usuarioAprovacaoSugestao;
    }

    /**
     * @param Usuario|null $usuarioAprovacaoSugestao
     * @return VinculacaoEtiqueta
     */
    public function setUsuarioAprovacaoSugestao(?Usuario $usuarioAprovacaoSugestao): VinculacaoEtiqueta
    {
        $this->usuarioAprovacaoSugestao = $usuarioAprovacaoSugestao;

        return $this;
    }
}
