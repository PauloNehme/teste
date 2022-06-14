<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\Setor;

use SuppCore\AdministrativoBackend\Api\V1\DTO\Setor as SetorDTO;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\Setor as SetorEntity;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use SuppCore\AdministrativoBackend\Utils\CoordenadorService;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0013.
 *
 * @descSwagger=Verifica se a exclusão é de um setor e não uma unidade e se o usuário possui permissão.
 * @classeSwagger=Rule0013
 *
 * @author Felipe Pena <felipe.pena@datainfo.inf.br>
 */
class Rule0013 implements RuleInterface
{
    private RulesTranslate $rulesTranslate;

    private AuthorizationCheckerInterface $authorizationChecker;

    private CoordenadorService $coordenadorService;

    /**
     * Rule0012 constructor.
     */
    public function __construct(
        RulesTranslate $rulesTranslate,
        AuthorizationCheckerInterface $authorizationChecker,
        CoordenadorService $coordenadorService
    ) {
        $this->rulesTranslate = $rulesTranslate;
        $this->authorizationChecker = $authorizationChecker;
        $this->coordenadorService = $coordenadorService;
    }

    public function supports(): array
    {
        return [
            SetorEntity::class => [
                'beforeDelete',
                'skipWhenCommand',
            ],
        ];
    }

    /**
     * @param RestDtoInterface|SetorDTO|null   $restDto
     * @param EntityInterface|SetorEntity|null $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) { //super admin
            return true;
        }

        if (!$entity->getParent()) {
            $this->rulesTranslate->throwException('setor', '0013');
        }

        if (!$this->coordenadorService->verificaUsuarioCoordenadorUnidade([$entity->getUnidade()]) &&
            !$this->coordenadorService
                ->verificaUsuarioCoordenadorOrgaoCentral([$entity->getUnidade()->getModalidadeOrgaoCentral()])
        ) {
            $this->rulesTranslate->throwException('setor', '0014');
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
