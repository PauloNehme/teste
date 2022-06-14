<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class RegraEtiquetaControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class RegraEtiquetaControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/regra_etiqueta';

    protected int $idToGet = 1;

    protected array $jsonPostBody = [
        'nome' => 'REGRA-ETIQUETA-3',
        'descricao' => 'Descrição 3',
        'criteria' => null,
        'etiqueta' => 1,
    ];

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'nome' => 'REGRA-ETIQUETA-3',
        'descricao' => 'Descrição 3',
        'criteria' => null,
        'etiqueta' => 1,
    ];

    protected int $idToPatch = 1;

    protected array $jsonPatchBody = [
        'nome' => 'REGRA-ETIQUETA-3',
        'descricao' => 'Descrição 3',
        'criteria' => null,
        'etiqueta' => 1,
    ];

    protected int $idToDelete = 1;
}
