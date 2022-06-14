<?php

declare(strict_types=1);
/**
 * /src/Controller/JuntadaController.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Controller;

use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SuppCore\AdministrativoBackend\Annotation\RestApiDoc;
use SuppCore\AdministrativoBackend\Api\V1\Resource\JuntadaResource;
use SuppCore\AdministrativoBackend\Rest\Controller;
use SuppCore\AdministrativoBackend\Rest\RequestHandler;
use SuppCore\AdministrativoBackend\Rest\ResponseHandler;
use SuppCore\AdministrativoBackend\Rest\Traits\Actions;
use SuppCore\AdministrativoBackend\Transaction\Context;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * @Route(path="/v1/administrativo/juntada")
 *
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 *
 * @OA\Tag(name="Juntada")
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method JuntadaResource getResource()
 */
class JuntadaController extends Controller
{
    // Traits
    use Actions\User\FindOneAction;
    use Actions\User\FindAction;
    use Actions\Colaborador\CreateAction;
    use Actions\Colaborador\UpdateAction;
    use Actions\Colaborador\PatchAction;
    use Actions\Root\DeleteAction;
    use Actions\Colaborador\CountAction;

/** @noinspection MagicMethodsValidityInspection */

    /**
     * JuntadaController constructor.
     */
    public function __construct(
        JuntadaResource $resource,
        ResponseHandler $responseHandler
    ) {
        $this->init($resource, $responseHandler);
    }

    /**
     * @Route(
     *      "/{id}/sendEmail",
     *      requirements={
     *          "id" = "\d+",
     *      },
     *      methods={"GET"},
     *  )
     *
     * @Security("is_granted('ROLE_COLABORADOR')")
     *
     * @RestApiDoc()
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Exception
     */
    public function sendEmailAction(Request $request, int $id): Response
    {
        $transactionId = $this->transactionManager->begin();

        $context = RequestHandler::getContext($request);

        foreach ($context as $name => $value) {
            $this->transactionManager->addContext(
                new Context($name, $value),
                $transactionId
            );
        }

        $entity = $this->getResource()->sendEmailMethod($request, $id, $transactionId);

        $this->transactionManager->commit($transactionId);

        return $this->getResponseHandler()->createResponse($request, $entity);
    }
}
