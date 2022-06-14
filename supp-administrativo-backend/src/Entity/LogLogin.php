<?php

declare(strict_types=1);
/**
 * /src/Entity/LogLogin.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Entity;

use DeviceDetector\DeviceDetector;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use function implode;
use function is_array;
use SuppCore\AdministrativoBackend\Entity\Traits\Id;
use SuppCore\AdministrativoBackend\Entity\Traits\LogEntityTrait;
use SuppCore\AdministrativoBackend\Entity\Traits\Uuid;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LogLogin.
 *
 * @ORM\Table(
 *     name="ad_log_login",
 *     indexes={
 *         @ORM\Index(name="log_login_usuario_id", columns={"usuario_id"}),
 *         @ORM\Index(name="log_login_date", columns={"log_date"}),
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
class LogLogin implements EntityInterface
{
    // Traits
    use LogEntityTrait;
    use Id;
    use Uuid;

    /**
     * Constructor.
     *
     * @param string         $type
     * @param Request        $request
     * @param DeviceDetector $deviceDetector
     * @param Usuario|null   $usuario
     *
     * @throws Exception
     */
    public function __construct(
        string $type,
        Request $request,
        DeviceDetector $deviceDetector,
        ?Usuario $usuario = null
    ) {
        $this->setUuid();
        $this->type = $type;
        $this->deviceDetector = $deviceDetector;
        $this->usuario = $usuario;

        $this->processTimeAndDate();
        $this->processRequestData($request);
        $this->processClientData();
    }

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Usuario",
     *     inversedBy="logsLogin"
     * )
     * @ORM\JoinColumn(
     *     name="usuario_id",
     *     referencedColumnName="id",
     *     nullable=true
     * )
     */
    protected ?Usuario $usuario = null;

    /**
     * @ORM\Column(
     *     name="log_type",
     *     type="string",
     *     length=20,
     *     nullable=false
     * )
     */
    protected string $type;

    /**
     * @ORM\Column(
     *     name="client_type",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $clientType = null;

    /**
     * @ORM\Column(
     *     name="client_name",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $clientName = null;

    /**
     * @ORM\Column(
     *     name="client_short_name",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $clientShortName = null;

    /**
     * @ORM\Column(
     *     name="client_version",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $clientVersion = null;

    /**
     * @ORM\Column(
     *     name="client_engine",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $clientEngine = null;

    /**
     * @ORM\Column(
     *     name="os_name",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $osName = null;

    /**
     * @ORM\Column(
     *     name="os_short_name",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $osShortName = null;

    /**
     * @ORM\Column(
     *     name="os_version",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $osVersion = null;

    /**
     * @ORM\Column(
     *     name="os_platform",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $osPlatform = null;

    /**
     * @ORM\Column(
     *     name="device_name",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $deviceName = null;

    /**
     * @ORM\Column(
     *     name="brand_name",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $brandName = null;

    /**
     * @ORM\Column(
     *     name="model",
     *     type="string",
     *     length=255,
     *     nullable=true
     * )
     */
    protected ?string $model = null;

    protected ?DeviceDetector $deviceDetector = null;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getClientType(): ?string
    {
        return $this->clientType;
    }

    /**
     * @return string|null
     */
    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    /**
     * @return string|null
     */
    public function getClientShortName(): ?string
    {
        return $this->clientShortName;
    }

    /**
     * @return string|null
     */
    public function getClientVersion(): ?string
    {
        return $this->clientVersion;
    }

    /**
     * @return string|null
     */
    public function getClientEngine(): ?string
    {
        return $this->clientEngine;
    }

    /**
     * @return string|null
     */
    public function getOsName(): ?string
    {
        return $this->osName;
    }

    /**
     * @return string|null
     */
    public function getOsShortName(): ?string
    {
        return $this->osShortName;
    }

    /**
     * @return string|null
     */
    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    /**
     * @return string|null
     */
    public function getOsPlatform(): ?string
    {
        return $this->osPlatform;
    }

    /**
     * @return string|null
     */
    public function getDeviceName(): ?string
    {
        return $this->deviceName;
    }

    /**
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    protected function processClientData(): void
    {
        $this->clientType = $this->getClientData('getClient', 'type');
        $this->clientName = $this->getClientData('getClient', 'name');
        $this->clientShortName = $this->getClientData('getClient', 'short_name');
        $this->clientVersion = $this->getClientData('getClient', 'version');
        $this->clientEngine = $this->getClientData('getClient', 'engine');
        $this->osName = $this->getClientData('getOs', 'name');
        $this->osShortName = $this->getClientData('getOs', 'short_name');
        $this->osVersion = $this->getClientData('getOs', 'version');
        $this->osPlatform = $this->getClientData('getOs', 'platform');
        $this->deviceName = $this->deviceDetector->getDeviceName();
        $this->brandName = $this->deviceDetector->getBrandName();
        $this->model = $this->deviceDetector->getModel();
    }

    /**
     * @param string $method
     * @param string $attribute
     *
     * @return string
     */
    protected function getClientData(string $method, string $attribute): string
    {
        $value = $this->deviceDetector->{$method}($attribute);

        return is_array($value) ? implode(', ', $value) : $value;
    }
}
