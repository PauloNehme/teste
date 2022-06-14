<?php

declare(strict_types=1);
/**
 * /src/Utils/RequestLoggerInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Utils;

use Doctrine\ORM\EntityManagerInterface;
use SuppCore\AdministrativoBackend\Entity\ApiKey;
use SuppCore\AdministrativoBackend\Entity\Usuario;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface RequestLoggerInterface.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface RequestLoggerInterface
{
    /**
     * RequestLoggerInterface constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager
    );

    /**
     * Setter for response object.
     *
     * @param Response $response
     *
     * @return RequestLoggerInterface
     */
    public function setResponse(Response $response): self;

    /**
     * Setter for request object.
     *
     * @param Request $request
     *
     * @return RequestLoggerInterface
     */
    public function setRequest(Request $request): self;

    /**
     * Setter method for current user.
     *
     * @param Usuario|null $user
     *
     * @return RequestLoggerInterface
     */
    public function setUser(?Usuario $user = null): self;

    /**
     * Setter method for current api key.
     *
     * @param ApiKey|null $apiKey
     *
     * @return RequestLoggerInterface
     */
    public function setApiKey(?ApiKey $apiKey = null): self;

    /**
     * Setter method for 'master request' info.
     *
     * @param bool $masterRequest
     *
     * @return RequestLoggerInterface
     */
    public function setMasterRequest(bool $masterRequest): self;

    /**
     * Method to handle current response and log it to database.
     */
    public function handle(): void;
}
