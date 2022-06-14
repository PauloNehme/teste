<?php /** @noinspection ALL */

declare(strict_types=1);

/**
 * src/Integracao/Dossie/Operacoes/GerarDossie/MessageHandler/GerarDossie.php.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Integracao\Dossie\Operacoes\GerarDossie\MessageHandler;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Exception;
use DateTime;
use Gedmo\Blameable\BlameableListener;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Dossie as DossieDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Interessado as InteressadoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Notificacao;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Notificacao as NotificacaoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\OrigemDados as OrigemDadosDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa as TarefaDTO;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ModalidadeNotificacaoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\NotificacaoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\OrigemDadosResource;
use SuppCore\AdministrativoBackend\Entity\Dossie as DossieEntity;
use SuppCore\AdministrativoBackend\Entity\Interessado as InteressadoEntity;
use SuppCore\AdministrativoBackend\Entity\Pessoa as PessoaEntity;
use SuppCore\AdministrativoBackend\Entity\Processo as ProcessoEntity;
use SuppCore\AdministrativoBackend\Entity\Tarefa as TarefaEntity;
use SuppCore\AdministrativoBackend\Entity\TipoDossie as TipoDossieEntity;
use SuppCore\AdministrativoBackend\Security\InternalLogInService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use function strlen;
use SuppCore\AdministrativoBackend\Api\V1\DTO\ComponenteDigital;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Documento as DocumentoDTO;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Dossie;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Juntada;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ComponenteDigitalResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\DocumentoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\DossieResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\JuntadaResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ProcessoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\TipoDocumentoResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\VolumeResource;
use SuppCore\AdministrativoBackend\Entity\Documento as DocumentoEntity;
use SuppCore\AdministrativoBackend\Integracao\Dossie\DossieManager;
use SuppCore\AdministrativoBackend\Integracao\Dossie\Operacoes\GerarDossie\Message\GerarDossieMessage;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Doctrine\Common\Annotations\AnnotationException;
use ReflectionException;

/**
 * Class GerarDossieMessageHandler.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 */
class GerarDossieService
{
    /**
     * GerarDossieMessageHandler constructor.
     *
     * @param TransactionManager        $transactionManager
     * @param DossieManager             $dossieManager
     * @param DossieResource            $dossieResource
     * @param ProcessoResource          $processoResource
     * @param DocumentoResource         $documentoResource
     * @param ComponenteDigitalResource $componenteDigitalResource
     * @param TipoDocumentoResource     $tipoDocumentoResource
     * @param JuntadaResource           $juntadaResource
     * @param VolumeResource            $volumeResource
     */
    public function __construct(
        private BlameableListener $blameableListener,
        private InternalLogInService $internalLogInService,
        private TransactionManager $transactionManager,
        private DossieManager $dossieManager,
        private DossieResource $dossieResource,
        private ProcessoResource $processoResource,
        private DocumentoResource $documentoResource,
        private ComponenteDigitalResource $componenteDigitalResource,
        private TipoDocumentoResource $tipoDocumentoResource,
        private JuntadaResource $juntadaResource,
        private VolumeResource $volumeResource,
        private OrigemDadosResource $origemDadosResource,
        private ModalidadeNotificacaoResource $modalidadeNotificacaoResource,
        private NotificacaoResource $notificacaoResource,
        private ParameterBagInterface $parameterBag
    ) {
    }

    /**
     * @param TipoDossieEntity $tipoDossie
     * @param PessoaEntity $pessoa
     * @return DossieEntity|null
     */
    public function dossieSimilar(
        TipoDossieEntity $tipoDossie,
        PessoaEntity $pessoa
    ): ?DossieEntity {
        if (!$tipoDossie->getPeriodoGuarda()) {
            return null;
        }

        $dossie = $this
            ->dossieResource
            ->getRepository()
            ->findSimilarMostRecent($tipoDossie, $pessoa);

        return $dossie && (((new DateTime())->diff($dossie->getDataConsulta()))->days <= $tipoDossie->getPeriodoGuarda()) ?
            $dossie :
            null;
    }

