<?php

declare(strict_types=1);
/**
 * /src/Entity/LogRequest.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Entity;

use SuppCore\AdministrativoBackend\Entity\Traits\Id;
use SuppCore\AdministrativoBackend\Entity\Traits\Uuid;
use function array_key_exists;
use function array_map;
use function array_walk;
use function basename;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use function explode;
use function is_array;
use LogicException;
use function mb_strlen;
use function mb_strtolower;
use function parse_str;
use function preg_replace;
use function strpos;
use function strval;
use SuppCore\AdministrativoBackend\Entity\Traits\LogEntityTrait;
use SuppCore\AdministrativoBackend\Utils\JSON;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LogRequest.
 *
 *  @ORM\Table(
 *     name="ad_log_request",
 *     indexes={
 *         @ORM\Index(name="log_request_usuario_id", columns={"usuario_id"}),
 *         @ORM\Index(name="log_request_api_key_id", columns={"api_key_id"}),
 *         @ORM\Index(name="log_request_request_date", columns={"log_date"}),
 *     }
 * )
 * @ORM\Entity(
 *     readOnly=true
 * )
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LogRequest implements EntityInterface
{
    // Traits
    use LogEntityTrait;
    use Id;
    use Uuid;

    /**
     * LogRequest constructor.
     *
     * @param Request|null  $request
     * @param Response|null $response
     * @param Usuario|null  $usuario
     * @param ApiKey|null   $apiKey
     * @param bool          $masterRequest
     *
     * @throws LogicException
     * @throws Exception
     */
    public function __construct(
        ?Request $request = null,
        ?Response $response = null,
        ?Usuario $usuario = null,
        ?ApiKey $apiKey = null,
        ?bool $masterRequest = null
    ) {
        $this->setUuid();
        $this->usuario = $usuario;
        $this->apiKey = $apiKey;
        $this->masterRequest = $masterRequest ?? true;

        $this->processTimeAndDate();

        if (null !== $request) {
            $this->processRequestData($request);
            $this->processRequest($request);
        }

        if (null !== $response) {
            $this->processResponse($response);
        }
    }

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Usuario",
     *     inversedBy="logsRequest"
     * )
     * @ORM\JoinColumn(
     *     name="usuario_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Usuario $usuario = null;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="ApiKey",
     *     inversedBy="logsRequest"
     * )
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(
     *         name="api_key_id",
     *         referencedColumnName="id",
     *         nullable=true
     *     ),
     * })
     */
    protected ?ApiKey $apiKey = null;

    /**
     * @ORM\Column(
     *     name="status_code",
     *     type="integer",
     *     nullable=false
     * )
     */
    protected int $statusCode;

    /**
     * @ORM\Column(
     *     name="response_content_length",
     *     type="integer",
     *     nullable=false
     * )
     */
    protected int $responseContentLength;

    /**
     * @ORM\Column(
     *     name="is_master_request",
     *     type="boolean",
     *     nullable=false
     * )
     */
    protected bool $masterRequest;

    protected string $replaceValue = '*** REPLACED ***';

    /**
     * @var mixed[]
     *
     * @ORM\Column(
     *     name="headers",
     *     type="array",
     * )
     */
    protected array $headers;

    /**
     * @ORM\Column(
     *     name="method",
     *     type="string",
     *     length=255,
     *     nullable=false
     * )
     */
    protected string $method;

    /**
     * @ORM\Column(
     *     name="scheme",
     *     type="string",
     *     length=5,
     *     nullable=false
     * )
     */
    protected string $scheme;

    /**
     * @ORM\Column(
     *     name="base_path",
     *     type="string",
     *     length=255,
     *     nullable=false
     * )
     */
    protected string $basePath;

    /**
     * @ORM\Column(
     *     name="script",
     *     type="string",
     *     length=255,
     *     nullable=false
     * )
     */
    protected string $script;

    /**
     * @ORM\Column(
     *     name="path",
     *     type="text",
     *     nullable=true
     * )
     */
    protected ?string $path = null;

    /**
     * @ORM\Column(
     *     name="query_string",
     *     type="text",
     *     nullable=true
     * )
     */
    protected ?string $queryString = null;

    /**
     * @ORM\Column(
     *     name="uri",
     *     type="text",
     *     nullable=false
     * )
     */
    protected string $uri;

    /**
     * @ORM\Column(
     *     name="controller",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $controller = null;

    /**
     * @ORM\Column(
     *     name="content_type",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $contentType = null;

    /**
     * @ORM\Column(
     *     name="content_type_short",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $contentTypeShort = null;

    /**
     * @ORM\Column(
     *     name="is_xml_http_request",
     *     type="boolean",
     *     nullable=false
     * )
     */
    protected bool $xmlHttpRequest;

    /**
     * @ORM\Column(
     *     name="action",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $action = null;

    /**
     * @ORM\Column(
     *     name="content",
     *     type="text",
     *     nullable=true
     * )
     */
    protected ?string $content = null;

    /**
     * @var mixed[]
     *
     * @ORM\Column(
     *     name="parameters",
     *     type="array",
     * )
     */
    protected array $parameters;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return int
     */
    public function getResponseContentLength(): int
    {
        return $this->responseContentLength;
    }

    /**
     * @return ApiKey|null
     */
    public function getApiKey(): ?ApiKey
    {
        return $this->apiKey;
    }

    /**
     * @return bool
     */
    public function isMasterRequest(): bool
    {
        return $this->masterRequest;
    }

    /**
     * @param Response $response
     */
    protected function processResponse(Response $response): void
    {
        $this->statusCode = $response->getStatusCode();
        $this->responseContentLength = mb_strlen($response->getContent());
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

    /**
     * @return string|null
     */
    public function getQueryString(): ?string
    {
        return $this->queryString;
    }

    /**
     * @return mixed[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return bool
     */
    public function isXmlHttpRequest(): bool
    {
        return $this->xmlHttpRequest;
    }

    /**
     * @return string|null
     */
    public function getController(): ?string
    {
        return $this->controller;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getScript(): string
    {
        return $this->script;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @return string|null
     */
    public function getContentTypeShort(): ?string
    {
        return $this->contentTypeShort;
    }

    /**
     * @param Request $request
     *
     * @throws LogicException
     */
    protected function processRequest(Request $request): void
    {
        $this->processRequestBaseInfo($request);
        $this->processHeadersAndParameters($request);

        $this->action = $this->determineAction($request);
        $this->content = $this->cleanContent((string) $request->getContent());
    }

    /**
     * @param Request $request
     *
     * @throws LogicException
     */
    protected function processHeadersAndParameters(Request $request): void
    {
        $rawHeaders = $request->headers->all();

        // Clean possible sensitive data from parameters
        array_walk($rawHeaders, function (&$value, string $key): void {
            $this->cleanParameters($value, $key);
        });

        $this->headers = $rawHeaders;

        $rawParameters = $this->determineParameters($request);

        // Clean possible sensitive data from parameters
        array_walk($rawParameters, function (&$value, string $key): void {
            $this->cleanParameters($value, $key);
        });

        $this->parameters = $rawParameters;
    }

    /**
     * @param Request $request
     */
    protected function processRequestBaseInfo(Request $request): void
    {
        $this->method = $request->getRealMethod();
        $this->scheme = $request->getScheme();
        $this->basePath = $request->getBasePath();
        $this->script = '/'.basename($request->getScriptName());
        $this->path = $request->getPathInfo();
        $this->queryString = $request->getRequestUri();
        $this->uri = $request->getUri();
        $this->controller = $request->get('_controller', '');
        $this->contentType = strval($request->getMimeType($request->getContentType() ?? ''));
        $this->contentTypeShort = (string) $request->getContentType();
        $this->xmlHttpRequest = $request->isXmlHttpRequest();
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function determineAction(Request $request): string
    {
        $rawAction = $request->get('_controller', '');
        $rawAction = explode(strpos($rawAction, '::') ? '::' : ':', $rawAction);

        return $rawAction[1] ?? '';
    }

    /**
     * Getter method to convert current request parameters to array.
     *
     * @param Request $request
     *
     * @return mixed[]
     *
     * @throws LogicException
     */
    protected function determineParameters(Request $request): array
    {
        $rawContent = (string) $request->getContent();

        // By default just get whole parameter bag
        $output = $request->request->all();

        // Content given so parse it
        if ($rawContent) {
            // First try to convert content to array from JSON
            try {
                $output = JSON::decode($rawContent, true);
            } /* @noinspection BadExceptionsProcessingInspection */ catch (LogicException $error) {
                // Oh noes content isn't JSON so just parse it
                $output = [];

                parse_str($rawContent, $output);
            }
        }

        return (array) $output;
    }

    /**
     * Helper method to clean parameters / header array of any sensitive data.
     *
     * @param mixed  $value
     * @param string $key
     */
    protected function cleanParameters(&$value, string $key): void
    {
        // What keys we should replace so that any sensitive data is not logged
        $replacements = [
            'password' => $this->replaceValue,
            'token' => $this->replaceValue,
            'authorization' => $this->replaceValue,
            'cookie' => $this->replaceValue,
        ];

        // Normalize current key
        $key = mb_strtolower($key);

        // Replace current value
        if (array_key_exists($key, $replacements)) {
            $value = $this->cleanContent($replacements[$key]);
        }

        // Recursive call
        if (is_array($value)) {
            array_walk($value, function (&$value, string $key): void {
                $this->cleanParameters($value, $key);
            });
        }
    }

    /**
     * Method to clean raw request content of any sensitive data.
     *
     * @param string $inputContent
     *
     * @return string
     */
    protected function cleanContent(string $inputContent): string
    {
        $iterator = static function ($search) use (&$inputContent): void {
            $inputContent = preg_replace('/('.$search.'":)\s*"(.*)"/', '$1"*** REPLACED ***"', $inputContent);
        };

        static $replacements = [
            'password',
            'token',
            'authorization',
            'cookie',
        ];

        array_map($iterator, $replacements);

        return $inputContent;
    }
}
