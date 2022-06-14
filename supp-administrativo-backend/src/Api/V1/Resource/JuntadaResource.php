<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Resource/JuntadaResource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Resource;

use Knp\Snappy\Pdf;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Juntada;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\ComponenteDigital;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Juntada as Entity;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Entity\VinculacaoDocumento;
use SuppCore\AdministrativoBackend\Repository\JuntadaRepository as Repository;
use SuppCore\AdministrativoBackend\Rest\RestResource;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class JuntadaResource.
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
class JuntadaResource extends RestResource
{
/** @noinspection MagicMethodsValidityInspection */
    private RequestStack $requestStack;

    private UsuarioResource $usuarioResource;
    private Swift_Mailer $mailer;
    private Environment $twig;
    private ParameterBagInterface $parameterBag;
    private ComponenteDigitalResource $componenteDigitalResource;
    private Pdf $pdfManager;

    /**
     * JuntadaResource constructor.
     */
    public function __construct(
        Repository $repository,
        ValidatorInterface $validator,
        UsuarioResource $usuarioResource,
        Swift_Mailer $mailer,
        Environment $twig,
        ParameterBagInterface $parameterBag,
        ComponenteDigitalResource $componenteDigitalResource,
        Pdf $pdfManager
    ) {
        $this->setRepository($repository);
        $this->setValidator($validator);
        $this->setDtoClass(Juntada::class);
        $this->usuarioResource = $usuarioResource;
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->parameterBag = $parameterBag;
        $this->componenteDigitalResource = $componenteDigitalResource;
        $this->pdfManager = $pdfManager;
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Throwable
     */
    public function sendEmailMethod(Request $request, int $id, string $transactionId): EntityInterface
    {
        //fetch $entity
        $entity = $this->getEntity($id);

        $restDto = null;

        $this->beforeSendEmail($id, $restDto, $entity, $transactionId);

        $usuarioEnvio = $this->findUserContext($request);

        $this->enviarEmail($entity, $usuarioEnvio, $transactionId);

        $this->afterSendEmail($id, $restDto, $entity, $transactionId);

        return $entity;
    }

    public function beforeSendEmail(
        int &$id,
        ?RestDtoInterface $dto,
        EntityInterface $entity,
        string $transactionId
    ): void {
        $this->rulesManager->proccess($dto, $entity, $transactionId, 'beforeSendEmail');
        $this->triggersManager->proccess($dto, $entity, $transactionId, 'beforeSendEmail');
    }

    public function afterSendEmail(
        int &$id,
        ?RestDtoInterface $dto,
        EntityInterface $entity,
        string $transactionId
    ): void {
        $this->rulesManager->proccess($dto, $entity, $transactionId, 'afterSendEmail');
        $this->triggersManager->proccess($dto, $entity, $transactionId, 'afterSendEmail');
    }

    private function findUserContext(Request $request): Usuario
    {
        $entity = null;
        $context = null;

        if (null !== $request->get('context')) {
            $context = json_decode($request->get('context'));
        }

        if (null !== $context) {
            if (isset($context->usuario) && null !== $context->usuario) {
                $entity = $this->usuarioResource->findOne((int) $context->usuario);
            }
        }

        if (null === $entity) {
            throw new NotFoundHttpException('User to send not found');
        }

        return $entity;
    }

    /**
     * @param EntityInterface|Entity $juntada
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Throwable
     */
    private function enviarEmail(EntityInterface $juntada, Usuario $usuario, string $transactionId): bool
    {
        $message = (new Swift_Message('Envio de Documentos pelo '.$this->parameterBag
                ->get('supp_core.administrativo_backend.nome_sistema')))
            ->setFrom($this->parameterBag->get('supp_core.administrativo_backend.email_suporte'))
            ->setTo($usuario->getEmail())
            ->setBody(
                $this->twig->render(
                    $this->parameterBag->get('supp_core.administrativo_backend.template_envio_documentos_email'),
                    [
                        'sistema' => $this->parameterBag->get('supp_core.administrativo_backend.nome_sistema'),
                        'ambiente' => $this->parameterBag->get(
                            'supp_core.administrativo_backend.kernel_environment_mapping'
                        )[$this->parameterBag->get('kernel.environment')],
                        'NUP' => $juntada->getVolume()->getProcesso()->getNUPFormatado(),
                    ]
                ),
                'text/html'
            );

        try {
            $arquivosCriados = [];
            $success = true;
            $tempPath = sys_get_temp_dir().'/mail_'.rand(1, 999999);
            mkdir($tempPath);
            /** @var ComponenteDigital $componenteDigital */
            foreach ($juntada->getDocumento()->getComponentesDigitais() as $componenteDigital) {
                $arquivoParaEnvio = $this->componenteDigitalResource
                    ->download($componenteDigital->getId(), $transactionId, null, true);
                $arquivoParaEnvio->setMimetype('application/pdf');
                $arquivoParaEnvio->setExtensao('pdf');
                $arquivoParaEnvio->setFileName(
                    str_replace(
                        '.html',
                        '.pdf',
                        str_replace('.HTML', '.pdf', $arquivoParaEnvio->getFileName())
                    )
                );
                $pathWithFilename = $tempPath.'/'.$arquivoParaEnvio->getFileName();

                $tmpFile = fopen($pathWithFilename, 'w');
                fwrite($tmpFile, $arquivoParaEnvio->getConteudo());
                fclose($tmpFile);
                $arquivosCriados[] = $pathWithFilename;
                $message->attach(Swift_Attachment::fromPath($pathWithFilename));
            }
            if ($juntada->getDocumento()->getVinculacoesDocumentos()->count() > 0) {
                foreach ($juntada->getDocumento()->getVinculacoesDocumentos() as $anexos) {
                    /** @var VinculacaoDocumento $anexos */
                    foreach ($anexos->getDocumentoVinculado()->getComponentesDigitais() as $componenteDigital) {
                        $arquivoParaEnvio = $this->componenteDigitalResource
                            ->download($componenteDigital->getId(), $transactionId, null, true);
                        $arquivoParaEnvio->setMimetype('application/pdf');
                        $arquivoParaEnvio->setExtensao('pdf');
                        $arquivoParaEnvio->setFileName(
                            str_replace(
                                '.html',
                                '.pdf',
                                str_replace('.HTML', '.pdf', $arquivoParaEnvio->getFileName())
                            )
                        );
                        $pathWithFilename = $tempPath.'/'.$arquivoParaEnvio->getFileName();

                        $tmpFile = fopen($pathWithFilename, 'w');
                        fwrite($tmpFile, $arquivoParaEnvio->getConteudo());
                        fclose($tmpFile);
                        $arquivosCriados[] = $pathWithFilename;
                        $message->attach(Swift_Attachment::fromPath($pathWithFilename));
                    }
                }
            }
            $this->mailer->send($message);
        } catch (Throwable $e) {
            $success = false;
        } finally {
            // Ao excluir a pasta temp na mesma instrução o arquivo não é anexado
            // criar um command para exclusão dos arquivos enviados
            /* foreach ($arquivosCriados as $arquivoCriado) {
                unlink($arquivoCriado);
            }
            if (is_dir($tempPath)) {
                rmdir($tempPath);
            } */
            if (isset($e)) {
                throw $e;
            }
        }

        return $success;
    }
}
