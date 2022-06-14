<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Resource/DocumentoResource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Resource;

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Doctrine\ORM\TransactionRequiredException;
use Exception;
use ReflectionException;
use RuntimeException;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Assinatura;
use SuppCore\AdministrativoBackend\Api\V1\DTO\ComponenteDigital;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Documento;
use SuppCore\AdministrativoBackend\Api\V1\DTO\VinculacaoDocumento;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\EARQ\EARQEventoPreservacaoLoggerInterface;
use SuppCore\AdministrativoBackend\Entity\Documento as Entity;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Processo;
use SuppCore\AdministrativoBackend\Fields\RendererManager;
use SuppCore\AdministrativoBackend\Repository\DocumentoRepository as Repository;
use SuppCore\AdministrativoBackend\Rest\RestResource;
use SuppCore\AdministrativoBackend\Transaction\Context;
use SuppCore\AdministrativoBackend\Transaction\TransactionManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class DocumentoResource.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository  getRepository(): Repository
 * @method Entity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method Entity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method Entity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method Entity      delete(int $id, string $transactionId): EntityInterface
 * @method Entity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class DocumentoResource extends RestResource
{
    public function __construct(
        Repository $repository,
        ValidatorInterface $validator,
        private ComponenteDigitalResource $componenteDigitalResource,
        private AssinaturaResource $assinaturaResource,
        private TokenStorageInterface $tokenStorage,
        private VinculacaoDocumentoResource $vinculacaoDocumentoResource,
        private RendererManager $rendererManager,
        private EARQEventoPreservacaoLoggerInterface $eventoPreservacaoLogger,
        private TransactionManager $transactionManager
    ) {
        $this->setRepository($repository);
        $this->setValidator($validator);
        $this->setDtoClass(Documento::class);
    }

    /**
     * Generic method to delete specified entity from database.
     *
     * @throws NotFoundHttpException
     * @throws OptimisticLockException
     * @throws ORMInvalidArgumentException
     * @throws ORMException
     */
    public function deleteAssinatura(int $id, string $transactionId): EntityInterface
    {
        /** @var Entity $entity */
        $entity = $this->getEntity($id);

        if (!$this->tokenStorage->getToken() || !$this->tokenStorage->getToken()->getUser()) {
            throw new RuntimeException('Não há usuário logado!');
        }

        $usuario = $this->tokenStorage->getToken()->getUser();

        $ok = false;

        foreach ($entity->getComponentesDigitais() as $componenteDigitalEntity) {
            foreach ($componenteDigitalEntity->getAssinaturas() as $assinatura) {
                if ($assinatura->getCriadoPor() &&
                    $assinatura->getCriadoPor()->getId() === $usuario->getId()) {
                    $this->assinaturaResource->delete($assinatura->getId(), $transactionId);
                    $ok = true;
                }
            }
        }

        if (!$ok) {
            throw new RuntimeException('Usuário não possui assinaturas no documento!');
        }

        return $entity;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws TransactionRequiredException
     */
    public function clonar(
        int $id,
        ?Entity $documento,
        string $transactionId,
        ?Processo $reprocessarProcesso = null
    ): EntityInterface {
        /** @var Entity $documentoClonado */
        $documentoClonado = $this->getRepository()->find($id);

        if (!$documento) {
            // copia o documento
            $dto = new Documento();
            $dto->setTipoDocumento($documentoClonado->getTipoDocumento());

            $documento = $this->create($dto, $transactionId);
        }

        /** @var \SuppCore\AdministrativoBackend\Entity\ComponenteDigital $componenteDigitalClonado */
        foreach ($documentoClonado->getComponentesDigitais() as $componenteDigitalClonado) {
            $componenteDigitalDTO = new ComponenteDigital();
            $componenteDigitalDTO->setDocumento($documento);
            $componenteDigitalDTO->setFileName($componenteDigitalClonado->getFileName());
            $componenteDigitalDTO->setHash($componenteDigitalClonado->getHash());
            $componenteDigitalDTO->setTamanho($componenteDigitalClonado->getTamanho());
            $componenteDigitalDTO->setMimetype($componenteDigitalClonado->getMimetype());
            $componenteDigitalDTO->setExtensao($componenteDigitalClonado->getExtensao());
            $componenteDigitalDTO->setEditavel($componenteDigitalClonado->getEditavel());

            if ($reprocessarProcesso && $componenteDigitalClonado->getEditavel()) {
                $conteudoOriginal = $this->componenteDigitalResource->download(
                    $componenteDigitalClonado->getId(),
                    $transactionId
                )->getConteudo();
                $componenteDigitalDTO->setProcessoOrigem($reprocessarProcesso);
                $conteudoReprocessado = $this->rendererManager->renderModelo(
                    $componenteDigitalDTO,
                    $transactionId,
                    [],
                    $conteudoOriginal
                );

                $componenteDigitalDTO->setConteudo($conteudoReprocessado);
                $componenteDigitalDTO->setTamanho(mb_strlen($conteudoReprocessado));
                $componenteDigitalDTO->setHash(hash('SHA256', $conteudoReprocessado));
            }

            $componenteDigital = $this->componenteDigitalResource->create($componenteDigitalDTO, $transactionId);

            $documento->addComponenteDigital($componenteDigital);

            if (!$reprocessarProcesso) {
                $this->transactionManager->addContext(
                    new Context('clonarAssinatura', true),
                    $transactionId
                );
                /** @var Assinatura $assinaturaClonada */
                foreach ($componenteDigitalClonado->getAssinaturas() as $assinaturaClonada) {
                    $assinaturaDTO = new Assinatura();
                    $assinaturaDTO->setAlgoritmoHash($assinaturaClonada->getAlgoritmoHash());
                    $assinaturaDTO->setAssinatura($assinaturaClonada->getAssinatura());
                    $assinaturaDTO->setCadeiaCertificadoPEM($assinaturaClonada->getCadeiaCertificadoPEM());
                    $assinaturaDTO->setCadeiaCertificadoPkiPath($assinaturaClonada->getCadeiaCertificadoPkiPath());
                    $assinaturaDTO->setDataHoraAssinatura($assinaturaClonada->getDataHoraAssinatura());
                    $assinaturaDTO->setComponenteDigital($componenteDigital);
                    $assinaturaDTO->setCriadoPor($assinaturaClonada->getCriadoPor());
                    $this->assinaturaResource->create($assinaturaDTO, $transactionId);
                }
                $this->transactionManager->removeContext(
                    'clonarAssinatura',
                    $transactionId
                );
            }

            $this->eventoPreservacaoLogger->logEPRES7Replicacao($componenteDigitalClonado, $componenteDigitalDTO);
        }

        /** @var \SuppCore\AdministrativoBackend\Entity\VinculacaoDocumento $vinculacaoDocumentoClonada */
        foreach ($documentoClonado->getVinculacoesDocumentos() as $vinculacaoDocumentoClonada) {
            // copia o documento remessa
            $documentoDTO = new Documento();
            $documentoDTO->setTipoDocumento(
                $vinculacaoDocumentoClonada->getDocumentoVinculado()->getTipoDocumento()
            );

            $documentoVinculado = $this->create($documentoDTO, $transactionId);

            /** @var \SuppCore\AdministrativoBackend\Entity\ComponenteDigital $componenteDigitalClonado */
            foreach ($vinculacaoDocumentoClonada->getDocumentoVinculado()->
            getComponentesDigitais() as $componenteDigitalClonado) {
                $componenteDigitalDTO = new ComponenteDigital();
                $componenteDigitalDTO->setDocumento($documentoVinculado);
                $componenteDigitalDTO->setFileName($componenteDigitalClonado->getFileName());
                $componenteDigitalDTO->setHash($componenteDigitalClonado->getHash());
                $componenteDigitalDTO->setTamanho($componenteDigitalClonado->getTamanho());
                $componenteDigitalDTO->setMimetype($componenteDigitalClonado->getMimetype());
                $componenteDigitalDTO->setExtensao($componenteDigitalClonado->getExtensao());
                $componenteDigitalDTO->setModelo($componenteDigitalClonado->getModelo());
                $componenteDigitalDTO->setEditavel($componenteDigitalClonado->getEditavel());

                if ($reprocessarProcesso && $componenteDigitalClonado->getEditavel()) {
                    $conteudoOriginal = $this->componenteDigitalResource->download(
                        $componenteDigitalClonado->getId(),
                        $transactionId
                    )->getConteudo();
                    $componenteDigitalDTO->setProcessoOrigem($reprocessarProcesso);
                    $conteudoReprocessado = $this->rendererManager->renderModelo(
                        $componenteDigitalDTO,
                        $transactionId,
                        [],
                        $conteudoOriginal
                    );

                    $componenteDigitalDTO->setConteudo($conteudoReprocessado);
                    $componenteDigitalDTO->setTamanho(mb_strlen($conteudoReprocessado));
                    $componenteDigitalDTO->setHash(hash('SHA256', $conteudoReprocessado));
                }

                $componenteDigital = $this->componenteDigitalResource->create(
                    $componenteDigitalDTO,
                    $transactionId
                );

                if (!$reprocessarProcesso) {
                    $this->transactionManager->addContext(
                        new Context('clonarAssinatura', true),
                        $transactionId
                    );
                    /** @var Assinatura $assinaturaClonada */
                    foreach ($componenteDigitalClonado->getAssinaturas() as $assinaturaClonada) {
                        $assinaturaDTO = new Assinatura();
                        $assinaturaDTO->setAlgoritmoHash($assinaturaClonada->getAlgoritmoHash());
                        $assinaturaDTO->setAssinatura($assinaturaClonada->getAssinatura());
                        $assinaturaDTO->setCadeiaCertificadoPEM($assinaturaClonada->getCadeiaCertificadoPEM());
                        $assinaturaDTO->setCadeiaCertificadoPkiPath($assinaturaClonada->getCadeiaCertificadoPkiPath());
                        $assinaturaDTO->setDataHoraAssinatura($assinaturaClonada->getDataHoraAssinatura());
                        $assinaturaDTO->setComponenteDigital($componenteDigital);
                        $assinaturaDTO->setCriadoPor($assinaturaClonada->getCriadoPor());
                        $this->assinaturaResource->create($assinaturaDTO, $transactionId);
                    }
                    $this->transactionManager->removeContext(
                        'clonarAssinatura',
                        $transactionId
                    );
                }

                $this->eventoPreservacaoLogger->logEPRES7Replicacao($componenteDigitalClonado, $componenteDigitalDTO);
            }

            $vinculacaoDocumentoDTO = new VinculacaoDocumento();
            $vinculacaoDocumentoDTO->setDocumento($documento);
            $vinculacaoDocumentoDTO->setDocumentoVinculado($documentoVinculado);
            $vinculacaoDocumentoDTO->setModalidadeVinculacaoDocumento(
                $vinculacaoDocumentoClonada->getModalidadeVinculacaoDocumento()
            );

            $vinculacaoDocumento = $this->vinculacaoDocumentoResource->create($vinculacaoDocumentoDTO, $transactionId);

            $documento->addVinculacaoDocumento($vinculacaoDocumento);
        }

        return $documento;
    }

    /**
     * @param int       $id
     * @param string    $transactionId
     * @param bool|null $skipValidation
     *
     * @return EntityInterface
     *
     * @throws AnnotationException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ReflectionException
     * @throws Exception
     */
    public function convertToPDF(
        int $id,
        string $transactionId,
        ?bool $skipValidation = null
    ): EntityInterface {
        $skipValidation ??= false;

        $entity = $this->findOne($id);

        // Validate current entity
        $dto = $this->getDtoForEntity($entity->getId(), $this->getDtoClass(), null, $entity);
        $this->validateDto($dto, $skipValidation);

        // Before callback method call
        $this->beforeConvertToPDF($dto, $entity, $transactionId);

        // Convert and calls update lyfecicle from ComponenteDigital resource
        foreach ($entity->getComponentesDigitais() as $componenteDigitalEntity) {
            /** @var ComponenteDigital $componenteDigitalDto */
            $componenteDigitalDto = $this->componenteDigitalResource->getDtoForEntity(
                $componenteDigitalEntity->getId(),
                $this->componenteDigitalResource->getDtoClass(),
                null,
                $componenteDigitalEntity
            );

            $this->componenteDigitalResource->convert($componenteDigitalDto, $componenteDigitalEntity);
            $this->componenteDigitalResource->update(
                $componenteDigitalEntity->getId(),
                $componenteDigitalDto,
                $transactionId
            );
        }

        // After callback method call
        $this->afterConvertToPDF($dto, $entity, $transactionId);

        return $entity;
    }

    public function beforeConvertToPDF(
        RestDtoInterface $dto,
        EntityInterface $entity,
        string $transactionId
    ): void {
        $this->rulesManager->proccess($dto, $entity, $transactionId, 'beforeConvertToPDF');
        $this->triggersManager->proccess($dto, $entity, $transactionId, 'beforeConvertToPDF');
    }

    public function afterConvertToPDF(
        RestDtoInterface $dto,
        EntityInterface $entity,
        string $transactionId
    ): void {
        $this->triggersManager->proccess($dto, $entity, $transactionId, 'afterConvertToPDF');
    }
}
