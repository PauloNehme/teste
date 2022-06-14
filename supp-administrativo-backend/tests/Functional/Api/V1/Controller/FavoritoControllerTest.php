<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;
use Throwable;

/**
 * Class FavoritoControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class FavoritoControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/favorito';

    protected int $idToGet = 1;

    protected int $idToDelete = 1;

    protected int $idToPut = 1;

    protected int $idToPatch = 1;

    protected array $jsonPostBody = [];

    protected array $jsonPutBody = [];

    protected array $jsonPatchBody = [];

    protected function setUp(): void
    {
        $this->restoreDatabase();
        $this->loadFixtures([
            'testFavorito',
        ]);
        parent::setUp();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     * @throws Throwable
     */
    public function testThatPostRouteReturn201(string $username, string $password): void
    {
        static::expectNotToPerformAssertions();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     * @throws Throwable
     */
    public function testThatPatchRouteReturn200(string $username, string $password): void
    {
        static::expectNotToPerformAssertions();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     * @throws Throwable
     */
    public function testThatPutRouteReturn200(string $username, string $password): void
    {
        static::expectNotToPerformAssertions();
    }
}
