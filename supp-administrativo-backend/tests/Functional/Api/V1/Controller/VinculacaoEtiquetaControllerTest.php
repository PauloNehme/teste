<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class VinculacaoEtiquetaControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class VinculacaoEtiquetaControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected string $username = '00000000002';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/vinculacao_etiqueta';

    protected int $idToGet = 1;

    protected int $idToDelete = 1;

    protected int $idToPut = 1;

    protected int $idToPatch = 1;

    protected array $jsonPostBody = [
        'etiqueta' => 1,
        'conteudo' => 'CONTEÚDO - POST',
        'privada' => false,
        'dataHoraExpiracao' => '2022-01-01 23:59:59',
        'tarefa' => 1,
        'documento' => 4,
        'usuario' => 5,
        'processo' => 2,
        'setor' => 7,
        'unidade' => 10,
        'modalidadeOrgaoCentral' => 1,
        'documentoAvulso' => 1,
        'relatorio' => 1,
     ];

    protected array $jsonPutBody = [
        'conteudo' => 'CONTEÚDO - PUT',
        'privada' => 1,
        'dataHoraExpiracao' => '2021-10-31 10:47:12',
        'relatorio' => null,
    ];

    protected array $jsonPatchBody = [
        'privada' => true,
    ];

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }
}
