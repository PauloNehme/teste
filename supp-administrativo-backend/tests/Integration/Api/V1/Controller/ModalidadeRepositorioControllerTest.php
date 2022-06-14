<?php

declare(strict_types=1);
/**
 * /tests/Integration/Api/V1/Controller/ModalidadeRepositorioControllerTest.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Integration\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Api\V1\Controller\ModalidadeRepositorioController;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ModalidadeRepositorioResource;
use SuppCore\AdministrativoBackend\Utils\Tests\RestIntegrationControllerTestCase;

/**
 * Class ModalidadeRepositorioControllerTest.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Integration\Api\V1\Controller;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class ModalidadeRepositorioControllerTest extends RestIntegrationControllerTestCase
{
    /**
     * @var string
     */
    protected string $controllerClass = ModalidadeRepositorioController::class;

    /**
     * @var string
     */
    protected string $resourceClass = ModalidadeRepositorioResource::class;
}
