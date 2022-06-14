<?php
declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Migrations\Factory;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\Migrations\Version\MigrationFactory;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class MigrationFactoryDecorator implements MigrationFactory
{

    public function __construct(private MigrationFactory $migrationFactory,
                                private ContainerInterface $container) {
    }

    public function createVersion(string $migrationClassName): AbstractMigration
    {
        $instance = $this->migrationFactory->createVersion($migrationClassName);

        if ($instance instanceof ContainerAwareInterface) {
            $instance->setContainer($this->container);
        }

        return $instance;
    }


}
