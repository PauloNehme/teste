<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;

/**
 * Class ModalidadeRelacionamentoPessoalControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class ModalidadeRelacionamentoPessoalControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/modalidade_relacionamento_pessoal';

    protected int $idToGet = 1;

    protected array $jsonPostBody = [
        'valor' => 'DEPENDENTE',
        'descricao' => 'DEPENDENTE',
        'ativo' => true,
    ];

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'valor' => 'DEPENDENTE',
        'descricao' => 'DEPENDENTE',
        'ativo' => true,
    ];

    protected int $idToPatch = 1;

    protected array $jsonPatchBody = [
        'valor' => 'DEPENDENTE',
        'descricao' => 'DEPENDENTE',
        'ativo' => true,
    ];

    protected int $idToDelete = 1;
}
