<?php

declare(strict_types=1);
/**
 * /src/Controller/OrigemDadosController.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SuppCore\AdministrativoBackend\Api\V1\Resource\OrigemDadosResource;
use SuppCore\AdministrativoBackend\Rest\Controller;
use SuppCore\AdministrativoBackend\Rest\ResponseHandler;
use SuppCore\AdministrativoBackend\Rest\Traits\Actions;
use OpenApi\Annotations as OA;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/v1/administrativo/origem_dados")
 *
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 *
 * @OA\Tag(name="OrigemDados")
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method OrigemDadosResource getResource()
 */
class OrigemDadosController extends Controller
{
    // Traits
    use Actions\Colaborador\FindOneAction;
    use Actions\Colaborador\FindAction;
    use Actions\Root\CreateAction;
    use Actions\Root\UpdateAction;
    use Actions\Root\PatchAction;
    use Actions\Root\DeleteAction;
    use Actions\Colaborador\CountAction;

/** @noinspection MagicMethodsValidityInspection */

    /**
     * OrigemDadosController constructor.
     */
    public function __construct(
        OrigemDadosResource $resource,
        ResponseHandler $responseHandler
    ) {
        $this->init($resource, $responseHandler);
    }
}
