<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class ProcessoControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class ProcessoControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/processo';

    protected int $idToGet = 1;

    protected array $jsonPostBody = [
        'titulo' => 'TESTE ABCD 1234',
        'NUP' => 'TESTE ABCD 1234',
        'especieProcesso' => '1',
        'modalidadeMeio' => '1',
        'classificacao' => '2',
        'procedencia' => '1',
        'setorAtual' => '7',
    ];

    protected int $idToDelete = 1;

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'titulo' => 'TESTE ABCDE 12345',
        'setorAtual' => '7',
        'setorInicial' => '7',
        'NUP' => 'ad1212',
        'especieProcesso' => '1',
        'modalidadeMeio' => '1',
        'classificacao' => '2',
        'procedencia' => '1',
        'dataHoraAbertura' => '2021-06-01 00:00:00',
        'unidadeArquivistica' => '1',
        'tipoProtocolo' => '1',
    ];

    protected int $idToPatch = 1;

    protected array $jsonPatchBody = [
        'titulo' => 'TESTE A123',
    ];

    private int $idVisibility = 494;

    private array $jsonCreateVisibility = [
        'poderes' => ['ver', 'editar', 'criar', 'apagar'],
        'tipo' => 'usuario',
        'valor' => 2,
    ];

    private array $searchCriteria = [
        'where' => '{"id":"eq:1"}',
    ];

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatCreateVisibilityRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToGet.'/visibilidade';
        $response = $this->basicRequest($url, 'PUT', $username, $password, $this->jsonCreateVisibility);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('poderes', $responseJson, 'No JSON de resposta, deve conter a chave "poderes".');
        static::assertArrayHasKey('valor', $responseJson, 'No JSON de resposta, deve conter a chave "valor".');
    }

    /**
     * @throws Throwable
     */
    public function testThatCreateVisibilityRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToGet.'/visibilidade',
            'PUT',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatCreateVisibilityRouteReturn500(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/visibilidade';
        $response = $this->basicRequest($url, 'PUT', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(500, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatGetVisibilityRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToGet.'/visibilidade';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('poderes', $responseJson[0], 'No JSON de resposta, deve conter a chave "poderes".');
        static::assertArrayHasKey('valor', $responseJson[0], 'No JSON de resposta, deve conter a chave "valor".');
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatGetVisibilityRouteReturn400(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/visibilidade';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(400, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @throws Throwable
     */
    public function testThatGetVisibilityRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToGet.'/visibilidade',
            'GET',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatDestroyVisibilityRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');
        static::assertNotEmpty($this->idVisibility, '$idVisibility deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToGet.'/visibilidade/'.$this->idVisibility;
        $response = $this->basicRequest($url, 'DELETE', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatDestroyVisibilityRouteReturn400(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/visibilidade/0';
        $response = $this->basicRequest($url, 'DELETE', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(400, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @throws Throwable
     */
    public function testThatDestroyVisibilityRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToGet.'/visibilidade/'.$this->idVisibility,
            'DELETE',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatArchiveRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToGet.'/arquivar';
        $response = $this->basicRequest($url, 'PATCH', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @throws Throwable
     */
    public function testThatArchiveRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToGet.'/arquivar',
            'PATCH',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatArchiveRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/arquivar';
        $response = $this->basicRequest($url, 'PATCH', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatTurnIntoProcessRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToGet.'/autuar';
        $response = $this->basicRequest($url, 'PATCH', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @throws Throwable
     */
    public function testThatTurnIntoProcessRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToGet.'/autuar',
            'PATCH',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatTurnIntoProcessRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/autuar';
        $response = $this->basicRequest($url, 'PATCH', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatSearchProcessRouteReturn200(string $username, string $password): void
    {
        static::assertIsArray($this->searchCriteria, '$searchCriteria deve conter um array');

        $url = $this->baseUrl.'/search';
        $response = $this->basicRequest($url, 'GET', $username, $password, $this->searchCriteria);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('total', $responseJson, 'No JSON de resposta, deve conter a chave "total".');
    }

    /**
     * @throws Throwable
     */
    public function testThatSearchProcessRouteReturn401(): void
    {
        static::assertIsArray($this->searchCriteria, '$searchCriteria deve conter um array');

        $response = $this->basicRequest(
            $this->baseUrl.'/search',
            'GET',
            null,
            null,
            $this->searchCriteria,
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatDownloadRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToGet.'/download/pdf/all';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @throws Throwable
     */
    public function testThatDownloadRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToGet.'/download/pdf/all',
            'GET',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatDownloadRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/download/pdf/all/';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @runInSeparateProcess
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatPrintLabelRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/imprime_etiqueta/'.$this->idToGet;
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('conteudo', $responseJson, 'No JSON de resposta, deve conter a chave "conteudo".');
    }

    /**
     * @throws Throwable
     */
    public function testThatPrintLabelRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/imprime_etiqueta/'.$this->idToGet,
            'GET',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatPrintLabelRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/imprime_etiqueta/';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatPrintReportRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToGet, '$idToGet deve conter o ID');

        $url = $this->baseUrl.'/imprime_relatorio/'.$this->idToGet;
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('conteudo', $responseJson, 'No JSON de resposta, deve conter a chave "conteudo".');
    }

    /**
     * @throws Throwable
     */
    public function testThatPrintReportRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/imprime_relatorio/'.$this->idToGet,
            'GET',
            null,
            null,
            []
        );

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(401, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatPrintReportRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/imprime_relatorio/';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }
}
