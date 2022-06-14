<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Rules/Processo/Rule0013.php.
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\Processo;

use SuppCore\AdministrativoBackend\Api\V1\DTO\Processo as ProcessoDTO;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Processo as ProcessoEntity;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;

/**
 * Class Rule0013.
 *
 * @descSwagger=Verifica se o processo possui juntadas!
 * @classeSwagger=Rule0013
 */
class Rule0013 implements RuleInterface
{
    /**
     * Rule0013 constructor.
     */
    public function __construct(private RulesTranslate $rulesTranslate)
    {
    }

    public function supports(): array
    {
        return [
            ProcessoDTO::class => [
                'beforeDownload'
            ]
        ];
    }

    /**
     * @param ProcessoDTO|RestDtoInterface|null $restDto
     * @param ProcessoEntity|EntityInterface $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        foreach ($entity->getVolumes() as $volume) {
            if (!$volume->getJuntadas()->count()) {
                $this->rulesTranslate->throwException('processo', '0013');
            }
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
