<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Actions/Anon/CountAction.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Rest\Traits\Actions\Anon;

use LogicException;
use SuppCore\AdministrativoBackend\Annotation\RestApiDoc;
use SuppCore\AdministrativoBackend\Rest\Traits\Methods\CountMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait CountAction.
 *
 * Trait to add 'countAction' for REST controllers for anonymous users.
 *
 * @see \SuppCore\AdministrativoBackend\Rest\Traits\Methods\CountMethod for detailed documents.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait CountAction
{
    // Traits
    use CountMethod;

    /**
     * @Route(
     *     path="/count",
     *     methods={"GET"},
     *  )
     *
     * @RestApiDoc()
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    public function countAction(Request $request): Response
    {
        return $this->countMethod($request);
    }
}
