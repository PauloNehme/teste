<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Rules/DocumentoAvulso/Rule0001.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Rules\DocumentoAvulso;

use SuppCore\AdministrativoBackend\Api\V1\DTO\DocumentoAvulso;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Repository\DocumentoAvulsoRepository;
use SuppCore\AdministrativoBackend\Repository\VinculacaoPessoaUsuarioRepository;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class Rule0001.
 *
 * @descSwagger  =Verifica se o usuário possui permissão na unidade vinculada
 * @classeSwagger=Rule0001
 *
 * @author       Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0001 implements RuleInterface
{
    private RulesTranslate $rulesTranslate;

    private DocumentoAvulsoRepository $documentoAvulsoRepository;

    private TokenStorageInterface $tokenStorage;

    private AuthorizationCheckerInterface $authorizationChecker;

    private VinculacaoPessoaUsuarioRepository $vinculacaoPessoaUsuarioRepository;

    /**
     * Rule0001 constructor.
     */
    public function __construct(
        RulesTranslate $rulesTranslate,
        DocumentoAvulsoRepository $documentoAvulsoRepository,
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker,
        VinculacaoPessoaUsuarioRepository $vinculacaoPessoaUsuarioRepository
    ) {
        $this->rulesTranslate = $rulesTranslate;
        $this->documentoAvulsoRepository = $documentoAvulsoRepository;
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
        $this->vinculacaoPessoaUsuarioRepository = $vinculacaoPessoaUsuarioRepository;
    }

    public function supports(): array
    {
        return [
            DocumentoAvulso::class => [
                'beforeResponder',
                'skipWhenCommand',
            ],
        ];
    }

    /**
     * @param DocumentoAvulso|RestDtoInterface|null                                  $restDto
     * @param \SuppCore\AdministrativoBackend\Entity\DocumentoAvulso|EntityInterface $entity
     *
     * @throws RuleException
     */
    public function validate(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): bool
    {
        if ((false === $this->authorizationChecker->isGranted('ROLE_COLABORADOR'))) {
            $vinculacaoUsuario = $this->vinculacaoPessoaUsuarioRepository
                ->findOneBy(
                    [
                        'usuarioVinculado' => $this->tokenStorage->getToken()->getUser(),
                        'pessoa' => $entity->getPessoaDestino(),
                    ]
                );

            if (!$vinculacaoUsuario) {
                $this->rulesTranslate->throwException('documentoAvulso', '0001');
            }
        }

        return true;
    }

    public function getOrder(): int
    {
        return 1;
    }
}
