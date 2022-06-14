<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    $parameters->set(
        Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER,
        '/app/var/cache/dev/SuppCore_AdministrativoBackend_KernelDevDebugContainer.xml'
    );

    // Define what rule sets will be applied
    $parameters->set(Option::SETS, [
        SetList::PHP_80,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::SYMFONY_52,
        SetList::SYMFONY_CODE_QUALITY,
    ]);
};
