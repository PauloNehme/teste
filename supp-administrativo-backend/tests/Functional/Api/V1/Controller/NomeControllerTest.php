<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class NomeControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class NomeControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/nome';

    protected int $idToGet = 1;

    protected array $jsonPostBody = [
        'valor' => 'Nome 2',
        'origemDados' => null,
        'pessoa' => 2,
    ];

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'valor' => 'Nome 2',
        'origemDados' => null,
        'pessoa' => 2,
    ];

    protected int $idToPatch = 1;

    protected array $jsonPatchBody = [
        'valor' => 'Nome 2',
        'origemDados' => null,
        'pessoa' => 2,
    ];

    protected int $idToDelete = 1;
}
