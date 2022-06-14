<?php

declare(strict_types=1);
/**
 * /src/Entity/LogLoginFailure.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Entity;

use DateTime;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use SuppCore\AdministrativoBackend\Entity\Traits\Id;
use SuppCore\AdministrativoBackend\Entity\Traits\Uuid;

/**
 * Class LogLoginFailure.
 *
 *  @ORM\Table(
 *     name="ad_log_login_failure",
 *     indexes={
 *         @ORM\Index(name="log_login_failure_usuario_id", columns={"usuario_id"}),
 *     }
 * )
 * @ORM\Entity(
 *     readOnly=true
 * )
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LogLoginFailure implements EntityInterface
{
    use Id;
    use Uuid;

    /**
     * Constructor.
     *
     * @param Usuario $usuario
     * @throws Exception
     */
    public function __construct(Usuario $usuario)
    {
        $this->setUuid();
        $this->usuario = $usuario;
        $this->timestamp = new DateTime('NOW', new DateTimeZone('UTC'));
    }

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Usuario",
     *     inversedBy="logsLoginFailure"
     * )
     * @ORM\JoinColumn(
     *     name="usuario_id",
     *     referencedColumnName="id",
     *     nullable=false
     * )
     */
    protected Usuario $usuario;

    /**
     * @ORM\Column(
     *     name="timestamp",
     *     type="datetime",
     *     nullable=false
     * )
     */
    protected DateTime $timestamp;

    /**
     * @return Usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * @return DateTime
     */
    public function getTimestamp(): DateTime
    {
        return $this->timestamp;
    }
}
