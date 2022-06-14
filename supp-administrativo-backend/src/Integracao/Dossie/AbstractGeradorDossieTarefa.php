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
use SuppCore\AdministrativoBackend\Api\V1\DTO\Processo as ProcessoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Pessoa as PessoaDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa as TarefaDTO;
use SuppCore\AdministrativoBackend\Entity\Assunto as AssuntoEntity;
use SuppCore\AdministrativoBackend\Entity\Dossie as DossieEntity;
use SuppCore\AdministrativoBackend\Entity\Interessado as InteressadoEntity;
use SuppCore\AdministrativoBackend\Entity\Pessoa as PessoaEntity;
use SuppCore\AdministrativoBackend\Entity\Processo as ProcessoEntity;
use SuppCore\AdministrativoBackend\Entity\Tarefa as TarefaEntity;

/**
 * Class AbstractGeradorDossie.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
abstract class AbstractGeradorDossieTarefa extends AbstractGeradorDossie
{
    /**
     *
     */
    abstract protected function getConfig(): array;

    /**
     * @return string[]
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function getParams(): array
    {
        $config = $this->getConfig();
        return [
            'ativo'                      => $this->getStrParam($config['ativo'] ?? 'undefined'),
            'pesquisa_assunto_pai'       => $this->getStrParam($config['pesquisa_assunto_pai'] ?? 'undefined'),
            'num_max_interessados'       => $this->getStrParam($config['num_max_interessados'] ?? 'undefined'),
            'template'                   => $this->getStrParam($config['template'] ?? 'undefined'),
            'tarefas_suportadas'         => $this->getStrParam($config['tarefas_suportadas'] ?? 'undefined'),
            'assuntos_suportados'        => $this->getStrParam($config['assuntos_suportados'] ?? 'undefined'),
            'siglas_unidades_suportadas' => $this->getStrParam($config['siglas_unidades_suportadas'] ?? 'undefined'),
        ];
    }

    /**
     * @param TarefaEntity|TarefaDTO $tarefa
     * @param InteressadoEntity|InteressadoDTO $interessado
     *
     * @return bool
     */
    public function supports(TarefaEntity|TarefaDTO $tarefa, InteressadoEntity|InteressadoDTO $interessado): bool
    {
        return
            $this->isDossieAtivo() &&
            $this->pessoaSuportada($interessado) &&
            $this->tarefaSuportada($tarefa) &&
            $this->numeroInteressadosSuportado($tarefa) &&
            $this->assuntoSuportado($tarefa) &&
            $this->unidadeSuportada($tarefa);
    }

    /**
     * @param TarefaEntity|TarefaDTO $tarefa
     * @param InteressadoEntity|InteressadoDTO $interessado
     *
     * @return bool
     */
    public function supportsSobDemanda(DossieEntity | DossieDTO $dossie): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isDossieAtivo(): bool
    {
        $config = $this->getConfig();

        return $config['ativo'] ?? false;
    }

    /**
     * @param InteressadoEntity|InteressadoDTO $interessado
     *
     * @return bool
     */
    public function pessoaSuportada(InteressadoEntity|InteressadoDTO $interessado): bool
    {
        return
            (strlen($interessado->getPessoa()->getNumeroDocumentoPrincipal()) === 11 ) ||
            (strlen($interessado->getPessoa()->getNumeroDocumentoPrincipal()) === 14 );
    }

    /**
     * @param TarefaEntity|TarefaDTO $tarefa
     *
     * @return bool
     */
    public function tarefaSuportada(TarefaEntity|TarefaDTO $tarefa): bool
    {
        $config = $this->getConfig();
        $tarefasSuportadas = $config['tarefas_suportadas'] ?? [];

        if (in_array('*', $tarefasSuportadas, true)) {
            return true;
        }

        return in_array($tarefa->getEspecieTarefa()->getNome(), $tarefasSuportadas, true);
    }

    /**
     * @param TarefaEntity|TarefaDTO $tarefa
     *
     * @return bool
     */
    public function numeroInteressadosSuportado(TarefaEntity|TarefaDTO $tarefa): bool
    {
        $config = $this->getConfig();
        if (!isset($config['num_max_interessados'])) {
            return false;
        }

        return $tarefa->getProcesso()->getInteressados()->count() <= intval($config['num_max_interessados']);
    }

    /**
     * @param TarefaEntity|TarefaDTO $tarefa
     *
     * @return bool
     */
    public function assuntoSuportado(TarefaEntity|TarefaDTO $tarefa): bool
    {
        $config = $this->getConfig();
        $pesquisaAssuntoPai = $config['pesquisa_assunto_pai'] ?? false;
        $assuntosSuportados = $config['assuntos_suportados'] ?? [];

        if (in_array('*', $assuntosSuportados, true)) {
            return true;
        }

        /** @var AssuntoEntity $assuntoBase */
        $assuntos = [];
        foreach ($tarefa->getProcesso()->getAssuntos() as $assuntoBase) {
            $assuntos[] = $assuntoBase->getAssuntoAdministrativo()->getNome();
            if ($pesquisaAssuntoPai) {
                $proximoAssunto = $assuntoBase->getAssuntoAdministrativo();
                /* @noinspection PhpAssignmentInConditionInspection */
                while ($proximoAssunto = $proximoAssunto->getParent()) {
                    $assuntos[] = $proximoAssunto->getNome();
                }
            }
        }

        return count(array_intersect($assuntos, $assuntosSuportados)) > 0;
    }

    /**
     * @param TarefaEntity|TarefaDTO $tarefa
     *
     * @return bool
     */
    public function unidadeSuportada(TarefaEntity|TarefaDTO $tarefa): bool
    {
        $config = $this->getConfig();
        $unidadesSuportadas = $config['siglas_unidades_suportadas'] ?? [];
        if (in_array('*', $unidadesSuportadas, true)) {
            return true;
        }

        return in_array($tarefa->getSetorResponsavel()->getUnidade()->getSigla(), $unidadesSuportadas, true);
    }
}