    /**
     * @param GerarDossieMessage $gerarDossieMessage
     * @return void
     * @throws Exception
     */
    public function gerarDossie(GerarDossieMessage $gerarDossieMessage)
    {
        $dossieEntity = $this->dossieResource->findOneBy(['uuid' => $gerarDossieMessage->getDossieUuid()]);
        if (!$dossieEntity) {
            throw new Exception("Dossie não encontrado {$gerarDossieMessage->getDossieUuid()}");
        }

        if ($dossieEntity->getCriadoPor()) {
            $this->internalLogInService->logUserIn($dossieEntity->getCriadoPor());
            $this->blameableListener->setUserValue($dossieEntity->getCriadoPor());
        }

        try {
            $transactionId = $this->transactionManager->getCurrentTransactionId() ?: $this->transactionManager->begin();

            // geracao do dossie ou reaproveitamento
            $dossieSimilar = $this->dossieSimilar($dossieEntity->getTipoDossie(), $dossieEntity->getPessoa());
            if ($dossieSimilar?->getDocumento()?->getComponentesDigitais()?->first()) {
                $this->reaproveitaDossieSimilar($dossieEntity, $dossieSimilar);
            } else {
                $this->geraNovoDossie($dossieEntity, $transactionId, $gerarDossieMessage);
            }

            // juntada do dossie no processo
            if ($dossieEntity->getProcesso()) {
                $juntadaDTO = new Juntada();
                $juntadaDTO->setDescricao(
                    "JUNTADA DOSSIE {$dossieEntity->getTipoDossie()->getNome()} REF. A {$dossieEntity->getPessoa()->getNome()}"
                );
                $juntadaDTO->setDocumento($dossieEntity->getDocumento());
                $juntadaDTO->setVolume(
                    $this->volumeResource->getRepository()->findVolumeAbertoByProcessoId(
                        $dossieEntity->getProcesso()->getId()
                    )
                );

                $this->juntadaResource->create($juntadaDTO, $transactionId);
            }
            $this->alteraStatusOrigemDados($dossieEntity, DossieEntity::SUCESSO, $transactionId);

            if ($gerarDossieMessage->getSobDemanda()) {
                $modalidadeNotificacao = $this->modalidadeNotificacaoResource
                    ->findOneBy(
                        ['valor' => $this->parameterBag->get('constantes.entidades.modalidade_notificacao.const_1')]
                    );

                $notificacaoDTO = (new Notificacao())
                    ->setDestinatario($dossieEntity->getCriadoPor())
                    ->setModalidadeNotificacao($modalidadeNotificacao)
                    ->setConteudo('Dossiê '.$dossieEntity->getTipoDossie()->getNome().
                        ' para: '.$dossieEntity->getPessoa()->getNome().' criado com sucesso. NUP: ' . $dossieEntity->getProcesso()->getNUP())
                    ->setTipoNotificacao(null);
                $this->notificacaoResource->create($notificacaoDTO, $transactionId);
            }

            $this->transactionManager->commit();
        } catch (Exception $e) {
            $this->transactionManager->resetTransaction();
            $transactionId = $this->transactionManager->getCurrentTransactionId() ?: $this->transactionManager->begin();
            $dossieEntity = $this->dossieResource->findOneBy(['uuid' => $gerarDossieMessage->getDossieUuid()]);

            if ($gerarDossieMessage->getSobDemanda()) {
                $modalidadeNotificacao = $this->modalidadeNotificacaoResource
                    ->findOneBy(
                        ['valor' => $this->parameterBag->get('constantes.entidades.modalidade_notificacao.const_1')]
                    );
                $notificacaoDTO = (new NotificacaoDTO())
                    ->setDestinatario($dossieEntity->getCriadoPor())
                    ->setModalidadeNotificacao($modalidadeNotificacao)
                    ->setConteudo(
                        'ERRO AO GERAR ' .$dossieEntity->getTipoDossie()->getNome().
                        ' DO NUP: '.$dossieEntity->getProcesso()->getNUP(). ' '.
                        $e->getMessage()
                    )
                    ->setTipoNotificacao(null);
                $this->notificacaoResource->create($notificacaoDTO, $transactionId);
            }

            $this->alteraStatusOrigemDados($dossieEntity, DossieEntity::ERRO, $transactionId);
            $this->transactionManager->commit();

            throw $e;
        }
    }

    /**
     * @param DossieEntity $dossieEntity
     * @param DossieEntity $dossieSimilar
     * @param string $transactionId
     * @return void
     * @throws AnnotationException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ReflectionException
     */
    private function reaproveitaDossieSimilar(
        DossieEntity $dossieEntity,
        DossieEntity $dossieSimilar,
        string $transactionId
    ) {
        $componenteDigitalEntity = $dossieSimilar->getDocumento()->getComponentesDigitais()->first();
        $componenteDigitalEntity = $this
            ->componenteDigitalResource
            ->download(
                $componenteDigitalEntity->getId(),
                $transactionId,
                false
            );

        /** @var DossieDTO $dossieDTO */
        $dossieDTO = $this->dossieResource->getDtoForEntity(
            $dossieEntity->getId(),
            DossieDTO::class
        );
        $dossieDTO->setVersao($dossieSimilar->getVersao());
        $dossieDTO->setConteudo($dossieSimilar->getConteudo());
        $dossieDTO->setDataConsulta($dossieSimilar->getDataConsulta());
        $dossieDTO->setDocumento(
            $this->criarDocumento(
                $dossieEntity->getProcesso(),
                $componenteDigitalEntity->getFileName(),
                $componenteDigitalEntity->getConteudo(),
                'html',
                $transactionId
            )
        );

        $this->dossieResource->update($dossieEntity->getId(), $dossieDTO, $transactionId);
    }

