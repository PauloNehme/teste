<?php

declare(strict_types=1);
/**
 * /src/Controller/SetorController.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SuppCore\AdministrativoBackend\Annotation\RestApiDoc;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Setor;
use SuppCore\AdministrativoBackend\Api\V1\Resource\SetorResource;
use SuppCore\AdministrativoBackend\Rest\Controller;
use SuppCore\AdministrativoBackend\Rest\RequestHandler;
use SuppCore\AdministrativoBackend\Rest\ResponseHandler;
use SuppCore\AdministrativoBackend\Rest\Traits\Actions;
use SuppCore\AdministrativoBackend\Transaction\Context;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/v1/administrativo/setor")
 *
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 *
 * @OA\Tag(name="Setor")
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method SetorResource getResource()
 */
class SetorController extends Controller
{
    // Traits
    use Actions\User\FindOneAction;
    use Actions\User\FindAction;
    use Actions\CoordenadorUnidade\CreateAction;
    use Actions\CoordenadorUnidade\UpdateAction;
    use Actions\CoordenadorUnidade\PatchAction;
    use Actions\CoordenadorUnidade\DeleteAction;
    use Actions\Colaborador\CountAction;

/** @noinspection MagicMethodsValidityInspection */

    /**
     * SetorController constructor.
     */
    public function __construct(
        SetorResource $resource,
        ResponseHandler $responseHandler
    ) {
        $this->init($resource, $responseHandler);
    }

    /**
     * Endpoint action para transferir processos de um setor para o protocolo da unidade.
     *
     * @Route(
     *      "/{id}/transferir_processos_protocolo",
     *      requirements={
     *          "id" = "\d+",
     *      },
     *      methods={"PATCH"},
     *  )
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @RestApiDoc()
     *
     * @param string[]|null $allowedHttpMethods
     *
     * @throws \Throwable
     */
    public function transferirProcessosParaProtocoloAction(
        Request $request,
        int $id,
        ?array $allowedHttpMethods = null
    ): Response {
        $allowedHttpMethods ??= ['PATCH'];

        // Make sure that we have everything we need to make this work
        $this->validateRestMethod($request, $allowedHttpMethods);

        try {
            $transactionId = $this->transactionManager->begin();

            $context = RequestHandler::getContext($request);

            foreach ($context as $name => $value) {
                $this->transactionManager->addContext(
                    new Context($name, $value),
                    $transactionId
                );
            }

            $processoResource = $this->getResource();
            $setorDTO = $processoResource->getDtoForEntity($id, Setor::class);
            $setorEntity = $processoResource->transferirProcessosSetorParaProtocolo(
                $id,
                $setorDTO,
                $transactionId
            );

            $this->transactionManager->commit($transactionId);

            return $this->getResponseHandler()->createResponse($request, $setorEntity);
        } catch (\Throwable $exception) {
            throw $this->handleRestMethodException($exception, $id);
        }
    }
}
