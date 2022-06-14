<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class EtiquetaControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class EtiquetaControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected string $username = '00000000002';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/etiqueta';

    protected int $idToGet = 1;

    protected int $idToDelete = 13;

    protected int $idToPut = 13;

    protected int $idToPatch = 13;

    protected array $jsonPostBody = [
        'modalidadeEtiqueta' => 1,
        'corHexadecimal' => '#FFFFF0',
        'sistema' => true,
        'sugerida' => true,
        'nome' => 'TESTE - POST',
        'descricao' => 'TESTE - POST',
        'privada' => true,
        'ativo' => true,
    ];

    protected array $jsonPutBody = [
        'modalidadeEtiqueta' => 1,
        'corHexadecimal' => '#FFFFF0',
        'sistema' => true,
        'sugerida' => true,
        'nome' => 'TESTE - PUT',
        'descricao' => 'TESTE - PUT',
        'privada' => true,
        'ativo' => true,
    ];

    protected array $jsonPatchBody = [
        'descricao' => 'TESTE - PATCH',
        'sistema' => false,
        'ativo' => true,
    ];

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }
}
