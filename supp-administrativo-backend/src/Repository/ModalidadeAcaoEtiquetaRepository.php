<?php

declare(strict_types=1);
/**
 * /src/Repository/ModalidadeAcaoEtiquetaRepository.php.
 */

namespace SuppCore\AdministrativoBackend\Repository;

use SuppCore\AdministrativoBackend\Entity\ModalidadeAcaoEtiqueta as Entity;

/**
 * Class ModalidadeAcaoEtiquetaRepository.
 *
 * @codingStandardsIgnoreStart
 *
 * @method Entity|null find(int $id, ?array $populate = null)
 * @method Entity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entity[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method Entity[]    findByAdvanced(array $criteria, array $orderBy = null, int $limit = null, int $offset = null, array $search = null): array
 * @method Entity[] findAll()
 *
 * @codingStandardsIgnoreEnd
 */
class ModalidadeAcaoEtiquetaRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected static string $entityName = Entity::class;
}
