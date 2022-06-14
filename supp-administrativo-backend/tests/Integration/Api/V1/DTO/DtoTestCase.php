<?php

declare(strict_types=1);
/**
 * /tests/Integration/Api/V1/DTO/DtoTestCase.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Integration\Api\V1\DTO;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Form\Annotations\Field;
use SuppCore\AdministrativoBackend\Mapper\MapperManager;
use SuppCore\AdministrativoBackend\Utils\Tests\PhpUnitUtil;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class DtoTestCase.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class DtoTestCase extends KernelTestCase
{
    private ?MapperManager $mapperManager;

    protected string $dtoClass;

    protected string $entityClass;

    protected array $ignoreProperties = [
        'id',
        'uuid',
        'criadoEm',
        'atualizadoEm',
        'criadoPor',
        'atualizadoPor',
        'apagadoEm',
        'apagadoPor',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->mapperManager = self::getContainer()->get(MapperManager::class);
    }

    /**
     * @return void
     *
     * @throws ReflectionException
     */
    public function testDataTransferFromDtoToEntity(): void
    {
        $dto = new $this->dtoClass();
        $entity = new $this->entityClass();

        $mapperMetadata = $this->mapperManager->getMapperMetadata($this->dtoClass);

        foreach ($mapperMetadata->getProperties() as $property) {
            if ($property->collection || in_array($property->name, $this->ignoreProperties)) {
                continue;
            }

            $propertyType = (new ReflectionProperty($this->entityClass, $property->name))->getType()->getName();

            $setter = $property->dtoSetter ?? 'set'.ucfirst($property->name);
            $getter = $property->dtoGetter ?? 'get'.ucfirst($property->name);

            $value = PhpUnitUtil::getValidValueForType($propertyType);
            $dto->{$setter}($value);
            $entity->{$setter}($dto->{$getter}());

            self::assertSame(
                $value,
                $entity->{$getter}(),
                sprintf(
                    '%s::%s() retornou um valor inesperado',
                    $this->entityClass,
                    $getter
                )
            );

            $formField = (new AnnotationReader())
                    ->getPropertyAnnotation(
                        new ReflectionProperty($this->dtoClass, $property->name),
                        Field::class
                    ) ?? null;

            if ($formField && str_contains($propertyType, '\Entity\\')) {
                self::assertEquals(
                    $propertyType,
                    $formField->options['class'],
                    sprintf(
                        'A annotation @Form\Field(class) da propriedade %s não contém a entidade esperada %s',
                        $property->name,
                        $propertyType
                    )
                );
            }

            if (!in_array($property->name, $this->ignoreProperties)) {
                self::assertContains(
                    $property->name,
                    $dto->getVisited(),
                    sprintf(
                        'A propriedade %s não foi definida como visitada.',
                        $property->name
                    )
                );
            }
        }
    }

    /**
     * @throws ReflectionException
     */
    public function testDataTransferFromEntityToDto(): void
    {
        $this->populateEntityAndConvertToDto(new $this->entityClass(), $this->dtoClass);
    }

    /**
     * @throws ReflectionException
     */
    public function populateEntityAndConvertToDto(
        EntityInterface $entity,
        string $dtoCLass,
        int $counter = 0
    ): RestDtoInterface {
        $dto = new $dtoCLass();

        $mapperMetadata = $this->mapperManager->getMapperMetadata($dtoCLass);

        foreach ($mapperMetadata->getProperties() as $property) {
            $setter = $property->dtoSetter ?? 'set'.ucfirst($property->name);
            $getter = $property->dtoGetter ?? 'get'.ucfirst($property->name);

            if ($counter > 1 || 'id' === $property->name || 'uuid' === $property->name) {
                continue;
            }

            if ($property->collection) {
                $propertyType = (new ReflectionMethod(
                    $entity::class,
                    $setter
                ))->getParameters()[0]->getType()->getName();
            } else {
                $propertyType = (new ReflectionProperty($entity::class, $property->name))->getType()->getName();
            }

            $value = PhpUnitUtil::getValidValueForType($propertyType);

            $entity->{$setter}($value);

            if (null !== $property->dtoClass) {
                if ($property->collection) {
                    foreach ($entity->{$getter}() as $item) {
                        if ($item) {
                            $dto->{$setter}(
                                $this->populateEntityAndConvertToDto(
                                    $item,
                                    $property->dtoClass,
                                    $counter + 1
                                )
                            );
                        }
                    }
                } elseif ($entity->{$getter}()) {
                    $dto->{$setter}(
                        $this->populateEntityAndConvertToDto(
                            $entity->{$getter}(),
                            $property->dtoClass,
                            $counter + 1
                        )
                    );
                }
                continue;
            }

            $dto->{$setter}($entity->{$getter}());

            if (is_object($dto->{$getter}())) {
                self::assertStringNotContainsString(
                    '\Entity\\',
                    get_class($dto->{$getter}()),
                    sprintf(
                        'A propriedade %s não contém annotation @DTOMapper\Property(dtoClass) esperada',
                        $property->name
                    )
                );
            }

            self::assertSame(
                $value,
                $dto->{$getter}(),
                sprintf(
                    '%s::%s() retornou um valor inesperado',
                    $this->dtoClass,
                    $getter,
                )
            );
        }

        return $dto;
    }
}
