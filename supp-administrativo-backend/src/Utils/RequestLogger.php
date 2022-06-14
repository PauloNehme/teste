<?php

declare(strict_types=1);
/**
 * /src/Utils/RequestLogger.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Utils;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use SuppCore\AdministrativoBackend\Entity\ApiKey;
use SuppCore\AdministrativoBackend\Entity\LogRequest;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use SuppCore\AdministrativoBackend\Helpers\LoggerAwareTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class RequestLogger.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class RequestLogger implements RequestLoggerInterface
{
    // Traits
    use LoggerAwareTrait;

    private Response $response;

    private Request $request;

    private ?Usuario $user = null;

    private ?ApiKey $apiKey = null;

    private bool $masterRequest;

    protected EntityManagerInterface $entityManager;

    /**
     * RequestLogger constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * Setter for response object.
     *
     * @param Response $response
     *
     * @return RequestLoggerInterface
     */
    public function setResponse(Response $response): RequestLoggerInterface
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Setter for request object.
     *
     * @param Request $request
     *
     * @return RequestLoggerInterface
     */
    public function setRequest(Request $request): RequestLoggerInterface
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Setter method for current user.
     *
     * @param Usuario|null $user
     *
     * @return RequestLoggerInterface
     */
    public function setUser(?Usuario $user = null): RequestLoggerInterface
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Setter method for current api key.
     *
     * @param ApiKey|null $apiKey
     *
     * @return RequestLoggerInterface
     */
    public function setApiKey(?ApiKey $apiKey = null): RequestLoggerInterface
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Setter method for 'master request' info.
     *
     * @param bool $masterRequest
     *
     * @return RequestLoggerInterface
     */
    public function setMasterRequest(bool $masterRequest): RequestLoggerInterface
    {
        $this->masterRequest = $masterRequest;

        return $this;
    }

    /**
     * Method to handle current response and log it to database.
     */
    public function handle(): void
    {
        // Just check that we have all that we need
        if (!($this->request instanceof Request) || !($this->response instanceof Response)) {
            return;
        }

        try {
            $this->createRequestLogEntry();
        } catch (Throwable $error) {
            $this->logger->error($error->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private function createRequestLogEntry(): void
    {
        // Create new request log entity
        $entity = new LogRequest($this->request, $this->response, $this->user, $this->apiKey, $this->masterRequest);
        //$this->entityManager->persist($entity);
        //$this->entityManager->flush();
    }
}
