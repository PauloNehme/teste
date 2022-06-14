<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class EspecieRelevanciaControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class EspecieRelevanciaControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/especie_relevancia';

    protected int $idToGet = 1;

    protected int $idToDelete = 2;

    protected int $idToPut = 2;

    protected int $idToPatch = 2;

    protected array $jsonPostBody = [
        'generoRelevancia' => 1,
        'nome' => 'ESPÉCIE RELEVÂNCIA - POST',
        'descricao' => 'ESPÉCIE RELEVÂNCIA - POST',
        'ativo' => true,
    ];

    protected array $jsonPutBody = [
        'generoRelevancia' => 1,
        'nome' => 'ESPÉCIE RELEVÂNCIA - PUT',
        'descricao' => 'ESPÉCIE RELEVÂNCIA - PUT',
        'ativo' => true,
    ];

    protected array $jsonPatchBody = [
        'descricao' => 'ESPÉCIE RELEVÂNCIA - PATCH',
        'ativo' => false,
    ];

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }
}
