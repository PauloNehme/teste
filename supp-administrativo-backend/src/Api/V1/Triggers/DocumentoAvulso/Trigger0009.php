<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Triggers/DocumentoAvulso/Trigger0009.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Api\V1\Triggers\DocumentoAvulso;

use DateInterval;
use DateTime;
use Exception;
use SuppCore\AdministrativoBackend\Api\V1\DTO\DocumentoAvulso;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Tarefa;
use SuppCore\AdministrativoBackend\Api\V1\Resource\EspecieTarefaResource;
use SuppCore\AdministrativoBackend\Api\V1\Resource\TarefaResource;
use SuppCore\AdministrativoBackend\DTO\RestDtoInterface;
use SuppCore\AdministrativoBackend\Entity\DocumentoAvulso as DocumentoAvulsoEntity;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Repository\SetorRepository;
use SuppCore\AdministrativoBackend\Triggers\TriggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class Trigger0009.
 *
 * @descSwagger=Se tem protocolo da unidade, então cria tarefa DISTRIBUIR COMPLEMENTAÇÃO DE RESPOSTA DE COMUNICAÇÃO
 * @classeSwagger=Trigger0009
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Trigger0009 implements TriggerInterface
{
    private SetorRepository $setorRepository;

    private TarefaResource $tarefaResource;

    private EspecieTarefaResource $especieTarefaResource;

    /**
     * Trigger0009 constructor.
     */
    public function __construct(
        SetorRepository $setorRepository,
        TarefaResource $tarefaResource,
        EspecieTarefaResource $especieTarefaResource,
        private ParameterBagInterface $parameterBag
    ) {
        $this->setorRepository = $setorRepository;
        $this->tarefaResource = $tarefaResource;
        $this->especieTarefaResource = $especieTarefaResource;
    }

    public function supports(): array
    {
        return [
            DocumentoAvulso::class => [
                'beforeResponder',
            ],
        ];
    }

    /**
     * @param DocumentoAvulso|RestDtoInterface|null $restDto
     * @param DocumentoAvulsoEntity|EntityInterface $entity
     *
     * @throws Exception
     */
    public function execute(?RestDtoInterface $restDto, EntityInterface $entity, string $transactionId): void
    {
        //TAREFA PARA COMPLEMENTAÇÃO DE RESPOSTA JÁ É CRIADA NA TRIGGER0005, CRIANDO DUAS TAREFAS DE COMPLEMENTAÇÃO
        return;

        if ($entity->getDataHoraResposta()) {
            //VERIFICA SE TEM PROTOCOLO NA UNIDADE
            $inExisteUnidadeSetorProtocolo
                = $this->setorRepository->findProtocoloInUnidade($entity->getSetorResponsavel()->getUnidade()->getId());

            if ($inExisteUnidadeSetorProtocolo) {
                //CRIA A TAREFA DE DISTRIBUIR COMPLEMENTAÇÃO DE RESPOSTA DE COMUNICACAÇÃO
                $inicioPrazo = new DateTime();
                $finalPrazo = new DateTime();
                $finalPrazo->add(new DateInterval('P5D'));
                $especieTarefa = $this->especieTarefaResource->findOneBy(
                    [
                        'nome' => $this->parameterBag->get('constantes.entidades.especie_tarefa.const_2'),
                    ]
                );

                $setorResponsavel = $restDto->getSetorResponsavel();
                $usuarioResponsavel = $restDto->getUsuarioResponsavel();

                $tarefaDTO = new Tarefa();
                $tarefaDTO->setProcesso($entity->getProcesso());
                $tarefaDTO->setEspecieTarefa($especieTarefa);
                $tarefaDTO->setSetorResponsavel($setorResponsavel);
                $tarefaDTO->setUsuarioResponsavel($usuarioResponsavel);
                $tarefaDTO->setDataHoraInicioPrazo($inicioPrazo);
                $tarefaDTO->setDataHoraFinalPrazo($finalPrazo);

                $this->tarefaResource->create($tarefaDTO, $transactionId);
            }
        }
    }

    public function getOrder(): int
    {
        return 9;
    }
}
