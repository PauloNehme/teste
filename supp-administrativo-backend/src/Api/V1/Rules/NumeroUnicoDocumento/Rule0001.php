<?php

declare(strict_types=1);

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\NumeroUnicoDocumento;

use SuppCore\AdministrativoBackend\Api\V1\DTO\NumeroUnicoDocumento as NumeroUnicoDocumentoDTO;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Entity\NumeroUnicoDocumento as NumeroUnicoDocumentoEntity;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use SuppCore\AdministrativoBackend\Utils\CoordenadorService;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0001.
 *
 * @descSwagger=Verifica se o usuário tem permissão para criar ou editar o NumeroUnicoDocumento
 * @classeSwagger=Rule0001
 *
 * @author Felipe Pena <felipe.pena@datainfo.inf.br>
 */
class Rule0001 implements RuleInterface
{
    private RulesTranslate $rulesTranslate;

    private TokenStorageInterface $tokenStorage;

    private AuthorizationCheckerInterface $authorizationChecker;

    private CoordenadorService $coordenadorService;

    /**
     * Rule0001 constructor.
     */
    public function __construct(
        RulesTranslate $rulesTranslate,
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker,
        CoordenadorService $coordenadorService
    ) {
        $this->rulesTranslate = $rulesTranslate;
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
        $this->coordenadorService = $coordenadorService;
    }

    public function supports(): array
    {
        return [
            NumeroUnicoDocumentoDTO::class => [
                'beforeCreate',
                'beforeUpdate',
                'beforePatch',
                'skipWhenCommand',
            ],
        ];
    }

    /**
     * @param NumeroUnicoDocumentoDTO|RestDtoInterface|null $restDto
     * @param NumeroUnicoDocumentoEntity|EntityInterface    $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) { //super admin
            return true;
        }

        /*
         * Se a flag de numeracaoDocumentoUnidade for falso, quem gerencia são coordenadores de setor.
         */
        if (!$restDto->getSetor()->getUnidade()->getNumeracaoDocumentoUnidade() &&
            !$this->coordenadorService->verificaUsuarioCoordenadorSetor([$restDto->getSetor()])
        ) {
            $this->rulesTranslate->throwException('numeroUnicoDocumento', '0001a');
        }

        /*
         * Caso seja verdadeiro, quem gerencia são os coordenadores de unidade.
         */
        if ($restDto->getSetor()->getUnidade()->getNumeracaoDocumentoUnidade() &&
            !$this->coordenadorService->verificaUsuarioCoordenadorUnidade([$restDto->getSetor()->getUnidade()]) &&
            !$this->coordenadorService
                ->verificaUsuarioCoordenadorOrgaoCentral(
                    [$restDto->getSetor()->getUnidade()->getModalidadeOrgaoCentral()]
                )
        ) {
            $this->rulesTranslate->throwException('numeroUnicoDocumento', '0001b');
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
