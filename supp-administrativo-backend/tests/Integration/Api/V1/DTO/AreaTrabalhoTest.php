<?php

declare(strict_types=1);
/**
 * /tests/Integration/Api/V1/DTO/AreaTrabalhoTest.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Integration\Api\V1\DTO;

use SuppCore\AdministrativoBackend\Api\V1\DTO\AreaTrabalho as AreaTrabalhoDto;
use SuppCore\AdministrativoBackend\Entity\AreaTrabalho as AreaTrabalhoEntity;

/**
 * Class AreaTrabalhoTest.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class AreaTrabalhoTest extends DtoTestCase
{
    protected string $dtoClass = AreaTrabalhoDto::class;

    protected string $entityClass = AreaTrabalhoEntity::class;
}
