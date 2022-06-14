<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class DocumentoControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class DocumentoControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    protected string $username = '00000000002';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/documento';

    protected int $idToGet = 1;

    protected int $idToDelete = 2;

    protected array $jsonPostBody = [
        'tipoDocumento' => 28,
        'numeroFolhas' => 1,
        'chaveAcesso' => 'e42e3c82',
    ];

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'tipoDocumento' => 28,
        'numeroFolhas' => 1,
        'chaveAcesso' => 'e42e3c82',
        'tarefaOrigem' => 1,
        'processoOrigem' => 1,
    ];

    protected int $idToPatch = 2;

    protected array $jsonPatchBody = [
        'tipoDocumento' => 28,
        'numeroFolhas' => 1,
        'chaveAcesso' => 'e42e3c82',
        'tarefaOrigem' => 1,
        'processoOrigem' => 1,
    ];

    private int $idToMoreTestsDocumentoGet = 2;

    private int $idToMoreTestsDocumentoPut = 9;

    private int $idToMoreTestsDocumentoPatch = 9;

    private int $idToMoreTestsDocumentoDelete = 2;

    private int $idVisibility = 490;

    private array $jsonCreateVisibility = [
        'poderes' => ['ver', 'editar', 'criar', 'apagar'],
        'tipo' => 'usuario',
        'valor' => 2,
    ];

    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatGetPreparaAssinaturaRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToMoreTestsDocumentoGet, 'idToMoreTestsDocumentoGet deve conter o ID');

        $url = $this->baseUrl.'/prepara_assinatura';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @throws Throwable
     */
    public function testThatGetPreparaAssinaturaRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/prepara_assinatura',
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
    public function testThatGetPreparaAssinaturaRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/prepara_assinatura  ';
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
     * @throws Throwable
     */
    public function testThatDeleteAssinaturaRouteReturn200(string $username, string $password)
    {
        static::assertNotEmpty($this->idToMoreTestsDocumentoDelete, '$idToDelete deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToMoreTestsDocumentoDelete.'/delete_assinatura';
        $response = $this->basicRequest($url, 'DELETE', $username, $password, []);
        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @throws Throwable
     */
    public function testThatDeleteAssinaturaRouteReturn401()
    {
        $response = $this->basicRequest($this->baseUrl.'/0/delete_assinatura', 'DELETE', null, null, []);

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
     * @throws Throwable
     */
    public function testThatDeleteAssinaturaRouteReturn404(string $username, string $password)
    {
        $response = $this->basicRequest($this->baseUrl.'/0/delete_assinatura', 'DELETE', $username, $password, []);

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
    public function testThatGetVisibilidadeRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToMoreTestsDocumentoGet, 'idToMoreTestsDocumentoGet deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToMoreTestsDocumentoGet.'/visibilidade';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());
    }

    /**
     * @throws Throwable
     */
    public function testThatGetVisibilidadeRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/0/visibilidade',
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
    public function testThatGetVisibilidadeRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/visibilidade  ';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }

    /**
     * @throws Throwable
     */
    public function testThatPutVisibilidadeRouteReturn401(): void
    {
        $response = $this->basicRequest($this->baseUrl.'/0/visibilidade', 'PUT', null, null, []);

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
     * @throws Throwable
     */
    public function testThatPutVisibilidadeRouteReturn500(string $username, string $password): void
    {
        static::assertNotEmpty($this->jsonPutBody, '$jsonPutBody deve conter dados.');
        $response = $this->basicRequest(
            $this->baseUrl.'/0/visibilidade',
            'PUT',
            $username,
            $password,
            $this->jsonPutBody
        );

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
     * @throws Throwable
     */
    public function testThatPutVisibilidadeRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->jsonPutBody, '$jsonPutBody deve conter dados.');
        static::assertNotEmpty($this->idToMoreTestsDocumentoPut, '$idToPut deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToMoreTestsDocumentoPut.'/visibilidade';
        $response = $this->basicRequest($url, 'PUT', $username, $password, $this->jsonCreateVisibility);

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
    public function testThatDestroyVisibilityRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToMoreTestsDocumentoGet, '$idToMoreTestsDocumentoGet deve conter o ID');
        static::assertNotEmpty($this->idVisibility, '$idVisibility deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToMoreTestsDocumentoGet.'/visibilidade/'.$this->idVisibility;
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
            $this->baseUrl.'/'.$this->idToMoreTestsDocumentoGet.'/visibilidade/'.$this->idVisibility,
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
     * @throws Throwable
     */
    public function testThatPatchConvertToPdfRouteReturn401(): void
    {
        $response = $this->basicRequest($this->baseUrl.'/convertToPdf/0', 'PATCH', null, null, []);

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
     * @throws Throwable
     */
    public function testThatPatchConvertToPdfRouteReturn404(string $username, string $password): void
    {
        $response = $this->basicRequest($this->baseUrl.'/convertToPdf/0', 'PATCH', $username, $password, []);

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
     * @throws Throwable
     */
    public function testThatPatchConvertToPdfRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->jsonPatchBody, '$jsonPatchBody deve conter dados.');
        static::assertNotEmpty($this->idToMoreTestsDocumentoPatch, '$idToMoreTestsDocumentoPatch deve conter o ID');

        $url = $this->baseUrl.'/convertToPdf/'.$this->idToMoreTestsDocumentoPatch;
        $response = $this->basicRequest($url, 'PATCH', $username, $password, $this->jsonPatchBody);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        static::assertSame(200, $response->getStatusCode());
    }
}
