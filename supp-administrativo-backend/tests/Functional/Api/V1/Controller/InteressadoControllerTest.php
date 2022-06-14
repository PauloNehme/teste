<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class InteressadoControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class InteressadoControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/interessado';

    protected int $idToGet = 1;

    protected array $jsonPostBody = [
        'pessoa' => 1,
        'processo' => 1,
        'origemDados' => 1,
        'modalidadeInteressado' => 1,
        'criado_em' => '2021-09-16 09:37:58',
        'atualizado_em' => '2021-09-16 09:37:58',
        'apagado_em' => null,
    ];

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'pessoa' => 4,
        'processo' => 2,
        'origemDados' => 1,
        'modalidadeInteressado' => 1,
        'criado_em' => '2021-09-16 09:37:58',
        'atualizado_em' => '2021-09-16 09:37:58',
        'apagado_em' => null,
    ];

    protected int $idToPatch = 1;

    protected array $jsonPatchBody = [
        'pessoa' => 1,
        'processo' => 1,
        'origemDados' => 1,
        'modalidadeInteressado' => 1,
        'criado_em' => '2021-09-16 09:37:58',
        'atualizado_em' => '2021-09-16 09:37:58',
        'apagado_em' => null,
    ];

    protected int $idToDelete = 1;
}