    /**
     * @param DossieEntity $dossieEntity
     * @param string $transactionId
     * @return void
     * @throws AnnotationException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ReflectionException
     */
    private function geraNovoDossie(
        DossieEntity $dossieEntity,
        string $transactionId,
        ?GerarDossieMessage $gerarDossieMessage = null
    ) {
        // recupera gerador de dossie
        $geradorDossie = $this
            ->dossieManager
            ->getGeradorDossiePorTipoDossie($dossieEntity->getTipoDossie());

        if (!$geradorDossie) {
            throw new Exception(
                "Não foi possível encontrar um serviço para este tipo de Dossie {$dossieEntity->getTipoDossie()->getNome()}!"
            );
        }

        if ($gerarDossieMessage->getSobDemanda() && !$geradorDossie->supportsSobDemanda($dossieEntity)) {
            throw new Exception(
                "Verifique se a unidade possui permissão para gerar e se o interessado é pessoa física."
            );
        }

        $nomeArquivo = "DOSSIE_{$dossieEntity->getTipoDossie()->getNome()}_{$dossieEntity->getPessoa()->getNumeroDocumentoPrincipal()}.html";
        $dossieGerado = $geradorDossie->geraDossie($dossieEntity);

        // atualiza o dossie
        /** @var DossieDTO $dossieDTO */
        $dossieDTO = $this->dossieResource->getDtoForEntity(
            $dossieEntity->getId(),
            DossieDTO::class
        );
        $dossieDTO->setVersao($dossieGerado->getVersao());
        $dossieDTO->setConteudo($dossieGerado->getConteudo());
        $dossieDTO->setDocumento(
            $this->criarDocumento(
                $dossieEntity->getProcesso(),
                $nomeArquivo,
                $dossieGerado->getConteudoHtml(),
                $dossieGerado->getExtensao(),
                $transactionId
            )
        );

        $this->dossieResource->update($dossieEntity->getId(), $dossieDTO, $transactionId);
    }

    /**
     * @param ProcessoEntity|null $processo
     * @param string $nomeArquivo
     * @param string|null $conteudo
     * @param string|null $extensao
     * @param string $transactionId
     * @return DocumentoEntity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    private function criarDocumento(
        ?ProcessoEntity $processo,
        string $nomeArquivo,
        ?string $conteudo,
        ?string $extensao,
        string $transactionId
    ): DocumentoEntity {
        $documentoDto = new DocumentoDTO();
        $documentoDto->setMinuta(false);

        if ($processo) {
            $documentoDto->setProcessoOrigem($processo);
            $documentoDto->setSetorOrigem($processo->getSetorAtual());
        }

        $documentoDto->setTipoDocumento(
            $this
                ->tipoDocumentoResource
                ->getRepository()
                ->findByNomeAndEspecie('OUTROS', 'ADMINISTRATIVO')
        );

        $documentoEntity = $this
            ->documentoResource
            ->create($documentoDto, $transactionId);

        if ($conteudo) {
            switch ($extensao) {
                case 'pdf':
                    $mimeType = 'application/pdf';
                    $extensaoDocumento = 'pdf';
                    break;

                default:
                    $mimeType = 'text/html';
                    $extensaoDocumento = 'html';
                    break;
            }

            // cria o componente Digital
            $componenteDigitalDTO = new ComponenteDigital();
            $componenteDigitalDTO->setConteudo($conteudo);
            $componenteDigitalDTO->setMimetype($mimeType);
            $componenteDigitalDTO->setExtensao($extensaoDocumento);
            $componenteDigitalDTO->setEditavel(false);
            $componenteDigitalDTO->setFileName($nomeArquivo);
            $componenteDigitalDTO->setTamanho(strlen($conteudo));
            $componenteDigitalDTO->setNivelComposicao(3);
            $componenteDigitalDTO->setHash(hash('SHA256', $componenteDigitalDTO->getConteudo()));
            $componenteDigitalDTO->setTamanho(strlen($componenteDigitalDTO->getConteudo()));
            $componenteDigitalDTO->setDocumento($documentoEntity);

            $this->componenteDigitalResource->create($componenteDigitalDTO, $transactionId);
        }

        return $documentoEntity;
    }

    /**
     * @param DossieEntity $dossieEntity
     * @param int $status
     * @param string $transactionId
     * @return void
     * @throws AnnotationException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ReflectionException
     */
    private function alteraStatusOrigemDados(
        DossieEntity $dossieEntity,
        int $status,
        string $transactionId
    ) {
        /**
         * @var DossieDTO $restDto
         */
        $origemDadosDTO = $this
            ->origemDadosResource
            ->getDtoForEntity($dossieEntity->getOrigemDados()->getId(), OrigemDadosDTO::class);

        $origemDadosDTO->setStatus($status);
        $this->origemDadosResource->update($dossieEntity->getOrigemDados()->getId(), $origemDadosDTO, $transactionId);
    }
}
