<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class ApiKeyControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class ApiKeyControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected string $username = '00000000003';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/api_key';

    protected int $idToGet = 1;

    protected int $idToDelete = 1;

    protected int $idToPut = 1;

    protected int $idToPatch = 1;

    protected array $jsonPostBody = [
        'token' => 'token-----------------------------------',
        'description' => 'ApiKey Description: token',
    ];

    protected array $jsonPutBody = [
        'token' => 'user------------------------------------',
        'description' => 'ApiKey Description: user',
    ];

    protected array $jsonPatchBody = [
        'description' => 'ApiKey Description: test',
    ];

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }
}
