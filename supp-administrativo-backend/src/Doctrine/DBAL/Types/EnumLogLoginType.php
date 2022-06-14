<?php

declare(strict_types=1);
/**
 * /src/Doctrine/DBAL/Types/EnumLogLoginType.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Doctrine\DBAL\Types;

/**
 * Class EnumLogLoginType.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class EnumLogLoginType extends EnumType
{
    public const TYPE_FAILURE = 'failure';
    public const TYPE_SUCCESS = 'success';

    protected static string $name = 'EnumLogLogin';

    /**
     * @var string[]
     */
    protected static array $values = [
        self::TYPE_FAILURE,
        self::TYPE_SUCCESS,
    ];
}
