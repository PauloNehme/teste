<?php

declare(strict_types=1);

/**
 * src/Integracao/Dossie/Operacoes/Operacoes/GerarDossie/Message/GerarDossieMessage.php.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Integracao\Dossie\Operacoes\GerarDossie\Message;

/**
 * Class GerarDossieMessage.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 */
class GerarDossieMessage
{
    public function __construct(
        private string $dossieUuid,
        private ?int $usuarioId = null,
        private ?bool $sobDemanda = false
    ) {
    }

    /**
     * @return string
     */
    public function getDossieUuid(): string
    {
        return $this->dossieUuid;
    }

    /**
     * @param string $dossieUuid
     *
     * @return self
     */
    public function setDossieUuid(string $dossieUuid): self
    {
        $this->dossieUuid = $dossieUuid;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUsuarioId(): ?int
    {
        return $this->usuarioId;
    }

    /**
     * @param int|null $usuarioId
     *
     * @return self
     */
    public function setUsuarioId(?int $usuarioId): self
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSobDemanda(): ?bool
    {
        return $this->sobDemanda;
    }

    /**
     * @param bool|null $sobDemanda
     */
    public function setSobDemanda(?bool $sobDemanda): void
    {
        $this->sobDemanda = $sobDemanda;
    }


}
