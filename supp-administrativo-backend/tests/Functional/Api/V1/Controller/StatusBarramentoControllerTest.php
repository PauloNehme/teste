<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Tests\Functional\Api\V1\Controller;

use SuppCore\AdministrativoBackend\Utils\Tests\DatabaseTrait;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class StatusBarramentoControllerTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class StatusBarramentoControllerTest extends ControllerTestCase
{
    use DatabaseTrait;

    protected function setUp(): void
    {
        $this->restoreDatabase();
        parent::setUp();
    }

    protected string $username = '00000000004';

    protected string $password = 'Agu123456';

    protected string $baseUrl = '/v1/administrativo/status_barramento';

    protected int $idToGet = 1;

    protected int $idToSincronizaBarramento = 1;

    protected array $jsonPostBody = [
        'codigoErro' => null,
        'documentoAvulso' => null,
        'codSituacaoTramitacao' => 102,
        'idt' => 102,
        'idtComponenteDigital' => null,
        'mensagemErro' => 'MensagemErro-2',
        'processo' => 1,
        'tramitacao' => null,
    ];

    protected int $idToPut = 1;

    protected array $jsonPutBody = [
        'codigoErro' => null,
        'documentoAvulso' => null,
        'codSituacaoTramitacao' => 102,
        'idt' => 102,
        'idtComponenteDigital' => null,
        'mensagemErro' => 'MensagemErro-2',
        'processo' => 1,
        'tramitacao' => null,
    ];

    protected int $idToPatch = 1;

    protected array $jsonPatchBody = [
        'codigoErro' => null,
        'documentoAvulso' => null,
        'codSituacaoTramitacao' => 102,
        'idt' => 102,
        'idtComponenteDigital' => null,
        'mensagemErro' => 'MensagemErro-2',
        'processo' => 1,
        'tramitacao' => null,
    ];

    protected int $idToDelete = 1;


    /**
     * @dataProvider usernamePasswordProvider
     *
     * @param string $username
     * @param string $password
     *
     * @throws Throwable
     */
    public function testThatSincronizaBarramentoGetRouteReturn200(string $username, string $password): void
    {
        static::assertNotEmpty($this->idToSincronizaBarramento, 'idToSincronizaBarramento deve conter o ID');

        $url = $this->baseUrl.'/'.$this->idToSincronizaBarramento.'/sincroniza_barramento';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);
        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');
        static::assertSame(200, $response->getStatusCode());

        $responseJson = json_decode($response->getContent(), true);
    }

    /**
     * @throws Throwable
     */
    public function testThatSincronizaBarramentoGetRouteReturn401(): void
    {
        $response = $this->basicRequest(
            $this->baseUrl.'/'.$this->idToSincronizaBarramento.'/sincroniza_barramento',
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
    public function testThatSincronizaBarramentoGetRouteReturn404(string $username, string $password): void
    {
        $url = $this->baseUrl.'/0/sincroniza_barramento';
        $response = $this->basicRequest($url, 'GET', $username, $password, []);

        static::assertInstanceOf(Response::class, $response);
        static::assertJson($response->getContent(), 'A resposta deve ser um JSON');

        $responseJson = json_decode($response->getContent(), true);

        static::assertArrayHasKey('message', $responseJson, 'No JSON de resposta, deve conter a chave "message".');
        static::assertSame(404, $response->getStatusCode(), $responseJson['message']);
    }

}
