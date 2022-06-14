<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);
/**
 * /src/Integracao/Dossie/AbstractGeradorDossie.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Integracao\Dossie;

use SuppCore\AdministrativoBackend\Api\V1\DTO\Dossie as DossieDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Interessado as InteressadoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa as TarefaDTO;
use SuppCore\AdministrativoBackend\Api\V1\Resource\TipoDossieResource;
use SuppCore\AdministrativoBackend\Entity\Dossie as DossieEntity;
use SuppCore\AdministrativoBackend\Entity\Interessado as InteressadoEntity;
use SuppCore\AdministrativoBackend\Entity\Tarefa as TarefaEntity;
use SuppCore\AdministrativoBackend\Entity\TipoDossie as TipoDossieEntity;
use SuppCore\AdministrativoBackend\Integracao\Dossie\Operacoes\GerarDossie\Message\GerarDossieMessage;

/**
 * Class AbstractGeradorDossie.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
abstract class AbstractGeradorDossie
{
    private TipoDossieResource $tipoDossieResource;

    /**
     * @param DossieEntity|DossieDTO $dossie
     * @param bool                   $geraDocumento
     *
     * @return DossieGerado
     */
    abstract public function geraDossie(DossieEntity | DossieDTO $dossie, bool $geraDocumento = true): DossieGerado;

    /**
     * @param TarefaEntity|TarefaDTO           $tarefa
     * @param InteressadoEntity|InteressadoDTO $interessado
     *
     * @return bool
     */
    public function supports(TarefaEntity | TarefaDTO $tarefa, InteressadoEntity | InteressadoDTO $interessado): bool
    {
        return true;
    }


    /**
     * @param InteressadoEntity|InteressadoDTO $interessado
     *
     * @return bool
     */
    public function supportsSobDemanda(DossieEntity | DossieDTO $dossie): bool
    {
        return true;
    }
    
    /**
     * @return string
     */
    abstract public function getNomeTipoDossie() : string;


    /**
     * @required
     * @param TipoDossieResource $tipoDossieResource
     */
    public function setDepedencies(TipoDossieResource $tipoDossieResource): void
    {
        $this->tipoDossieResource = $tipoDossieResource;
    }

    /**
     * @return TipoDossieEntity|null
     */
    final public function getTipoDossie(): ?TipoDossieEntity
    {
        return $this
            ->tipoDossieResource
            ->findOneBy(['nome' => $this->getNomeTipoDossie()]);
    }

    /**
     * @param mixed $param
     *
     * @return string
     */
    protected function getStrParam(mixed $param): string
    {
        /* @noinspection PhpAssignmentInConditionInspection */
        return match (gettype($param)) {
            'integer', 'double' => strval($param),
            'string'            => $param,
            'boolean'           => $param ? 'true' : 'false',
            'NULL'              => 'null',
            'array', 'object'   => ($json = json_encode($param)) !== false ? $json : 'invalid json'
        };
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getGrupo(): string
    {
        return $this::class;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return PHP_INT_MAX;
    }

    /**
     * @param string   $dossieUuid
     * @param int|null $usuarioId
     *
     * @return object
     */
    public function getMessageClass(
        string $dossieUuid,
        ?int $usuarioId = null,
        ?bool $sobDemanda = false
    ): object {
        return new GerarDossieMessage(
            $dossieUuid,
            $usuarioId,
            $sobDemanda
        );
    }
}
