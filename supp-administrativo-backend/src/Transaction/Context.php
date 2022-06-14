<?php

declare(strict_types=1);
/**
 * /src/Transaction/Context.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Transaction;

use Ramsey\Uuid\Uuid;

/**
 * Class Context.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Context
{
    protected string $uuid;

    protected string $name;

    protected string|int|array|bool $value;

    /**
     * Context constructor.
     *
     * @param string $name
     * @param string|int|bool $value
     */
    public function __construct(string $name, string|int|array|bool $value)
    {
        $this->uuid = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|int|array|bool
     */
    public function getValue(): string|int|array|bool
    {
        return $this->value;
    }

    /**
     * @param string|int|array|bool $value
     */
    public function setValue(string|int|array|bool $value): void
    {
        $this->value = $value;
    }
}
