<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/GeneroDocumentoAvulso.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\DTO;

use SuppCore\AdministrativoBackend\DTO\RestDto;
use SuppCore\AdministrativoBackend\DTO\Traits\Ativo;
use SuppCore\AdministrativoBackend\DTO\Traits\Blameable;
use SuppCore\AdministrativoBackend\DTO\Traits\Descricao;
use SuppCore\AdministrativoBackend\DTO\Traits\IdUuid;
use SuppCore\AdministrativoBackend\DTO\Traits\Nome;
use SuppCore\AdministrativoBackend\DTO\Traits\Softdeleteable;
use SuppCore\AdministrativoBackend\DTO\Traits\Timeblameable;
use SuppCore\AdministrativoBackend\Form\Annotations as Form;
use SuppCore\AdministrativoBackend\Mapper\Annotations as DTOMapper;
use SuppCore\AdministrativoBackend\Validator\Constraints as AppAssert;

/**
 * Class GeneroDocumentoAvulso.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @AppAssert\DtoUniqueEntity(
 *      fieldMapping = {"nome": "nome"},
 *      entityClass="SuppCore\AdministrativoBackend\Entity\GeneroDocumentoAvulso",
 *      message = "Campo já está em utilização!"
 * )
 *
 * @DTOMapper\JsonLD(
 *     jsonLDId="/v1/administrativo/genero_documento_avulso/{id}",
 *     jsonLDType="GeneroDocumentoAvulso",
 *     jsonLDContext="/api/doc/#model-GeneroDocumentoAvulso"
 * )
 *
 * @Form\Form()
 * @Form\Cacheable(expire="86400")
 */
class GeneroDocumentoAvulso extends RestDto
{
    use IdUuid;
    use Nome;
    use Descricao;
    use Ativo;
    use Timeblameable;
    use Blameable;
    use Softdeleteable;
}
