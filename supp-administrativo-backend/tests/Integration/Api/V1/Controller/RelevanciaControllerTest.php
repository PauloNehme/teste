<?php

declare(strict_types=1);
/**
 * /tests/Integration/Api/V1/Controller/RelevanciaControllerTest.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Integration\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Api\V1\Controller\RelevanciaController;
use SuppCore\AdministrativoBackend\Api\V1\Resource\RelevanciaResource;
use SuppCore\AdministrativoBackend\Utils\Tests\RestIntegrationControllerTestCase;

/**
 * Class RelevanciaControllerTest.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Integration\Api\V1\Controller;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class RelevanciaControllerTest extends RestIntegrationControllerTestCase
{
    /**
     * @var string
     */
    protected string $controllerClass = RelevanciaController::class;

    /**
     * @var string
     */
    protected string $resourceClass = RelevanciaResource::class;
}
