<?php
#PROD
declare(strict_types=1);
/**
 * /src/DataFixtures/ORM/Prod/LoadClassificacaoData.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\DataFixtures\ORM\Ref;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use SuppCore\AdministrativoBackend\Entity\Classificacao;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadClassificacaoData.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoadClassificacaoData extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface, FixtureGroupInterface
{
    private ContainerInterface $container;

    private ObjectManager $manager;

    /**
     * Setter for container.
     *
     * @param ContainerInterface|null $container
     */
    public function setContainer(?ContainerInterface $container = null): void
    {
        if (null !== $container) {
            $this->container = $container;
        }
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws Exception
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager): void
    {
        $this->manager = $manager;

        $classificacao = new Classificacao();
        $classificacao->setNome('ADMINISTRAÇÃO GERAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('000');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA CLASSE CONTEMPLA DOCUMENTOS REFERENTES ÀS ATIVIDADES RELACIONADAS À ADMINISTRAÇÃO INTERNA DO ÓRGÃO E ENTIDADE, QUE VIABILIZAM O SEU FUNCIONAMENTO E O ALCANCE DOS OBJETIVOS PARA OS QUAIS FORAM CRIADOS.');
        $this->addReference('000', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELAÇÃO INTERINSTITUCIONAL (FORMALIZAÇÃO, EXECUÇÃO E ACOMPANHAMENTO DAS RELAÇÕES ENTRE O ÓRGÃO E ENTIDADE E OUTROS ÓRGÃOS E ENTIDADES, FIRMADAS POR MEIO DE ACORDOS, CONTRATOS, CONVÊNIOS, TERMOS E OUTROS ATOS DE AJUSTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('001');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(20);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(20);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('DEVE ABRANGER, AO MESMO TEMPO, A EXECUÇÃO DE VÁRIAS ATIVIDADES, BEM COMO AQUELES REFERENTES À FISCALIZAÇÃO, PRESTAÇÃO E TOMADA DE CONTAS, RELATÓRIOS TÉCNICOS E TERMOS DE ADITAMENTO. QUANTO AOS ACORDOS, CONTRATOS, CONVÊNIOS, TERMOS E OUTROS ATOS DE AJUSTES, REFERENTES A UMA ÚNICA ATIVIDADE, CLASSIFICAR NO CÓDIGO ESPECÍFICO. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 20 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('001', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ATENDIMENTO AO CIDADÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('002');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS SOLICITAÇÕES DE INFORMAÇÕES E ÀS COMUNICAÇÕES ENVIADAS AO ÓRGÃO E ENTIDADE PELOS CANAIS DE ATENDIMENTO AO CIDADÃO, TAIS COMO: SERVIÇO DE INFORMAÇÕES AO CIDADÃO (SIC), OUVIDORIA E OUTROS CANAIS DE COMUNICAÇÃO.');
        $this->addReference('002', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE O ACESSO À INFORMAÇÃO PÚBLICA EXECUTADO PELOS CANAIS DE ATENDIMENTO AO CIDADÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('002.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('002.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ACESSO À INFORMAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('002.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PEDIDOS DE ACESSO À INFORMAÇÃO E AOS DOCUMENTOS INSTITUCIONAIS, ENCAMINHADOS AO SIC, BEM COMO OS RECURSOS IMPETRADOS EM RAZÃO DE NEGATIVA DE ACESSO.
        QUANTO AOS ELOGIOS E RECLAMAÇÕES RECEBIDOS PELAS OUVIDORIAS E POR OUTROS CANAIS DE COMUNICAÇÃO, CLASSIFICAR NO CÓDIGO 002.2.
        QUANTO ÀS COMUNICAÇÕES EVENTUAIS TROCADAS ENTRE O ÓRGÃO E ENTIDADE E DEMAIS INSTITUIÇÕES, CLASSIFICAR NO CÓDIGO 991.');
        $this->addReference('002.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PEDIDO DE ACESSO À INFORMAÇÃO E RECURSO (SOLICITAÇÕES, RESPOSTAS E RECURSOS REFERENTES AOS PEDIDOS DE ACESSO À INFORMAÇÃO, PRESENCIAIS E NÃO PRESENCIAIS, REALIZADOS POR INTERMÉDIO DO SIC)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('002.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO ACESSO E AO CONTROLE DAS CONSULTAS AOS DOCUMENTOS ARQUIVÍSTICOS, BIBLIOGRÁFICOS E MUSEOLÓGICOS, CLASSIFICAR NO CÓDIGO 063.1. AGUARDAR O RESULTADO DO PROVIMENTO DO RECURSO EM ÚLTIMA INSTÂNCIA, NO CASO DE INDEFERIMENTO DO PEDIDO DE ACESSO. CONDICIONAL "ATÉ O TÉRMINO DO ATENDIMENTO" CONVENCIONADO COMO 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO SUFICIENTE PARA ATENDIMENTO AO PEDIDO DE ACESSO À INFORMAÇÃO E RECURSO.');
        $this->addReference('002.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ACOMPANHAMENTO DO ATENDIMENTO AO CIDADÃO (ACOMPANHAMENTO DAS ATIVIDADES DESEMPENHADAS PELO SIC, TAIS COMO: RELATÓRIOS ESTATÍSTICOS, DE ATENDIMENTO, DE CONTROLE DE CONSULTAS E DE PERFIL DO USUÁRIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('002.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ESTEJAM RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('002.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE SATISFAÇÃO DO USUÁRIO (PESQUISA DE SATISFAÇÃO DOS USUÁRIOS DOS SERVIÇOS PÚBLICOS, TAIS COMO: ELOGIOS E RECLAMAÇÕES RECEBIDOS PELAS OUVIDORIAS E OUTROS CANAIS DE COMUNICAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('002.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS PEDIDOS DE ACESSO À INFORMAÇÃO E AOS DOCUMENTOS INSTITUCIONAIS, ENCAMINHADOS AO SIC, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 002.1. QUANTO ÀS COMUNICAÇÕES EVENTUAIS TROCADAS ENTRE O ÓRGÃO E ENTIDADE E DEMAIS INSTITUIÇÕES, CLASSIFICAR NO CÓDIGO 991.');
        $this->addReference('002.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE E FISCALIZAÇÃO DA GESTÃO PÚBLICA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('003');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ESTEJAM RECAPITULADAS OU CONSOLIDADAS EM OUTROS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS AÇÕES DE INSPEÇÃO, CORREIÇÃO, AUDITAGEM E CONTROLE INTERNO A CARGO DO GESTOR, REALIZADAS PARA VERIFICAÇÃO DOS PROCEDIMENTOS INTERNOS DO ÓRGÃO E ENTIDADE COM O OBJETIVO DE MELHORAR A GESTÃO PÚBLICA.');
        $this->addReference('003', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE AS AÇÕES DE INSPEÇÃO, CORREIÇÃO, AUDITAGEM E CONTROLE INTERNO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('003.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO AO CONTROLE EXTERNO E À AUDITORIA EXTERNA, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 054. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('003.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE INTERNO. AUDITORIA INTERNA (AVALIAÇÃO DAS AÇÕES EXECUTADAS PELO ÓRGÃO E ENTIDADE, DA LEGALIDADE DOS PROCEDIMENTOS E DA ATUAÇÃO DO GESTOR PÚBLICO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('003.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('003.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AÇÃO PREVENTIVA (AÇÕES IMPLEMENTADAS POR ORIENTAÇÃO DOS ÓRGÃOS FISCALIZADORES PARA PREVENÇÃO DA CORRUPÇÃO NO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('003.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('003.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CORREIÇÃO (FISCALIZAÇÃO E APURAÇÃO DE RESPONSABILIDADES REALIZADA PELOS ÓRGÃOS FISCALIZADORES EM CASO DE IRREGULARIDADES COMETIDAS NO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('003.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('003.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ASSESSORAMENTO JURÍDICO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('004');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ANÁLISE JURÍDICA DE INSTRUMENTOS E DE ATOS NORMATIVOS E AO ACOMPANHAMENTO DE AÇÕES JUDICIAIS.');
        $this->addReference('004', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ORIENTAÇÃO TÉCNICA E NORMATIVA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('004.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ANÁLISE JURÍDICA DE INSTRUMENTOS E DE ATOS NORMATIVOS ELABORADOS PELO ÓRGÃO E ENTIDADE.');
        $this->addReference('004.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('UNIFORMIZAÇÃO DO ENTENDIMENTO JURÍDICO (ANÁLISE E FIXAÇÃO DE INTERPRETAÇÃO DA CONSTITUIÇÃO, LEIS, TRATADOS E DEMAIS ATOS NORMATIVOS, A SEREM SEGUIDOS, DE MODO UNIFORME, PELO ÓRGÃO E ENTIDADE, QUANDO NÃO HOUVER ORIENTAÇÃO NORMATIVA SUPERIOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('004.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('004.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ANÁLISE DOS INSTRUMENTOS ADMINISTRATIVOS (EXAME E À ANÁLISE PRÉVIA OU CONCLUSIVA DE TEXTOS DE EDITAIS DE LICITAÇÃO, DE CONTRATOS E DE INSTRUMENTOS CONGÊNERES A SEREM PUBLICADOS E CELEBRADOS PELO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('004.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ O TÉRMINO DA ANÁLISE" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA FINALIZAÇÃO DA ANÁLISE DOS INSTRUMENTOS ADMINISTRATIVOS SUBMETIDOS.');
        $this->addReference('004.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ATUAÇÃO EM CONTENCIOSO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('004.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ATUAÇÃO CONTENCIOSA JUDICIAL E ADMINISTRATIVA, NAS HIPÓTESES DE CONTESTAÇÃO, CONFLITO OU LITÍGIO, EXERCIDA PELA ASSESSORIA OU CONSULTORIA JURÍDICA DO ÓRGÃO E ENTIDADE.');
        $this->addReference('004.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REPRESENTAÇÃO EXTRAJUDICIAL (SOLUÇÃO EXTRAJUDICIAL DOS LITÍGIOS, VISANDO À COMPOSIÇÃO ENTRE AS PARTES EM CONFLITO DE INTERESSES, POR MEIO DE MEDIAÇÃO, CONCILIAÇÃO, ARBITRAGEM E DEMAIS TÉCNICAS DE COMPOSIÇÃO E ADMINISTRAÇÃO DE CONFLITOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('004.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A SOLUÇÃO DO LITÍGIO" CONVENCIONADO PARA 5 ANOS, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A SOLUÇÃO DO LITÍGIO.');
        $this->addReference('004.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REPRESENTAÇÃO JUDICIAL (AÇÕES DEFENDIDAS PELA ASSESSORIA OU CONSULTORIA JURÍDICA EM PROCESSOS ADMINIST. E JUDICIAIS, PERANTE TODAS AS INSTÂNCIAS, ORDINÁRIAS OU EXTRAORDINÁRIAS, PARA PROPICIAR A EFETIVA DEFESA DOS INTERESSES DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('004.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ O TRÂNSITO EM JULGADO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA O TRÂNSITO EM JULGADO DE PROCESSO JUDICIAL CORRESPONDENTE À REPRESENTAÇÃO JUDICIAL.');
        $this->addReference('004.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARTICIPAÇÃO EM ÓRGÃOS COLEGIADOS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('005');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ORGANIZAÇÃO E AO FUNCIONAMENTO DE COMISSÕES, CONSELHOS, COMITÊS, JUNTAS E GRUPOS DE TRABALHO, CRIADOS PELO PRÓPRIO ÓRGÃO E ENTIDADE OU POR OUTROS ÓRGÃOS DE DELIBERAÇÃO COLETIVA, QUE CONTEM COM A PARTICIPAÇÃO DE SERVIDORES DA INSTITUIÇÃO. QUANTO À ATUAÇÃO DE COMISSÕES, CONSELHOS, COMITÊS, JUNTAS E GRUPOS DE TRABALHO REFERENTES A UMA ATIVIDADE EM PARTICULAR, CLASSIFICAR NO CÓDIGO ESPECÍFICO.');
        $this->addReference('005', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CRIAÇÃO E ATUAÇÃO (IMPLANTAÇÃO DOS ÓRGÃOS COLEGIADOS E AOS REGISTROS DAS DELIBERAÇÕES DEFINIDAS NAS REUNIÕES, TAIS COMO: ATO DE INSTITUIÇÃO, REGRAS PARA ATUAÇÃO, DESIGNAÇÃO E SUBSTITUIÇÃO DE MEMBROS, RESOLUÇÕES, ATAS E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('005.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('005.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERACIONALIZAÇÃO DE REUNIÕES (ORGANIZAÇÃO DAS REUNIÕES DOS ÓRGÃOS COLEGIADOS, BEM COMO AQUELES REFERENTES AO AGENDAMENTO, CONVOCAÇÃO, PAUTA E LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('005.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('005.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ORGANIZAÇÃO E FUNCIONAMENTO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('010');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA SUBCLASSE CONTEMPLA DOCUMENTOS REFERENTES À DEFINIÇÃO E ALTERAÇÃO DAS POLÍTICAS INSTITUCIONAIS, À CRIAÇÃO E MODIFICAÇÃO DAS ESTRUTURAS ORGANIZACIONAIS E AOS REGISTROS QUE GARANTAM A EXISTÊNCIA DO ÓRGÃO E ENTIDADE COMO PESSOA JURÍDICA E A SUA ATUAÇÃO NO MEIO PÚBLICO, PRIVADO, COM O TERCEIRO SETOR E COM O CIDADÃO, BEM COMO AQUELES REFERENTES AO PLANEJAMENTO E ACOMPANHAMENTO DAS AÇÕES INSTITUCIONAIS, DA GESTÃO AMBIENTAL E DA COMUNICAÇÃO SOCIAL.');
        $this->addReference('010', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A ORGANIZAÇÃO E FUNCIONAMENTO DO ÓRGÃO E ENTIDADE, BEM COMO OS BOLETINS ADMINISTRATIVOS E DE SERVIÇO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('010.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO AOS BOLETINS DE PESSOAL, CLASSIFICAR NO CÓDIGO 020.01. QUANTO À PUBLICAÇÃO DE MATÉRIAS EM DIÁRIOS OFICIAIS E EM PERIÓDICOS DE GRANDE CIRCULAÇÃO, CLASSIFICAR NO CÓDIGO 069.3. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('010.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ORGANIZAÇÃO ADMINISTRATIVA (ESTUDOS PARA DEFINIÇÃO DA ESTRUTURA E DAS ATRIBUIÇÕES, MUDANÇAS ESTRATÉGICAS E ESTRUTURAIS, REFORMAS ADMINISTRATIVAS OU DE PROCESSOS DE MODERNIZAÇÃO, COM IMPACTO NA FORMA DE FUSÃO, PRIVATIZAÇÃO, REESTATIZAÇÃO OU EXTINÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('011');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(20);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS ESTUDOS PRELIMINARES OU AS VERSÕES NÃO IMPLEMENTADAS DAS MUDANÇAS ESTRUTURAIS CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 20 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('011', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('HABILITAÇÃO JURÍDICA E REGULARIZAÇÃO FISCAL (INSCRIÇÃO, BAIXA E CANCELAMENTO NOS ÓRGÃOS COMPETENTES, TAIS COMO: CADASTRO BANCÁRIO, REGISTROS DE INSCRIÇÃO NO CNPJ, NO SISBACEN, NO SPC, NO CADIN');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('012');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('012', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COORDENAÇÃO E GESTÃO DE REUNIÕES');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('013');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS RELATIVOS ÀS ATIVIDADES NECESSÁRIAS PARA A REALIZAÇÃO DE ASSEMBLEIAS, AUDIÊNCIAS, DESPACHOS E REUNIÕES, GERAIS E SETORIAIS, DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES AO REGISTRO DE SUAS DELIBERAÇÕES. QUANTO AOS DOCUMENTOS DE ASSEMBLEIAS, AUDIÊNCIAS, DESPACHOS E REUNIÕES PRODUZIDOS PELAS DIFERENTES COMISSÕES INSTITUÍDAS NO ÂMBITO DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO ESPECÍFICO.');
        $this->addReference('013', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERACIONALIZAÇÃO (ORGANIZAÇÃO DAS REUNIÕES DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES AO AGENDAMENTO, CONVOCAÇÃO, PAUTA E LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('013.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('013.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REGISTRO DE DELIBERAÇÕES (REGISTROS DAS DELIBERAÇÕES E TOMADAS DE DECISÃO DEFINIDAS NAS ASSEMBLEIAS, AUDIÊNCIAS, DESPACHOS E REUNIÕES, TAIS COMO: RESOLUÇÕES, ATAS E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('013.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('013.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PREENCHIMENTO DE FUNÇÃO DE DIREÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('014');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCESSOS ELETIVOS PARA PREENCHIMENTO DE FUNÇÃO DE DIREÇÃO PREVISTA EM LEGISLAÇÃO COMPETENTE À ÁREA DE ATUAÇÃO DO ÓRGÃO E ENTIDADE.');
        $this->addReference('014', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NOMEAÇÃO E ATUAÇÃO DA COMISSÃO ELEITORAL (CONSTITUIÇÃO E ATIVIDADES DA COMISSÃO ELEITORAL, DAS MESAS DE VOTAÇÃO E DOS FISCAIS, INDICAÇÃO DOS MEMBROS, REGIMENTO ELEITORAL, CONVOCAÇÃO, PAUTA, LISTA DE PARTICIPANTES E REGISTROS E ATAS DAS REUNIÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('014.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À CONSTITUIÇÃO E ÀS ATIVIDADES DA COMISSÃO ELEITORAL, DAS MESAS DE VOTAÇÃO E DOS FISCAIS, TAIS COMO: INDICAÇÃO DOS MEMBROS, REGIMENTO ELEITORAL, CONVOCAÇÃO, PAUTA, LISTA DE PARTICIPANTES E REGISTROS E ATAS DAS REUNIÕES. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('014.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSCRIÇÃO (DEFINIÇÃO DO CALEND. ELEITORAL, À INSCRIÇÃO DE CANDIDATOS E DIVULG. DAS ATIVID. ELETIVAS E DOS CANDIDATOS, TAIS COMO: CRONOGRAMA, CÓPIA DE DOC. PESSOAIS DOS INTEGRANTES DAS CHAPAS CONCORRENTES, PROPAG. ELEITORAL E PEDIDOS DE IMPUG.)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('014.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('014.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VOTAÇÃO (APURAÇÃO DO PROCESSO ELETIVO, TAIS COMO: RELAÇÃO DE ELEITORES HABILITADOS, CÉDULAS DE VOTAÇÃO E CONTAGEM DE VOTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('014.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS DA HOMOLOGAÇÃO DO EVENTO, AS CÉDULAS DE VOTAÇÃO. INCLUEM-SE DOCUMENTOS REFERENTES À APURAÇÃO DO PROCESSO ELETIVO, TAIS COMO: RELAÇÃO DE ELEITORES HABILITADOS, CÉDULAS DE VOTAÇÃO E CONTAGEM DE VOTOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('014.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DIVULGAÇÃO DOS RESULTADOS E INTERPOSIÇÃO DE RECURSOS (RESULTADOS FINAIS DA ELEIÇÃO REALIZADA E À DIVULGAÇÃO DOS CANDIDATOS ELEITOS, BEM COMO AQUELES REFERENTES AOS RECURSOS IMPETRADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('014.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('AGUARDAR O TÉRMINO DA AÇÃO, NO CASO DE INTERPOSIÇÃO DE RECURSOS. ELIMINAR, APÓS 2 ANOS DA HOMOLOGAÇÃO DO EVENTO, OS DOCUMENTOS DE RECURSOS INDEFERIDOS. INCLUEM-SE DOCUMENTOS REFERENTES AOS RESULTADOS FINAIS DA ELEIÇÃO REALIZADA E À DIVULGAÇÃO DOS CANDIDATOS ELEITOS, BEM COMO AQUELES REFERENTES AOS RECURSOS IMPETRADOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('014.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO INSTITUCIONAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('015');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO PLANEJAMENTO, AO ACOMPANHAMENTO E À AVALIAÇÃO DAS ATIVIDADES DO ÓRGÃO E ENTIDADE.');
        $this->addReference('015', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO INSTITUCIONAL (PLANEJAMENTO, AÇÕES E PROGRAMAS E PROJETOS DE TRABALHO, PLANEJAMENTO PLURIANUAL, PLANEJAMENTO ESTRATÉGICO, PLANO DE DESENVOLVIMENTO INSTITUCIONAL, PLANO DE METAS E DEFINIÇÃO DE INDICADORES DE DESEMPENHO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('015.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO PLANEJAMENTO, ÀS AÇÕES E AOS PROGRAMAS E PROJETOS DE TRABALHO DO ÓRGÃO E ENTIDADE, TAIS COMO: PLANEJAMENTO PLURIANUAL, PLANEJAMENTO ESTRATÉGICO, PLANO DE DESENVOLVIMENTO INSTITUCIONAL, PLANO DE METAS E DEFINIÇÃO DE INDICADORES DE DESEMPENHO.');
        $this->addReference('015.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ACOMPANHAMENTO DAS ATIVIDADES (REGISTROS DAS ATIVIDADES DESEMPENHADAS PELO ÓRGÃO E ENTIDADE, RELATÓRIOS PARCIAIS, RELATÓRIO ANUAL E RELATÓRIO DE GESTÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('015.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AOS REGISTROS DAS ATIVIDADES DESEMPENHADAS PELO ÓRGÃO E ENTIDADE, TAIS COMO: RELATÓRIOS PARCIAIS (MENSAL, TRIMESTRAL OU SEMESTRAL), RELATÓRIO ANUAL E RELATÓRIO DE GESTÃO. ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('015.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO DA GESTÃO INSTITUCIONAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('015.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ESTEJAM RECAPITULADAS OU CONSOLIDADAS EM OUTROS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS AÇÕES DE AUTOAVALIAÇÃO, PARA VERIFICAÇÃO DO DESEMPENHO DO ÓRGÃO E ENTIDADE, VISANDO O CONTROLE DA QUALIDADE E A MELHORIA NA PRESTAÇÃO DO SERVIÇO PÚBLICO.');
        $this->addReference('015.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ELABORAÇÃO DOS INSTRUMENTOS DE AVALIAÇÃO (PLANEJAMENTO DAS ATIVIDADES DE AVALIAÇÃO E AOS PROGRAMAS E PROJETOS DE IMPLEMENTAÇÃO DO CONTROLE DA QUALIDADE DA GESTÃO, DEFINIÇÃO DE INDICADORES E DE INSTRUMENTOS PARA AVALIAÇÃO, DIAGNÓSTICOS E CRONOGRAMAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('015.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO PLANEJAMENTO DAS ATIVIDADES DE AVALIAÇÃO E AOS PROGRAMAS E PROJETOS DE IMPLEMENTAÇÃO DO CONTROLE DA QUALIDADE DA GESTÃO DO ÓRGÃO E ENTIDADE, TAIS COMO: DEFINIÇÃO DE INDICADORES E DE INSTRUMENTOS PARA AVALIAÇÃO DOS ASPECTOS GERENCIAIS, DIAGNÓSTICOS E CRONOGRAMAS.');
        $this->addReference('015.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO E ACOMPANHAMENTO (IMPLEMENTAÇÃO DAS ATIVIDADES DE AVALIAÇÃO E CONTROLE DA QUALIDADE DA GESTÃO INSTITUCIONAL, ANÁLISE CRÍTICA E VERIFICAÇÃO DA COMPATIBILIDADE ENTRE O PLANEJAMENTO E OS RESULTADOS OBTIDOS NA APURAÇÃO DAS METAS INSTITUCIONAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('015.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À IMPLEMENTAÇÃO DAS ATIVIDADES DE AVALIAÇÃO E CONTROLE DA QUALIDADE DA GESTÃO INSTITUCIONAL, BEM COMO AQUELES REFERENTES À ANÁLISE CRÍTICA E À VERIFICAÇÃO DA COMPATIBILIDADE ENTRE O PLANEJAMENTO E OS RESULTADOS OBTIDOS NA APURAÇÃO DAS METAS INSTITUCIONAIS.');
        $this->addReference('015.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CERTIFICAÇÃO DA CONFORMIDADE (CERTIFICAÇÃO DA CONFORMIDADE, ÀS PROPOSTAS DE AÇÕES CORRETIVAS E PREVENTIVAS E AO TRATAMENTO DA NÃO CONFORMIDADE, BEM COMO RELATÓRIOS ESTATÍSTICOS, DEMONSTRATIVOS DE RESULTADOS, CERTIFICADOS E PREMIAÇÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('015.33');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À CERTIFICAÇÃO DA CONFORMIDADE, ÀS PROPOSTAS DE AÇÕES CORRETIVAS E PREVENTIVAS E AO TRATAMENTO DA NÃO CONFORMIDADE, BEM COMO RELATÓRIOS ESTATÍSTICOS, DEMONSTRATIVOS DE RESULTADOS, CERTIFICADOS E PREMIAÇÕES.');
        $this->addReference('015.33', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE PROCESSOS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('016');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS ETAPAS QUE ENVOLVEM PLANEJAMENTO, ANÁLISE, MAPEAMENTO, DESENHO E MODELAGEM DE PROCESSOS INSTITUCIONAIS E AO GERENCIAMENTO DE DESEMPENHO.');
        $this->addReference('016', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO DO MAPEAMENTO DE PROCESSOS (PLANEJAMENTO DO MAPEAMENTO DE PROCESSOS INSTITUCIONAIS, TAIS COMO: IDENTIFICAÇÃO DE OBJETIVOS E DE FERRAMENTAS A SEREM UTILIZADAS E CRONOGRAMA DE ATIVIDADES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('016.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('016.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO E ACOMPANHAMENTO (DESENVOLVIMENTO DO MAPEAMENTO DE PROCESSOS INSTITUCIONAIS E À COLETA DE DADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('016.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('016.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RESULTADO (RESULTADOS DO MAPEAMENTO DE PROCESSOS INSTITUCIONAIS, TAIS COMO: DIAGNÓSTICOS, FLUXOGRAMAS E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('016.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('016.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MODELAGEM DE PROCESSOS (DEFINIÇÃO DE ESPECIFICAÇÕES PARA A MODELAGEM DE PROCESSOS NOVOS OU MODIFICADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('016.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('016.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GERENCIAMENTO DE DESEMPENHO (MEDIÇÃO E MONITORAMENTO DE PROCESSOS E PROPOSTAS DE AÇÕES CORRETIVAS OU PREVENTIVAS, TAIS COMO: QUESTIONÁRIOS, AVALIAÇÕES, PROPOSTAS, ANÁLISES E LAUDOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('016.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('016.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO AMBIENTAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('017');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À GESTÃO AMBIENTAL, VISANDO À UTILIZAÇÃO RACIONAL E SUSTENTÁVEL DOS RECURSOS NATURAIS, ENVOLVENDO O USO DE PRÁTICAS E O DESENVOLVIMENTO DE HÁBITOS QUE GARANTAM A PROTEÇÃO, CONSERVAÇÃO E PRESERVAÇÃO DA BIODIVERSIDADE, A RECICLAGEM DAS MATÉRIAS-PRIMAS E A REDUÇÃO DO IMPACTO AMBIENTAL.');
        $this->addReference('017', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROTEÇÃO AMBIENTAL INTERNA (CAMPANHAS DE CONSCIENTIZAÇÃO PARA REDUÇÃO DO CONSUMO DE ÁGUA E ENERGIA ELÉTRICA E PROGRAMAS DE COLETA SELETIVA SOLIDÁRIA E RECICLAGEM DE RESÍDUOS DESCARTÁVEIS, BEM COMO A PRODUÇÃO DE MATERIAL DE DIVULGAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('017.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('ARQUIVAR UM EXEMPLAR DO MATERIAL DE DIVULGAÇÃO PRODUZIDO. INCLUEM-SE PROCEDIMENTOS DE CONTROLE E PRESERVAÇÃO DO AMBIENTE DE TRABALHO QUE ENVOLVE A CONSCIENTIZAÇÃO DOS SERVIDORES. QUANTO AO CONTROLE DE RISCOS AMBIENTAIS, CLASSIFICAR NO CÓDIGO 025.21. QUANTO AO RECOLHIMENTO DE MATERIAL INSERVÍVEL E DE SUCATAS AO DEPÓSITO, CLASSIFICAR NO CÓDIGO 032.3. CONDICIONAL "ENQUANTO VIGORA O EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA DE EVENTO.');
        $this->addReference('017.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROTEÇÃO AMBIENTAL EXTERNA (PROJETOS, QUESTIONÁRIOS, AVALIAÇÕES, ANÁLISES, LAUDOS, RELATÓRIOS ESTATÍSTICOS E DE DESTINAÇÃO DE RESÍDUOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('017.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('PROCEDIMENTOS DE CONTROLE E PRESERVAÇÃO AMBIENTAL EXTERNA QUE ENVOLVE A COLETA SELETIVA SOLIDÁRIA, A RECICLAGEM DE RESÍDUOS DESCARTÁVEIS E O USO DE FONTES NÃO POLUENTES. QUANTO À ALIENAÇÃO DEFINITIVA, POR DESFAZIMENTO, DE MATERIAL PERMANENTE E DE CONSUMO EM RAZÃO DE SEREM CONSIDERADOS INSERVÍVEIS E IRRECUPERÁVEIS, CLASSIFICAR NOS CÓDIGOS 033.41 E 033.42, RESPECTIVAMENTE. ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('017.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('018');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('A CONTRATAÇÃO PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA E INEXIGIBILIDADE. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('018', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À ORGANIZAÇÃO E FUNCIONAMENTO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('019');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE ORGANIZAÇÃO E FUNCIONAMENTO NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('019', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMUNICAÇÃO SOCIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS ATIVIDADES DE COMUNICAÇÃO SOCIAL NOS ÂMBITOS EXTERNO (COMUNICAÇÃO EXTERNA) E INTERNO (COMUNICAÇÃO INTERNA), COMPREENDENDO A ESCOLHA E OS USOS DE MÍDIAS EMPREGADAS.');
        $this->addReference('019.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMUNICAÇÃO EXTERNA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO CREDENCIAMENTO DE JORNALISTAS, ENTREVISTAS, NOTICIÁRIOS, REPORTAGENS E EDITORIAIS. QUANTO AO ASSESSORAMENTO DE CERIMONIAL PARA A REALIZAÇÃO DE SOLENIDADES OFICIAIS E EVENTOS DO ÓRGÃO E ENTIDADE, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 910.');
        $this->addReference('019.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CREDENCIAMENTO DE JORNALISTAS (CREDENCIAMENTO DE JORNALISTAS, TAIS COMO: NORMAS DE CREDENCIAMENTO, FORMULÁRIOS E CREDENCIAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.111');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('019.111', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELAÇÃO COM A IMPRENSA (RELEASES PARA PUBLICAÇÃO, MENSAGENS, ENTREVISTAS, NOTICIÁRIOS, REPORTAGENS E EDITORIAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.112');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À RELEASES PARA PUBLICAÇÃO, MENSAGENS, ENTREVISTAS, NOTICIÁRIOS, REPORTAGENS E EDITORIAIS. ARQUIVAR OS DOCUMENTOS CUJAS INFORMAÇÕES REFLITAM A POLÍTICA DO ÓRGÃO OU ENTIDADE.');
        $this->addReference('019.112', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ELABORAÇÃO DE CAMPANHAS PUBLICITÁRIAS (CAMPANHAS INSTITUCIONAIS, FILMES, PROPAGANDAS E À PRODUÇÃO DE MATERIAL DE DIVULGAÇÃO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.113');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(10);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('019.113', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMUNICAÇÃO INTERNA (CLIPAGEM DE NOTÍCIAS VEICULADAS EM JORNAIS, EM REVISTAS E EM SITES DE COMUNICAÇÃO E DIVULGAÇÃO DE AVISOS, COMUNICADOS, BOLETINS E INFORMATIVOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('ARQUIVAR OS DOCUMENTOS CUJAS INFORMAÇÕES REFLITAM A POLÍTICA DO ÓRGÃO OU ENTIDADE. INCLUEM-SE DOCUMENTOS REFERENTES À DIVULGAÇÃO PARA O PÚBLICO INTERNO DE NOTÍCIAS PUBLICADAS QUE ENVOLVEM O ÓRGÃO E ENTIDADE OU SOBRE ASSUNTOS AFINS À SUA MISSÃO.');
        $this->addReference('019.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AÇÃO DE RESPONSABILIDADE SOCIAL (PARTICIPAÇÃO EM AÇÕES DE INCENTIVO AO ESPORTE, À CULTURA E À EDUCAÇÃO, COM POSSIBILIDADE DE DEDUÇÃO DE IMPOSTO DE RENDA, CONFORME ESPECIFICADO EM LEGISLAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('019.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(9);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À REALIZAÇÃO DE AÇÕES DE CONCESSÃO DE PATROCÍNIO A PROJETOS ESPORTIVOS E CULTURAIS, CLASSIFICAR NO CÓDIGO ESPECÍFICO. ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('019.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE PESSOAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('020');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA SUBCLASSE CONTEMPLA DOCUMENTOS REFERENTES AOS DIREITOS E OBRIGAÇÕES DOS SERVIDORES E EMPREGADOS PÚBLICOS, DOS SERVIDORES TEMPORÁRIOS, DOS RESIDENTES (AQUELES INSCRITOS NAS RESIDÊNCIAS MÉDICA, MULTIPROFISSIONAL EM SAÚDE, PEDAGÓGICA E JURÍDICA, ENTRE OUTRAS), DOS ESTAGIÁRIOS, DOS OCUPANTES DE CARGO COMISSIONADO E DE FUNÇÃO DE CONFIANÇA SEM VÍNCULO, LOTADOS NO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES AOS DIREITOS E OBRIGAÇÕES DO EMPREGADOR.');
        $this->addReference('020', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DE PESSOAS DO ÓRGÃO E ENTIDADE, BEM COMO OS BOLETINS DE PESSOAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO AOS BOLETINS ADMINISTRATIVOS E DE SERVIÇO, CLASSIFICAR NO CÓDIGO 010.01. QUANTO À PUBLICAÇÃO DE MATÉRIAS EM DIÁRIOS OFICIAIS E EM PERIÓDICOS DE GRANDE CIRCULAÇÃO, CLASSIFICAR NO CÓDIGO 069.3. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('020.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IMPLEMENTAÇÃO DAS POLÍTICAS DE PESSOAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.02');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO PLANEJAMENTO, DESENVOLVIMENTO E IMPLANTAÇÃO DAS POLÍTICAS DE PESSOAL.');
        $this->addReference('020.02', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO DA FORÇA DE TRABALHO. PREVISÃO DE PESSOAL (LEVANTAMENTO DAS HABILIDADES E ESPECIFICAÇÕES PARA O EXERCÍCIO DAS FUNÇÕES E ATIVIDADES ROTINEIRAS E EVENTUAIS, VISANDO SUBSIDIAR A PREVISÃO DE PESSOAL, DEFININDO QUALIFICAÇÃO E QUANTITATIVO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.021');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('020.021', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CRIAÇÃO, EXTINÇÃO, CLASSIFICAÇÃO, TRANSFORMAÇÃO E TRANSPOSIÇÃO DE CARGOS E DE CARREIRAS (CRIAÇÃO, TRANSFORMAÇÃO E REESTRUTURAÇÃO DE CARGOS, CARREIRAS E REMUNERAÇÃO DOS SERVIDORES DA ADMINISTRAÇÃO PÚBLICA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.022');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À REESTRUTURAÇÃO E ALTERAÇÃO SALARIAL, CLASSIFICAR NO CÓDIGO 023.12.');
        $this->addReference('020.022', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELACIONAMENTO COM ENTIDADES REPRESENTATIVAS DE CLASSES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.03');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS NEGOCIAÇÕES QUE ENVOLVEM SERVIDORES, SINDICATOS E EMPREGADOS, BEM COMO AQUELES REFERENTES AO RELACIONAMENTO DO ÓRGÃO E ENTIDADE COM OS CONSELHOS PROFISSIONAIS.');
        $this->addReference('020.03', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELAÇÃO COM SINDICATOS (ACORDOS, CONVENÇÕES E DISSÍDIOS COLETIVOS ESTABELECIDOS NAS NEGOCIAÇÕES QUE ENVOLVEM SERVIDORES, SINDICATOS E EMPREGADORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.031');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À CONTRIBUIÇÃO SINDICAL, ASSISTENCIAL E CONFEDERATIVA DO SERVIDOR, CLASSIFICAR NO CÓDIGO 023.171. QUANTO À CONTRIBUIÇÃO SINDICAL DO EMPREGADOR, CLASSIFICAR NO CÓDIGO 023.183.');
        $this->addReference('020.031', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOVIMENTOS REIVINDICATÓRIOS. GREVES. PARALISAÇÕES (NOTIFICAÇÃO DA GREVE, POR PARTE DOS GREVISTAS, AO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES AOS ACORDOS E RESPECTIVAS COMPENSAÇÕES POR PARTE DOS SERVIDORES SOBRE O DESCONTO DOS DIAS PARADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.032');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('020.032', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELAÇÃO COM CONSELHOS PROFISSIONAIS (RELACIONAMENTO COM OS CONSELHOS PROFISSIONAIS, TAIS COMO: FISCALIZAÇÃO DO ÓRGÃO E ENTIDADE PELOS CONSELHOS PROFISSIONAIS E COMPROVANTES DE PAGAMENTO DA ANUIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.033');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('020.033', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ASSENTAMENTO FUNCIONAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À VIDA FUNCIONAL DOS SERVIDORES E EMPREGADOS PÚBLICOS, DOS SERVIDORES TEMPORÁRIOS, DOS RESIDENTES (AQUELES INSCRITOS NAS RESIDÊNCIAS MÉDICA, MULTIPROFISSIONAL EM SAÚDE, PEDAGÓGICA E JURÍDICA, ENTRE OUTRAS), DOS ESTAGIÁRIOS, DOS OCUPANTES DE CARGO COMISSIONADO E DE FUNÇÃO DE CONFIANÇA SEM VÍNCULO, BEM COMO OS REGISTROS E AS ANOTAÇÕES DOS ATOS DA ADMINISTRAÇÃO PÚBLICA A QUE TIVERAM DIREITO OU LHE FORAM IMPOSTOS COMO DEVERES.');
        $this->addReference('020.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIDORES E EMPREGADOS PÚBLICOS (VIDA FUNCIONAL DOS SERVIDORES ESTATUTÁRIOS ATIVOS E INATIVOS E DOS EMPREGADOS PÚBLICOS QUE SÃO CONTRATADOS E SUBMETIDOS AO REGIME DA LEGISLAÇÃO TRABALHISTA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(48);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(52);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO O SERVIDOR MANTIVER O VÍNCULO COM A ADMINISTRAÇÃO PÚBLICA" CONVENCIONADO PARA 52 ANOS NO CORRENTE, SENDO O TEMPO MÉDIO DE PERMANÊNCIA DO SERVIDOR. "TRANSFERIR OS DOCUMENTOS PARA FASE INTERMEDIÁRIA APÓS O TÉRMINO DO VÍNCULO, SENDO O PRAZO TOTAL DE GUARDA DOS DOCUMENTOS DE 100 ANOS" CONVENCIONADO PARA 48 ANOS NO INTERMEDIÁRIO.');
        $this->addReference('020.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIDORES TEMPORÁRIOS (VIDA FUNCIONAL DOS SERVIDORES QUE SÃO CONTRATADOS POR TEMPO DETERMINADO, EM CARÁTER EXCEPCIONAL PARA ATENDER UMA EVENTUAL NECESSIDADE DE INTERESSE PÚBLICO, SEM QUE ESTEJAM VINCULADOS A CARGO OU EMPREGO PÚBLICOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(48);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(52);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONTRATAÇÃO DE PESSOAS FÍSICAS (AUTÔNOMOS E COLABORADORES), CLASSIFICAR NO CÓDIGO 029.5 CONDICIONAL "ENQUANTO O SERVIDOR MANTIVER O VÍNCULO COM A ADMINISTRAÇÃO PÚBLICA" CONVENCIONADO PARA 52 ANOS NO CORRENTE, SENDO O TEMPO MÉDIO DE PERMANÊNCIA DO SERVIDOR. "TRANSFERIR OS DOCUMENTOS PARA FASE INTERMEDIÁRIA APÓS O TÉRMINO DO VÍNCULO, SENDO O PRAZO TOTAL DE GUARDA DOS DOCUMENTOS DE 100 ANOS" CONVENCIONADO PARA 48 ANOS NO INTERMEDIÁRIO.');
        $this->addReference('020.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RESIDENTES E ESTAGIÁRIOS (VIDA FUNCIONAL DOS RESIDENTES E DOS ESTAGIÁRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(48);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(52);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO O SERVIDOR MANTIVER O VÍNCULO COM A ADMINISTRAÇÃO PÚBLICA" CONVENCIONADO PARA 52 ANOS NO CORRENTE, SENDO O TEMPO MÉDIO DE PERMANÊNCIA DO SERVIDOR. "TRANSFERIR OS DOCUMENTOS PARA FASE INTERMEDIÁRIA APÓS O TÉRMINO DO VÍNCULO, SENDO O PRAZO TOTAL DE GUARDA DOS DOCUMENTOS DE 100 ANOS" CONVENCIONADO PARA 48 ANOS NO INTERMEDIÁRIO.');
        $this->addReference('020.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OCUPANTES DE CARGO COMISSIONADO E DE FUNÇÃO DE CONFIANÇA (VIDA FUNCIONAL DOS OCUPANTES DE CARGO COMISSIONADO E DE FUNÇÃO DE CONFIANÇA SEM VÍNCULO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.14');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(48);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(52);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO O SERVIDOR MANTIVER O VÍNCULO COM A ADMINISTRAÇÃO PÚBLICA" CONVENCIONADO PARA 52 ANOS NO CORRENTE, SENDO O TEMPO MÉDIO DE PERMANÊNCIA DO SERVIDOR. "TRANSFERIR OS DOCUMENTOS PARA FASE INTERMEDIÁRIA APÓS O TÉRMINO DO VÍNCULO, SENDO O PRAZO TOTAL DE GUARDA DOS DOCUMENTOS DE 100 ANOS" CONVENCIONADO PARA 48 ANOS NO INTERMEDIÁRIO.');
        $this->addReference('020.14', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IDENTIFICAÇÃO FUNCIONAL (REQUISIÇÃO E AO CONTROLE DE ENTREGA DE DOCUMENTOS DE IDENTIFICAÇÃO FUNCIONAL TAIS COMO: CARTEIRA, CARTÃO, IDENTIDADE, CRACHÁ, CREDENCIAL, PASSAPORTE DE SERVIÇO OU DIPLOMÁTICO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('020.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(48);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(52);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO O SERVIDOR MANTIVER O VÍNCULO COM A ADMINISTRAÇÃO PÚBLICA" CONVENCIONADO PARA 52 ANOS NO CORRENTE, SENDO O TEMPO MÉDIO DE PERMANÊNCIA DO SERVIDOR. "TRANSFERIR OS DOCUMENTOS PARA FASE INTERMEDIÁRIA APÓS O TÉRMINO DO VÍNCULO, SENDO O PRAZO TOTAL DE GUARDA DOS DOCUMENTOS DE 100 ANOS" CONVENCIONADO PARA 48 ANOS NO INTERMEDIÁRIO.');
        $this->addReference('020.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECRUTAMENTO E SELEÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('021');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS DESENVOLVIDOS PARA A REALIZAÇÃO DE CONCURSOS PÚBLICOS PARA O PROVIMENTO DE CARGOS PÚBLICOS, EMPREGOS PÚBLICOS E CONTRATAÇÃO POR TEMPO DETERMINADO.');
        $this->addReference('021', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO DO PROCESSO SELETIVO (INCLUEM-SE ESTUDOS, PROPOSTAS, CONSTITUIÇÃO DE BANCAS EXAMINADORAS, PROGRAMAS, EDITAIS, EXEMPLARES ÚNICOS DE PROVAS, GABARITOS E CRITÉRIOS PARA CORREÇÃO DE PROVAS E PARA SOLICITAÇÃO DE RECURSOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('021.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE ESTUDOS, PROPOSTAS, CONSTITUIÇÃO DE BANCAS EXAMINADORAS, PROGRAMAS, EDITAIS, EXEMPLARES ÚNICOS DE PROVAS, GABARITOS E CRITÉRIOS PARA CORREÇÃO DE PROVAS E PARA SOLICITAÇÃO DE RECURSOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('021.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSCRIÇÃO (INCLUEM-SE DOCUMENTOS EXIGIDOS NO EDITAL PARA A HOMOLOGAÇÃO DA INSCRIÇÃO E FICHAS DE INSCRIÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('021.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('AGUARDAR O TÉRMINO DA AÇÃO, NO CASO DE INTERPOSIÇÃO DE RECURSOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('021.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE APLICAÇÃO DE PROVAS (CONTROLE DE APLICAÇÃO DAS PROVAS, DE ACORDO COM OS REQUISITOS ESTIPULADOS NO EDITAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('021.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('AGUARDAR O TÉRMINO DA AÇÃO, NO CASO DE INTERPOSIÇÃO DE RECURSOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('021.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CORREÇÃO DE PROVAS. AVALIAÇÃO (INCLUEM-SE CADERNOS DE PROVA UTILIZADOS PELOS CANDIDATOS, FOLHAS DE RESPOSTA, PROVAS DE TÍTULOS, AVALIAÇÃO PSICOLÓGICA, TESTES PSICOTÉCNICOS, EXAMES MÉDICOS E DE APTIDÃO FÍSICA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('021.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('AGUARDAR O TÉRMINO DA AÇÃO, NO CASO DE INTERPOSIÇÃO DE RECURSOS. QUANTO ÀS PROVAS DE TÍTULOS, AVALIAÇÃO PSICOLÓGICA, TESTES PSICOTÉCNICOS, EXAMES MÉDICOS E DE APTIDÃO FÍSICA DOS CANDIDATOS QUE VIEREM A SER NOMEADOS, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('021.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DIVULGAÇÃO DOS RESULTADOS E INTERPOSIÇÃO DE RECURSOS (RESULTADOS FINAIS DAS PROVAS REALIZADAS, A CLASSIFICAÇÃO E A RECLASSIFICAÇÃO DOS CANDIDATOS, BEM COMO AQUELES REFERENTES AOS RECURSOS IMPETRADOS EM QUALQUER UMA DAS FASES DO CONCURSO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('021.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('AGUARDAR O TÉRMINO DA AÇÃO, NO CASO DE INTERPOSIÇÃO DE RECURSOS. ELIMINAR, APÓS 2 ANOS DA HOMOLOGAÇÃO DO EVENTO, OS DOCUMENTOS DE RECURSOS INDEFERIDOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('021.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROVIMENTO, MOVIMENTAÇÃO E VACÂNCIA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('022');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS QUE EFETIVAM AS AÇÕES E AS FORMAS DE INGRESSO, MOVIMENTAÇÃO E DESLIGAMENTO NA ADMINISTRAÇÃO PÚBLICA, BEM COMO AQUELES REFERENTES ÀS AVALIAÇÕES DE DESEMPENHO DOS SERVIDORES. QUANTO AOS ATOS ESPECÍFICOS E INDIVIDUAIS QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('022', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROVIMENTO DE CARGO PÚBLICO (PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE ADMISSÃO, CONTRATAÇÃO, NOMEAÇÃO, DESIGNAÇÃO, POSSE, DISPONIBILIDADE, APROVEITAMENTO, READMISSÃO, READAPTAÇÃO, RECONDUÇÃO, REINTEGRAÇÃO, REVERSÃO E PROMOÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE ADMISSÃO, CONTRATAÇÃO, NOMEAÇÃO, DESIGNAÇÃO, POSSE, DISPONIBILIDADE, APROVEITAMENTO, READMISSÃO, READAPTAÇÃO, RECONDUÇÃO, REINTEGRAÇÃO, REVERSÃO E PROMOÇÃO.');
        $this->addReference('022.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOVIMENTAÇÃO DE PESSOAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE LOTAÇÃO, EXERCÍCIO, PERMUTA, CESSÃO E REQUISIÇÃO.');
        $this->addReference('022.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LOTAÇÃO, EXERCÍCIO E PERMUTA (PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE LOTAÇÃO, EXERCÍCIO E PERMUTA, BEM COMO AQUELES REFERENTES À TRANSFERÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CESSÃO. REQUISIÇÃO (PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE CESSÃO E REQUISIÇÃO PARA A REALIZAÇÃO DE SERVIÇOS TEMPORÁRIOS EM OUTRO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REMOÇÃO (PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE REMOÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REDISTRIBUIÇÃO (PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE REDISTRIBUIÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SUBSTITUIÇÃO (PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE SUBSTITUIÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO DE DESEMPENHO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO CUMPRIMENTO DO ESTÁGIO OBRIGATÓRIO PELO SERVIDOR PÚBLICO, À HOMOLOGAÇÃO DE SUA ESTABILIDADE E AO PERÍODO DE EXPERIÊNCIA A SER CUMPRIDO PELOS CONTRATADOS, BEM COMO AQUELES REFERENTES ÀS PROMOÇÕES E PROGRESSÕES FUNCIONAIS.');
        $this->addReference('022.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CUMPRIMENTO DE ESTÁGIO PROBATÓRIO. HOMOLOGAÇÃO DA ESTABILIDADE (CUMPRIMENTO E À AVALIAÇÃO DO ESTÁGIO PROBATÓRIO E À HOMOLOGAÇÃO DA ESTABILIDADE DO SERVIDOR PÚBLICO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.61');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.61', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CUMPRIMENTO DE PERÍODO DE EXPERIÊNCIA (PERÍODO DE EXPERIÊNCIA A SER CUMPRIDO PELOS CONTRATADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.62');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('022.62', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO E PROGRESSÃO FUNCIONAL (AVALIAÇÕES DE DESEMPENHO PARA PROMOÇÃO E PROGRESSÃO FUNCIONAL DOS SERVIDORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.63');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À REESTRUTURAÇÃO E ALTERAÇÃO SALARIAL DECORRENTES DE PROMOÇÃO E PROGRESSÃO FUNCIONAL, CLASSIFICAR NO CÓDIGO 023.12.');
        $this->addReference('022.63', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VACÂNCIA (DEMISSÃO, DISPENSA, EXONERAÇÃO, RESCISÃO CONTRATUAL, AVISO PRÉVIO, POSSE EM OUTRO CARGO NÃO ACUMULÁVEL, PROMOÇÃO, READAPTAÇÃO, APOSENTADORIA E FALECIMENTO, BEM COMO AQUELES REFERENTES À ADESÃO AOS PLANOS DE DEMISSÃO VOLUNTÁRIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('022.7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE DEMISSÃO, DISPENSA, EXONERAÇÃO, RESCISÃO CONTRATUAL, AVISO PRÉVIO, POSSE EM OUTRO CARGO NÃO ACUMULÁVEL, PROMOÇÃO, READAPTAÇÃO, APOSENTADORIA E FALECIMENTO, BEM COMO AQUELES REFERENTES À ADESÃO AOS PLANOS DE DEMISSÃO VOLUNTÁRIA.');
        $this->addReference('022.7', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCESSÃO DE DIREITOS E VANTAGENS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('023');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À PERCEPÇÃO DE PAGAMENTO DE VENCIMENTOS, REMUNERAÇÕES, SALÁRIOS E PROVENTOS E AO GOZO DE FÉRIAS, LICENÇAS, AFASTAMENTOS, CONCESSÕES, AUXÍLIOS E REEMBOLSO DE DESPESAS, BEM COMO AQUELES REFERENTES AOS DESCONTOS, OBRIGAÇÕES TRABALHISTAS E ESTATUTÁRIAS, ENCARGOS PATRONAIS E RECOLHIMENTOS.');
        $this->addReference('023', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PAGAMENTO DE VENCIMENTOS. REMUNERAÇÕES. SALÁRIOS. PROVENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS QUE EFETIVAM AS AÇÕES DE PERCEPÇÃO DE PAGAMENTO.');
        $this->addReference('023.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FOLHAS DE PAGAMENTO (INCLUEM-SE FOLHAS DE PAGAMENTO, FICHAS FINANCEIRAS E RELAÇÃO DE PAGAMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REESTRUTURAÇÃO E ALTERAÇÃO SALARIAL (DECORRENTES DE PROMOÇÃO E PROGRESSÃO FUNCIONAL, ENQUADRAMENTO, EQUIPARAÇÃO, REAJUSTE, REPOSIÇÃO, REDUÇÃO DE JORNADA DE TRABALHO, REMUNERAÇÃO PROPORCIONAL, REGIME DE TRABALHO INTEGRAL E DEDICAÇÃO EXCLUSIVA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CRIAÇÃO, TRANSFORMAÇÃO E REESTRUTURAÇÃO DE CARGOS, CARREIRAS E REMUNERAÇÃO, CLASSIFICAR NO CÓDIGO 020.022. QUANTO ÀS AVALIAÇÕES DE DESEMPENHO PARA PROMOÇÃO E PROGRESSÃO FUNCIONAL, CLASSIFICAR NO CÓDIGO 022.63.');
        $this->addReference('023.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ABONO PROVISÓRIO (COMPROVAÇÃO DO DIREITO, À SOLICITAÇÃO E AO PAGAMENTO DE ACRÉSCIMO FINANCEIRO PROVISÓRIO NA REMUNERAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ABONO DE PERMANÊNCIA EM SERVIÇO (REEMBOLSO DA CONTRIBUIÇÃO PREVIDENCIÁRIA AO SERVIDOR PÚBLICO, QUE CUMPRIU OS REQUISITOS PARA APOSENTADORIA, MAS QUE OPTOU POR CONTINUAR NA ATIVA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.14');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(20);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO REEMBOLSO DA CONTRIBUIÇÃO PREVIDENCIÁRIA AO SERVIDOR PÚBLICO, QUE CUMPRIU OS REQUISITOS PARA APOSENTADORIA, MAS QUE OPTOU POR CONTINUAR NA ATIVA. QUANTO À CONTAGEM E AVERBAÇÃO DE TEMPO DE SERVIÇO, CLASSIFICAR NO CÓDIGO 026.02. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DA APOSENTADORIA" CONVENCIONADO PARA 20 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE PERMANÊNCIA NA ATIVA ATÉ A APOSENTADORIA SER HOMOLOGADA.');
        $this->addReference('023.14', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GRATIFICAÇÕES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.15');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE OS DOCUMENTOS REFERENTES À SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, INCORPORAÇÃO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DAS GRATIFICAÇÕES CONCEDIDAS.');
        $this->addReference('023.15', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FUNÇÃO (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, INCORPORAÇÃO DE QUINTOS E DÉCIMOS, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DA GRATIFICAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.151');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.151', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('JETONS (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, INCORPORAÇÃO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DA GRATIFICAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.152');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.152', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CARGOS EM COMISSÃO (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, INCORPORAÇÃO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DA GRATIFICAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.153');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.153', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NATALINA. DÉCIMO TERCEIRO SALÁRIO (PAGAMENTO E ADIANTAMENTO DA GRATIFICAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.154');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.154', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESEMPENHO (GRATIFICAÇÕES POR DESEMPENHO DE ATIVIDADE, QUALIFICAÇÃO E PRODUTIVIDADE, BEM COMO AQUELES REFERENTES À SOLICITAÇÃO DE INCLUSÃO E AO CANCELAMENTO DO PAGAMENTO DA GRATIFICAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.155');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.155', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ENCARGO DE CURSO E CONCURSO (SOLICITAÇÃO E PAGAMENTO DA GRATIFICAÇÃO POR ENCARGO DE CURSO MINISTRADO, BEM COMO AQUELES REFERENTES À PARTICIPAÇÃO EM BANCAS EXAMINADORAS E DE FISCALIZAÇÃO E APLICAÇÃO DE PROVAS EM CONCURSOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.156');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À SOLICITAÇÃO E PAGAMENTO DA GRATIFICAÇÃO POR ENCARGO DE CURSO MINISTRADO, BEM COMO AQUELES REFERENTES À PARTICIPAÇÃO EM BANCAS EXAMINADORAS E DE FISCALIZAÇÃO E APLICAÇÃO DE PROVAS EM CONCURSOS.');
        $this->addReference('023.156', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TITULAÇÃO (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, INCORPORAÇÃO E PAGAMENTO DA RETRIBUIÇÃO POR TITULAÇÃO, OBTIDA PELA CONCLUSÃO DE CURSOS DE ESPECIALIZAÇÃO, MESTRADO E DOUTORADO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.157');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.157', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADICIONAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.16');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DOS ADICIONAIS CONCEDIDOS.');
        $this->addReference('023.16', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TEMPO DE SERVIÇO (ACRÉSCIMO FINANCEIRO SOBRE A REMUNERAÇÃO EM RAZÃO DO CUMPRIMENTO DE CADA ANO DE SERVIÇO PÚBLICO EFETIVO, TAIS COMO: ANUÊNIOS, BIÊNIOS E QUINQUÊNIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.161');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.161', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NOTURNO (ACRÉSCIMO FINANCEIRO NA REMUNERAÇÃO EM RAZÃO DE TRABALHO NOTURNO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.162');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.162', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PERICULOSIDADE (ACRÉSCIMO FINANCEIRO NA REMUNERAÇÃO EM RAZÃO DO TRABALHO SER EXECUTADO EM CONDIÇÕES PERIGOSAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.163');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.163', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSALUBRIDADE (ACRÉSCIMO FINANCEIRO NA REMUNERAÇÃO EM RAZÃO DO TRABALHO SER EXECUTADO EM AMBIENTE EXPOSTO A AGENTES FÍSICOS, QUÍMICOS OU BIOLÓGICOS QUE SEJAM NOCIVOS À SAÚDE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.164');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.164', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ATIVIDADE PENOSA (ACRÉSCIMO FINANCEIRO NA REMUNERAÇÃO EM RAZÃO DO TRABALHO DEBILITAR GRADATIVAMENTE A SAÚDE FÍSICA E MENTAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.165');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.165', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO EXTRAORDINÁRIO. HORAS EXTRAS (ACRÉSCIMO FINANCEIRO NA REMUNERAÇÃO EM RAZÃO DO TRABALHO SER EXECUTADO ALÉM DO NÚMERO DE HORAS ESTIPULADAS NA JORNADA DE TRABALHO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.166');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.166', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('UM TERÇO DE FÉRIAS. ABONO PECUNIÁRIO (ACRÉSCIMO FINANCEIRO NA REMUNERAÇÃO DE UM TERÇO DO SEU VALOR NO MÊS DE FÉRIAS, BEM COMO AQUELES REFERENTES À CONVERSÃO DE UM TERÇO DOS DIAS DE FÉRIAS EM PECÚNIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.167');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO AFASTAMENTO PARA GOZO DE FÉRIAS, CLASSIFICAR NO CÓDIGO 023.2.');
        $this->addReference('023.167', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESCONTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.17');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS DESCONTOS QUE INCIDEM NA REMUNERAÇÃO DO SERVIDOR.');
        $this->addReference('023.17', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRIBUIÇÃO SINDICAL, ASSISTENCIAL E CONFEDERATIVA (AUTORIZAÇÃO PARA DESCONTO, CONFEDERATIVA E RETRIBUTIVA, TAXA ASSISTENCIAL E MENSALIDADE SINDICAL, BEM COMO AQUELES REFERENTES À SOLICITAÇÃO DE CANCELAMENTO DO DESCONTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.171');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À AUTORIZAÇÃO PARA DESCONTO INCIDENTE SOBRE A REMUNERAÇÃO EM RAZÃO DE CONTRIBUIÇÃO SINDICAL, CONFEDERATIVA E RETRIBUTIVA, TAXA ASSISTENCIAL E MENSALIDADE SINDICAL, BEM COMO AQUELES REFERENTES À SOLICITAÇÃO DE CANCELAMENTO DO DESCONTO. QUANTO À RELAÇÃO COM SINDICATOS, CLASSIFICAR NO CÓDIGO 020.031. QUANTO À CONTRIBUIÇÃO SINDICAL DO EMPREGADOR, CLASSIFICAR NO CÓDIGO 023.183.');
        $this->addReference('023.171', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRIBUIÇÃO PARA O PLANO DE SEGURIDADE SOCIAL (DESCONTO INCIDENTE SOBRE A REMUNERAÇÃO EM RAZÃO DA CONTRIBUIÇÃO PARA O PLANO DE SEGURIDADE SOCIAL, BEM COMO AQUELES REFERENTES AO REPASSE DO VALOR AO ÓRGÃO COMPETENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.172');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO DESCONTO INCIDENTE SOBRE A REMUNERAÇÃO EM RAZÃO DA CONTRIBUIÇÃO PARA O PLANO DE SEGURIDADE SOCIAL, BEM COMO AQUELES REFERENTES AO REPASSE DO VALOR AO ÓRGÃO COMPETENTE. QUANTO À CONTRIBUIÇÃO PARA O PLANO DE SEGURIDADE SOCIAL RECOLHIDA PELO EMPREGADOR, CLASSIFICAR NO CÓDIGO 023.184.');
        $this->addReference('023.172', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IMPOSTO DE RENDA RETIDO NA FONTE (IRRF) (DESCONTO DO IMPOSTO DE RENDA RETIDO NA FONTE, BEM COMO AQUELES REFERENTES À SOLICITAÇÃO DE ISENÇÃO DE PAGAMENTO, POR PARTE DO SERVIDOR PORTADOR DE DOENÇA ESPECÍFICA OU APOSENTADO POR INVALIDEZ PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.173');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO DESCONTO DO IMPOSTO DE RENDA RETIDO NA FONTE, BEM COMO AQUELES REFERENTES À SOLICITAÇÃO DE ISENÇÃO DE PAGAMENTO, POR PARTE DO SERVIDOR PORTADOR DE DOENÇA ESPECÍFICA OU APOSENTADO POR INVALIDEZ PERMANENTE. QUANTO AO IMPOSTO DE RENDA RECOLHIDO PELA FONTE PAGADORA, CLASSIFICAR NO CÓDIGO 023.185.');
        $this->addReference('023.173', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PENSÃO ALIMENTÍCIA (AUTORIZAÇÃO PARA DESCONTO INCIDENTE SOBRE A REMUNERAÇÃO EM RAZÃO DO PAGAMENTO DE PENSÃO ALIMENTÍCIA, BEM COMO AQUELES REFERENTES À SOLICITAÇÃO DE CANCELAMENTO DO DESCONTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.174');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.174', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSIGNAÇÕES FACULTATIVAS (DESCONTO DE PLANO DE SAÚDE, PREVIDÊNCIA COMPLEMENTAR, PRÊMIO RELATIVO A SEGURO DE VIDA, ASSOCIAÇÃO OU COOPERATIVA, EMPRÉSTIMO, FINANCIAMENTO IMOBILIÁRIO E DESPESA CONTRAÍDA E SAQUE REALIZADO POR MEIO DE CARTÃO DE CRÉDITO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.175');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(7);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('DESCONTO DE PLANO DE SAÚDE, PREVIDÊNCIA COMPLEMENTAR, PRÊMIO RELATIVO A SEGURO DE VIDA, ASSOCIAÇÃO OU COOPERATIVA, EMPRÉSTIMO, FINANCIAMENTO IMOBILIÁRIO E DESPESA CONTRAÍDA E SAQUE REALIZADO POR MEIO DE CARTÃO DE CRÉDITO, CANCELAMENTO DO DESCONTO E DEVOLUÇÃO DE DESCONTOS. CONDICIONAL "ENQUANTO VIGORA A CONSIGNAÇÃO" CONVENCIONADO PARA 30 ANOS NO CORRENTE, CONSIDERANDO QUE ESTE É O LIMITE MÁXIMO PARA CONSIGNAÇÕES FACULTATIVAS ESTABELECIDO PELO § 5º DO ART. 19 DA PORTARIA NORMATIVA Nº 1/2008.');
        $this->addReference('023.175', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OBRIGAÇÕES TRABALHISTAS E ESTATUTÁRIAS, ENCARGOS PATRONAIS E RECOLHIMENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.18');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS ENCARGOS PATRONAIS E RECOLHIMENTOS EFETUADOS PELO EMPREGADOR.');
        $this->addReference('023.18', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMA DE FORMAÇÃO DO PATRIMÔNIO DO SERVIDOR PÚBLICO (PASEP). PROGRAMA DE INTEGRAÇÃO SOCIAL (PIS) (CONTRIBUIÇÕES, COM O OBJETIVO DE FINANCIAR O PAGAMENTO DO SEGURO-DESEMPREGO, DO ABONO E DA PARTICIPAÇÃO NA RECEITA DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.181');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES ÀS CONTRIBUIÇÕES SOCIAIS, DE NATUREZA TRIBUTÁRIA, DEVIDAS PELO ÓRGÃO E ENTIDADE, COM O OBJETIVO DE FINANCIAR O PAGAMENTO DO SEGURO-DESEMPREGO, DO ABONO E DA PARTICIPAÇÃO NA RECEITA DO ÓRGÃO E ENTIDADE E QUE SÃO DESTINADOS AOS SERVIDORES.');
        $this->addReference('023.181', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FUNDO DE GARANTIA DO TEMPO DE SERVIÇO (FGTS) (DECLARAÇÃO DE OPÇÃO E À COMPROVAÇÃO DO DEPÓSITO DO VALOR DO FGTS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.182');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.182', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRIBUIÇÃO SINDICAL DO EMPREGADOR (PAGAMENTO DA CONTRIBUIÇÃO SINDICAL FEITA PELO EMPREGADOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.183');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À RELAÇÃO COM SINDICATOS, CLASSIFICAR NO CÓDIGO 020.031. QUANTO À CONTRIBUIÇÃO SINDICAL, ASSISTENCIAL E CONFEDERATIVA DO SERVIDOR, CLASSIFICAR NO CÓDIGO 023.171.');
        $this->addReference('023.183', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRIBUIÇÃO PARA O PLANO DE SEGURIDADE SOCIAL (CONTRIBUIÇÃO SOCIAL RECOLHIDA PELO EMPREGADOR PARA O REGIME PREVIDENCIÁRIO CORRESPONDENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.184');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONTRIBUIÇÃO PARA O PLANO DE SEGURIDADE SOCIAL DESCONTADA DA REMUNERAÇÃO DO SERVIDOR, CLASSIFICAR NO CÓDIGO 023.172.');
        $this->addReference('023.184', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IMPOSTO DE RENDA (RECOLHIMENTO, DE NATUREZA TRIBUTÁRIA, DO VALOR RETIDO DA RENDA DO BENEFICIÁRIO, QUE É EFETUADO PELA FONTE PAGADORA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.185');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO IMPOSTO DE RENDA DESCONTADO DA REMUNERAÇÃO DO SERVIDOR, CLASSIFICAR NO CÓDIGO 023.173.');
        $this->addReference('023.185', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LEI DOS DOIS TERÇOS. RELAÇÃO ANUAL DE INFORMAÇÕES SOCIAIS (RAIS) (CUMPRIMENTO DA LEI DOS 2/3 E ÀS DECLARAÇÕES DE RAIS, QUE SUBSIDIAM O CONTROLE DAS ATIVIDADES TRABALHISTAS NO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.186');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('023.186', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES AO PAGAMENTO DE VENCIMENTOS. REMUNERAÇÕES. SALÁRIOS. PROVENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.19');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NA SUBDIVISÃO DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE PAGAMENTO DE VENCIMENTOS, REMUNERAÇÕES, SALÁRIOS E PROVENTOS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('023.19', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RETIFICAÇÃO DE PAGAMENTO (PEDIDOS, FEITOS PELO SERVIDOR, PARA A RETIFICAÇÃO DE ERROS EFETUADOS NO PAGAMENTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.191');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS CASOS DE RESTITUIÇÃO DE VALORES AO ERÁRIO, CLASSIFICAR NO CÓDIGO 059.4.');
        $this->addReference('023.191', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FÉRIAS (CONCESSÃO DE FÉRIAS, TAIS COMO: PROGRAMAÇÃO, ALTERAÇÃO, CANCELAMENTO, SUSPENSÃO, ESCALA E AVISO DE FÉRIAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO PAGAMENTO DE ADICIONAL DE UM TERÇO DE FÉRIAS E ABONO PECUNIÁRIO, CLASSIFICAR NO CÓDIGO 023.167.');
        $this->addReference('023.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LICENÇAS (AFASTAMENTO DO CÔNJUGE, ATIVIDADE POLÍTICA, CAPACITAÇÃO, DESEMPENHO DE MANDATO CLASSISTA, DOENÇA EM PESSOA DA FAMÍLIA, INCENTIVADA SEM REMUNERAÇÃO, PRÊMIO POR ASSIDUIDADE, SERVIÇO MILITAR E TRATAMENTO DE INTERESSES PARTICULARES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('AFASTAMENTO DO CÔNJUGE, ATIVIDADE POLÍTICA, CAPACITAÇÃO, DESEMPENHO DE MANDATO CLASSISTA, DOENÇA EM PESSOA DA FAMÍLIA, INCENTIVADA SEM REMUNERAÇÃO, PRÊMIO POR ASSIDUIDADE, SERVIÇO MILITAR E TRATAMENTO DE INTERESSES PARTICULARES,  PERÍCIAS MÉDICAS REALIZADAS PARA CONCESSÃO E PRORROGAÇÃO DAS LICENÇAS. QUANTO ÀS LICENÇAS REFERENTES À CONCESSÃO DE BENEFÍCIOS DE SEGURIDADE E PREVIDÊNCIA SOCIAL (ACIDENTE EM SERVIÇO, TRATAMENTO DE SAÚDE, GESTANTE, PATERNIDADE E ADOTANTE), CLASSIFICAR NO CÓDIGO 026.4');
        $this->addReference('023.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AFASTAMENTOS (SUSPENSÃO DE CONTRATO E CONCESSÃO DE AFASTAMENTO PARA DEPOR, MANDATO ELETIVO, SERVIR A JUSTIÇA ELEITORAL, SERVIR COMO JURADO, PARTICIPAR EM PROGRAMAS DE PÓS-GRADUAÇÃO STRICTO SENSU E DE PÓS-DOUTORADO E EM ESTUDOS, NO PAÍS E NO EXTERIOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO AFASTAMENTO PARA O CUMPRIMENTO DE MISSÕES E VIAGENS A SERVIÇO, NO PAÍS E NO EXTERIOR, E PARA SERVIR EM ORGANISMO INTERNACIONAL DE QUE O BRASIL PARTICIPE OU COM O QUAL COOPERE, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 028.');
        $this->addReference('023.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCESSÕES (COMPROVAÇÃO DE AUSÊNCIA EM RAZÃO DE ALISTAMENTO ELEITORAL, CASAMENTO (GALA), DOAÇÃO DE SANGUE, FALECIMENTO DE FAMILIARES (NOJO), HORÁRIO ESPECIAL PARA SERVIDOR ESTUDANTE, PORTADOR DE DEFICIÊNCIA E DEPENDENTE PORTADOR DE DEFICIÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À COMPROVAÇÃO DE AUSÊNCIA NO SERVIÇO EM RAZÃO DE ALISTAMENTO ELEITORAL, CASAMENTO (GALA), DOAÇÃO DE SANGUE E FALECIMENTO DE FAMILIARES (NOJO), BEM COMO AQUELES REFERENTES À CONCESSÃO DE HORÁRIO ESPECIAL PARA SERVIDOR ESTUDANTE, SERVIDOR PORTADOR DE DEFICIÊNCIA E SERVIDOR QUE POSSUA DEPENDENTE PORTADOR DE DEFICIÊNCIA, COM OU SEM COMPENSAÇÃO DE HORAS. QUANTO À CONCESSÃO DE BENEFÍCIOS DE SEGURIDADE E PREVIDÊNCIA SOCIAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 026.');
        $this->addReference('023.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AUXÍLIOS (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DOS AUXÍLIOS ALIMENTAÇÃO OU REFEIÇÃO, ASSISTÊNCIA PRÉ-ESCOLAR OU CRECHE, MORADIA E VALE-TRANSPORTE, BEM COMO O AUXÍLIO-MORADIA PARA LIQUIDANTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS AUXÍLIOS REFERENTES À CONCESSÃO DE BENEFÍCIOS DE SEGURIDADE E PREVIDÊNCIA SOCIAL (ACIDENTE, DOENÇA, FUNERAL E NATALIDADE), CLASSIFICAR NO CÓDIGO 026.3. QUANTO AO AUXÍLIO-RECLUSÃO, CLASSIFICAR NO CÓDIGO 026.91. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('023.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REEMBOLSO DE DESPESAS. INDENIZAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO REEMBOLSO DE DESPESAS EFETUADAS EM RAZÃO DE MUDANÇA DE DOMICÍLIO, LOCOMOÇÃO COM MEIO DE TRANSPORTE PRÓPRIO E CUSTEIO DE ASSISTÊNCIA SUPLEMENTAR À SAÚDE.');
        $this->addReference('023.7', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MUDANÇA DE DOMICÍLIO (AJUDAS DE CUSTO PARA COMPENSAÇÃO E REEMBOLSO DAS DESPESAS DE INSTALAÇÃO DO SERVIDOR E DE SUA FAMÍLIA QUE, NO INTERESSE DO ÓRGÃO E ENTIDADE, PASSAR A TER EXERCÍCIO EM NOVA SEDE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.71');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('023.71', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LOCOMOÇÃO (DESPESAS EFETUADAS COM A UTILIZAÇÃO DE MEIO PRÓPRIO DE LOCOMOÇÃO PARA A EXECUÇÃO DE SERVIÇOS EXTERNOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.72');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO FORNECIMENTO DE TRANSPORTE, CLASSIFICAR NO CÓDIGO 023.93. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('023.72', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RESSARCIMENTO DE PLANO DE SAÚDE (PARTICIPAÇÃO DO ÓRGÃO E ENTIDADE NO CUSTEIO DA ASSISTÊNCIA SUPLEMENTAR À SAÚDE DO SERVIDOR E DEMAIS BENEFICIÁRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.73');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('023.73', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À CONCESSÃO DE DIREITOS E VANTAGENS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE CONCESSÃO DE DIREITOS E VANTAGENS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('023.9', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE SEGURO (CONTRATAÇÃO DE SEGURO DE VIDA EM GRUPO E SEGURO DE ACIDENTES PESSOAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.91');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONTRATAÇÃO DE SEGURO PATRIMONIAL, CLASSIFICAR NO CÓDIGO 045.01. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('023.91', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OCUPAÇÃO DE IMÓVEL FUNCIONAL (OCUPAÇÃO DE IMÓVEL FUNCIONAL, TAIS COMO: SOLICITAÇÃO, TERMO DE OCUPAÇÃO E DE RESPONSABILIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.92');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À OCUPAÇÃO DE IMÓVEL FUNCIONAL, TAIS COMO: SOLICITAÇÃO, TERMO DE OCUPAÇÃO E DE RESPONSABILIDADE. CONDICIONAL "ENQUANTO PERMANECE A OCUPAÇÃO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE OCUPAÇÃO.');
        $this->addReference('023.92', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FORNECIMENTO DE TRANSPORTE (COMPROVAÇÃO DO FORNECIMENTO DE SERVIÇO DE TRANSPORTE, OFERECIDO PELO ÓRGÃO E ENTIDADE, PARA QUE O SERVIDOR SE DESLOQUE DE SUA RESIDÊNCIA PARA O LOCAL DE TRABALHO E VICE-VERSA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('023.93');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO REEMBOLSO DE DESPESAS PARA LOCOMOÇÃO, CLASSIFICAR NO CÓDIGO 023.72. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('023.93', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CAPACITAÇÃO DO SERVIDOR');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('024');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DE GUARDA E A DESTINAÇÃO FINAL DOS ASSENTAMENTOS FUNCIONAIS PARA OS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À PROMOÇÃO, ELABORAÇÃO E EXECUÇÃO DE PROGRAMAS DE CAPACITAÇÃO, DESENVOLVIMENTO E VALORIZAÇÃO DO SERVIDOR.');
        $this->addReference('024', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO DA CAPACITAÇÃO (MAPEAMENTO DAS COMPETÊNCIAS INSTITUCIONAIS E INDIVIDUAIS, DIAGNÓSTICO DAS COMPETÊNCIAS PROFISSIONAIS E O PLANO ANUAL DE CAPACITAÇÃO PROPORCIONADO PELO ÓRGÃO E ENTIDADE AO SERVIDOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO DE CURSOS PELO ÓRGÃO E ENTIDADE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À PROMOÇÃO, PELO ÓRGÃO E ENTIDADE, DE CURSOS DE CAPACITAÇÃO DESTINADOS AO SERVIDOR. QUANTO AOS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO DO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('024.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMAÇÃO (DIVULGAÇÃO DO CURSO E À DEFINIÇÃO DO CONTEÚDO PROGRAMÁTICO, BEM COMO EXEMPLARES ÚNICOS DE EXERCÍCIOS E APOSTILAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSCRIÇÃO E FREQUÊNCIA (PROCEDIMENTOS PARA INSCRIÇÃO, LISTA DE PARTICIPANTES, CONTROLE DE ENTREGA DE MATERIAL E LISTA DE FREQUÊNCIA DOS PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO E RESULTADOS (RESULTADOS ALCANÇADOS, AVALIAÇÃO DO CURSO PELOS PARTICIPANTES, CONTROLE DE EXPEDIÇÃO E ENTREGA DE CERTIFICADOS E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARTICIPAÇÃO EM CURSOS PROMOVIDOS POR OUTROS ÓRGÃOS E ENTIDADES (DIVULGAÇÃO DO CURSO, PROGRAMA, TERMO DE COMPROMISSO E RELATÓRIO DE PARTICIPAÇÃO DO SERVIDOR NO CURSO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO DO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('024.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO DE ESTÁGIOS PELO ÓRGÃO E ENTIDADE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR, CLASSIFICAM-SE DOCUMENTOS REFERENTES A PROMOÇÃO, PELO ÓRGÃO E ENTIDADE, DE ESTÁGIOS DESTINADOS AO SERVIDOR. QUANTO AOS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO DO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('024.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMAÇÃO (DIVULGAÇÃO DO ESTÁGIO E À DEFINIÇÃO DO CONTEÚDO PROGRAMÁTICO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSCRIÇÃO E FREQUÊNCIA (PROCEDIMENTOS PARA INSCRIÇÃO, CONTROLE DE ENTREGA DE MATERIAL E LISTA DE FREQUÊNCIA DOS PARTICIPANTES, BEM COMO AQUELES REFERENTES À CONCESSÃO DE BOLSAS DE ESTÁGIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO E RESULTADOS (RESULTADOS ALCANÇADOS, AVALIAÇÃO DO ESTÁGIO PELOS PARTICIPANTES, CONTROLE DE EXPEDIÇÃO E ENTREGA DE DECLARAÇÃO DE PARTICIPAÇÃO E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.33');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('024.33', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARTICIPAÇÃO EM ESTÁGIOS PROMOVIDOS POR OUTROS ÓRGÃOS E ENTIDADES (DIVULGAÇÃO DO ESTÁGIO, PROGRAMA, TERMO DE COMPROMISSO E RELATÓRIO DE PARTICIPAÇÃO DO SERVIDOR NO ESTÁGIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO DO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('024.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCESSÃO DE ESTÁGIOS E BOLSAS PARA ESTUDANTES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À OFERTA DE ESTÁGIOS, REMUNERADOS OU NÃO, E À CONCESSÃO DE BOLSAS PARA ESTUDANTES (RESIDENTES MÉDICOS, MULTIPROFISSIONAIS E ESTAGIÁRIOS), POR PARTE DO ÓRGÃO E ENTIDADE.');
        $this->addReference('024.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELAÇÃO COM INSTITUIÇÕES DE ENSINO E AGENTES DE INTEGRAÇÃO (CELEBRAÇÃO DE CONVÊNIOS COM INSTITUIÇÕES DE ENSINO SUPERIOR E OUTRAS QUE VISEM À OFERTA DE ESTÁGIOS, À INTEGRAÇÃO DA EMPRESA-ESCOLA E À CONCESSÃO DE BOLSAS PARA ESTUDANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA O CONVÊNIO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA DE CONVÊNIO.');
        $this->addReference('024.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANO DE ESTÁGIO (ESTABELECIMENTO DAS ATIVIDADES A SEREM REALIZADAS PELOS ESTUDANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('024.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO O ESTUDANTE MANTIVER O VÍNCULO COM A ADMINISTRAÇÃO PÚBLICA" CONVENCIONADO PARA 2 ANOS NO CORRENTE, CONSIDERANDO QUE O CONTRATO DE ESTÁGIO NÃO PODERÁ EXCEDER ESTE PRAZO, DE ACORDO COM A LEI Nº 11.788/2008.');
        $this->addReference('024.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO DA SAÚDE E BEM-ESTAR');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('025');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS ATIVIDADES DE PROMOÇÃO DA SAÚDE E BEM-ESTAR DO SERVIDOR.');
        $this->addReference('025', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ASSISTÊNCIA À SAÚDE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CELEBRAÇÃO DOS PLANOS DE SAÚDE DESTINADOS AO SERVIDOR, BEM COMO OS PRONTUÁRIOS MÉDICOS E ODONTOLÓGICOS.');
        $this->addReference('025.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CELEBRAÇÃO DE CONVÊNIOS DE PLANOS DE SAÚDE (DOCUMENTOS REFERENTES À CELEBRAÇÃO DE CONVÊNIOS FIRMADOS PARA A PRESTAÇÃO DE ASSISTÊNCIA MÉDICA, HOSPITALAR, ODONTOLÓGICA, PSICOLÓGICA E FARMACÊUTICA, E QUE SÃO DESTINADOS AO SERVIDOR E SEUS DEPENDENTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('025.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ORIENTAÇÃO MÉDICA, NUTRICIONAL, ODONTOLÓGICA E PSICOLÓGICA (AÇÕES DE ORIENTAÇÃO, ACOMPANHAMENTO E EXECUÇÃO DE INICIATIVAS QUE VISEM O BEM-ESTAR DO SERVIDOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('025.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO DE ATIVIDADE FÍSICA (AÇÕES DE PROMOÇÃO E EXECUÇÃO DE INICIATIVAS QUE VISEM A PRÁTICA DA GINÁSTICA LABORAL E INCENTIVEM O SERVIDOR À PRÁTICA DE ATIVIDADES FÍSICAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('025.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRONTUÁRIO MÉDICO E ODONTOLÓGICO (DOCUMENTOS REFERENTES AOS REGISTROS DOS CUIDADOS MÉDICOS PROFISSIONAIS PRESTADOS AOS SERVIDORES, COMO EXAMES E INSPEÇÕES PERIÓDICAS DE SAÚDE, EXAMES COMPLEMENTARES, LAUDOS MÉDICOS E COMUNICAÇÃO DE ALTA E ÓBITO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.14');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS EXAMES ADMISSIONAIS E DEMISSIONAIS DO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('025.14', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRESERVAÇÃO DA SAÚDE E HIGIENE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS INICIATIVAS DO ÓRGÃO E ENTIDADE QUE VISAM À PRESERVAÇÃO DA SAÚDE E A GARANTIA DE CONDIÇÕES SATISFATÓRIAS, INDIVIDUAIS E AMBIENTAIS, NOS LOCAIS DE TRABALHO.');
        $this->addReference('025.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE RISCOS AMBIENTAIS (PERFIL PROFISSIOGRÁFICO E LEVANTAMENTO, AVALIAÇÃO, CONTROLE DE RISCOS NOS LOCAIS DE TRABALHO, PROGRAMAS DE CONTROLE MÉDICO E DE PREVENÇÃO, LAUDOS E CERTIFICADOS SOBRE INSPEÇÕES E EQUIPAMENTOS DE PROTEÇÃO INDIVIDUAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO PERFIL PROFISSIOGRÁFICO E AO LEVANTAMENTO, AVALIAÇÃO E CONTROLE DA OCORRÊNCIA DE RISCOS AMBIENTAIS (AGENTES QUÍMICOS, FÍSICOS E BIOLÓGICOS) EXISTENTES NOS LOCAIS DE TRABALHO, BEM COMO AQUELES REFERENTES AOS PROGRAMAS DE CONTROLE MÉDICO DE SAÚDE OCUPACIONAL E DE PREVENÇÃO DE RISCOS AMBIENTAIS E OS LAUDOS E CERTIFICADOS SOBRE INSPEÇÕES SANITÁRIAS E EQUIPAMENTOS DE PROTEÇÃO INDIVIDUAL. QUANTO À PROTEÇÃO AMBIENTAL INTERNA, CLASSIFICAR NO CÓDIGO 017.1.');
        $this->addReference('025.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OFERTA DE SERVIÇOS DE REFEITÓRIOS, CANTINAS E COPAS (REGRAS GERAIS DE USO E DE FUNCIONAMENTO DOS AMBIENTES DESTINADOS ÀS REFEIÇÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('025.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SEGURANÇA DO TRABALHO. PREVENÇÃO DE ACIDENTES DE TRABALHO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS MEDIDAS PREVENTIVAS RELACIONADAS AO AMBIENTE DE TRABALHO, VISANDO À REDUÇÃO DE ACIDENTES E DOENÇAS OCUPACIONAIS. QUANTO AO PAGAMENTO DOS ADICIONAIS DE PERICULOSIDADE, INSALUBRIDADE E ATIVIDADE PENOSA, CLASSIFICAR NOS CÓDIGOS 023.163, 023.164 E 023.165, RESPECTIVAMENTE.');
        $this->addReference('025.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSTITUIÇÃO DA COMISSÃO INTERNA DE PREVENÇÃO DE ACIDENTES (CIPA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS PARA A CONSTITUIÇÃO E ATUAÇÃO DA COMISSÃO.');
        $this->addReference('025.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPOSIÇÃO E ATUAÇÃO (CONSTITUIÇÃO DA CIPA, EDITAIS DE CONVOCAÇÃO E DIVULGAÇÃO DAS ELEIÇÕES, CONSTITUIÇÃO DA COMISSÃO ELEITORAL, FOLHA DE VOTAÇÃO E ATAS DA ELEIÇÃO OU INDICAÇÃO E DESIGNAÇÃO DOS MEMBROS E INSTALAÇÃO E POSSE DA COMISSÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.311');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONSTITUIÇÃO DA CIPA, EDITAIS DE CONVOCAÇÃO E DIVULGAÇÃO DAS ELEIÇÕES, CONSTITUIÇÃO DA COMISSÃO ELEITORAL, FOLHA DE VOTAÇÃO E ATAS DA ELEIÇÃO OU INDICAÇÃO E DESIGNAÇÃO DOS MEMBROS E INSTALAÇÃO E POSSE DA COMISSÃO (EM OUTRAS SITUAÇÕES QUE NÃO ENVOLVAM PROCESSO ELEITORAL), BEM COMO AQUELES REFERENTES AOS ESTUDOS E ÀS INSPEÇÕES RELATIVAS À QUALIDADE E SEGURANÇA DO AMBIENTE DE TRABALHO, MAPAS DE RISCOS, LAUDOS E PARECERES TÉCNICOS, ATAS, RELATÓRIOS E CAMPANHAS DE DIVULGAÇÃO.');
        $this->addReference('025.311', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERACIONALIZAÇÃO DE REUNIÕES (ORGANIZAÇÃO DAS REUNIÕES DA CIPA, BEM COMO AQUELES REFERENTES AO AGENDAMENTO, CONVOCAÇÃO, PAUTA E LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.312');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('025.312', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REGISTRO DE OCORRÊNCIAS DE ACIDENTES DE TRABALHO (INCLUEM-SE OS COMUNICADOS E OS REGISTROS DAS OCORRÊNCIAS E AS SINDICÂNCIAS INSTALADAS PARA AVERIGUAÇÃO DOS ACIDENTES DE TRABALHO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('025.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('025.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCESSÃO DE BENEFÍCIOS DE SEGURIDADE E PREVIDÊNCIA SOCIAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('026');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CONCESSÃO DE BENEFÍCIOS PREVIDENCIÁRIOS E ASSISTENCIAIS AO SERVIDOR. QUANTO ÀS CONCESSÕES REFERENTES AOS DIREITOS E VANTAGENS (AUSÊNCIA NO SERVIÇO EM RAZÃO DE ALISTAMENTO ELEITORAL, CASAMENTO, DOAÇÃO DE SANGUE, FALECIMENTO DE FAMILIARES, HORÁRIO ESPECIAL PARA SERVIDOR ESTUDANTE, SERVIDOR PORTADOR DE DEFICIÊNCIA E SERVIDOR QUE POSSUA DEPENDENTE PORTADOR DE DEFICIÊNCIA), CLASSIFICAR NO CÓDIGO 023.5.');
        $this->addReference('026', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADESÃO À PREVIDÊNCIA COMPLEMENTAR (CONTRIBUIÇÃO AOS PLANOS PRIVADOS DE PECÚLIOS, RENDAS E BENEFÍCIOS COMPLEMENTARES OU ASSEMELHADOS AOS DA PREVIDÊNCIA SOCIAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTAGEM E AVERBAÇÃO DE TEMPO DE SERVIÇO (COMPROVAÇÃO DO TEMPO DE CONTRIBUIÇÃO PREVIDENCIÁRIA E À SOLICITAÇÃO DE AVERBAÇÃO DO TEMPO DE SERVIÇO CORRESPONDENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.02');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(52);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À COMPROVAÇÃO DO TEMPO DE CONTRIBUIÇÃO PREVIDENCIÁRIA E À SOLICITAÇÃO DE AVERBAÇÃO DO TEMPO DE SERVIÇO CORRESPONDENTE. QUANTO AO ABONO DE PERMANÊNCIA EM SERVIÇO, CLASSIFICAR NO CÓDIGO 023.14. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DA APOSENTADORIA" CONVENCIONADO PARA 52 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE PERMANÊNCIA DO SERVIDOR NA ATIVA.');
        $this->addReference('026.02', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SALÁRIO FAMÍLIA (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DO BENEFÍCIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(19);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('O PRAZO DE GUARDA INTERMEDIÁRIO SERÁ DE 95 ANOS NOS CASOS PREVISTOS NA LEGISLAÇÃO ESPECÍFICA PARA AS CONCESSÕES ESPECIAIS.');
        $this->addReference('026.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SALÁRIO MATERNIDADE (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DO BENEFÍCIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AUXÍLIOS (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DOS AUXÍLIOS ACIDENTE, DOENÇA, FUNERAL E NATALIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS AUXÍLIOS REFERENTES À CONCESSÃO DE DIREITOS E VANTAGENS (ALIMENTAÇÃO OU REFEIÇÃO, ASSISTÊNCIA PRÉ-ESCOLAR OU CRECHE, MORADIA, VALE-TRANSPORTE E MORADIA DE LIQUIDANTE), CLASSIFICAR NO CÓDIGO 023.6. QUANTO AO AUXÍLIO-RECLUSÃO, CLASSIFICAR NO CÓDIGO 026.91. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('026.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LICENÇAS (DOCUMENTOS REFERENTES À CONCESSÃO DE LICENÇAS PARA ACIDENTE EM SERVIÇO, TRATAMENTO DE SAÚDE, GESTANTE, PATERNIDADE E ADOTANTE, BEM COMO AS PERÍCIAS MÉDICAS REALIZADAS PARA CONCESSÃO E PRORROGAÇÃO DAS LICENÇAS, QUANDO FOREM NECESSÁRIAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO ÀS LICENÇAS REFERENTES À CONCESSÃO DE DIREITOS E VANTAGENS (AFASTAMENTO DO CÔNJUGE OU COMPANHEIRO, ATIVIDADE POLÍTICA, CAPACITAÇÃO PROFISSIONAL, DESEMPENHO DE MANDATO CLASSISTA, MOTIVO DE DOENÇA EM PESSOA DA FAMÍLIA, INCENTIVADA SEM REMUNERAÇÃO, PRÊMIO POR ASSIDUIDADE, SERVIÇO MILITAR E TRATAMENTO DE INTERESSES PARTICULARES), CLASSIFICAR NO CÓDIGO 023.3.');
        $this->addReference('026.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('APOSENTADORIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À SOLICITAÇÃO E CONCESSÃO DE APOSENTADORIA POR INVALIDEZ PERMANENTE, POR IDADE, POR TEMPO DE CONTRIBUIÇÃO PREVIDENCIÁRIA E APOSENTADORIA ESPECIAL.');
        $this->addReference('026.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVALIDEZ PERMANENTE (DOCUMENTOS REFERENTES À SOLICITAÇÃO E CONCESSÃO DE APOSENTADORIA POR INVALIDEZ PERMANENTE EM DECORRÊNCIA DE ACIDENTE EM SERVIÇO, MOLÉSTIA PROFISSIONAL E DOENÇA GRAVE, CONTAGIOSA OU INCURÁVEL, ESPECIFICADAS EM LEGISLAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPULSÓRIA (CONCESSÃO DE APOSENTADORIA COMPULSÓRIA, DE ACORDO COM A LEGISLAÇÃO EM VIGOR, COM PROVENTOS PROPORCIONAIS AO TEMPO DE CONTRIBUIÇÃO PREVIDENCIÁRIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VOLUNTÁRIA (SOLICITAÇÃO E CONCESSÃO DE APOSENTADORIA VOLUNTÁRIA, ATENDENDO AOS REQUISITOS DE TEMPO DE CONTRIBUIÇÃO PREVIDENCIÁRIA E DE IDADE MÍNIMA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.53');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.53', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ESPECIAL (SOLICITAÇÃO E CONCESSÃO DE APOSENTADORIA AO SERVIDOR QUE TRABALHOU EXPOSTO A AGENTES NOCIVOS À SAÚDE, COMO CALOR OU RUÍDO, DE FORMA CONTÍNUA E ININTERRUPTA, EM NÍVEIS DE EXPOSIÇÃO ACIMA DOS LIMITES, CONFORME ESPECIFICADO EM LEGISLAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.54');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.54', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PENSÃO POR MORTE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE OS DOCUMENTOS REFERENTES À SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, HABILITAÇÃO, INCORPORAÇÃO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DAS PENSÕES CONCEDIDAS POR MORTE DO SERVIDOR.');
        $this->addReference('026.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PENSÃO PROVISÓRIA. PENSÃO TEMPORÁRIA (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, HABILITAÇÃO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DA PENSÃO, BEM COMO AQUELES REFERENTES À AVALIAÇÃO PERIÓDICA DAS CONDIÇÕES QUE ENSEJARAM A CONCESSÃO DO BENEFÍCIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.61');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(20);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 20 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('026.61', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PENSÃO VITALÍCIA (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, HABILITAÇÃO E PAGAMENTO DA PENSÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.62');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('026.62', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À CONCESSÃO DE BENEFÍCIOS DE SEGURIDADE E PREVIDÊNCIA SOCIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NA SUBDIVISÃO DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE CONCESSÃO DE BENEFÍCIOS DE SEGURIDADE E PREVIDÊNCIA SOCIAL NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('026.9', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AUXÍLIO RECLUSÃO (SOLICITAÇÃO, COMPROVAÇÃO DO DIREITO, PAGAMENTO E INTERRUPÇÃO DO PAGAMENTO DO AUXÍLIO-RECLUSÃO AOS DEPENDENTES DO SERVIDOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('026.91');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS AUXÍLIOS ALIMENTAÇÃO OU REFEIÇÃO, ASSISTÊNCIA PRÉ-ESCOLAR OU CRECHE, MORADIA, VALE-TRANSPORTE E MORADIA DE LIQUIDANTE, CLASSIFICAR NO CÓDIGO 023.6. QUANTO AOS AUXÍLIOS ACIDENTE, DOENÇA, FUNERAL E NATALIDADE, CLASSIFICAR NO CÓDIGO 026.3.');
        $this->addReference('026.91', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('APURAÇÃO DE RESPONSABILIDADE DISCIPLINAR');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('027');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS APURAÇÕES DE RESPONSABILIDADE QUE ENVOLVEM O SERVIDOR. QUANTO AO EXTRAVIO, ROUBO, DESAPARECIMENTO, FURTO E AVARIA DE MATERIAL, CLASSIFICAR NO CÓDIGO 033.6.');
        $this->addReference('027', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVERIGUAÇÃO DE DENÚNCIAS (DENÚNCIAS SOBRE POSSÍVEIS INFRAÇÕES OU IRREGULARIDADES PRATICADAS PELOS SERVIDORES NO EXERCÍCIO DE SUAS ATRIBUIÇÕES, BEM COMO AQUELES PRODUZIDOS EM DECORRÊNCIA DA INSTAURAÇÃO DE INQUÉRITOS, SINDICÂNCIAS E PAD)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('027.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS DISCIPLINARES PARA A APURAÇÃO DE DENÚNCIAS SOBRE POSSÍVEIS INFRAÇÕES OU IRREGULARIDADES PRATICADAS PELOS SERVIDORES NO EXERCÍCIO DE SUAS ATRIBUIÇÕES, BEM COMO AQUELES PRODUZIDOS EM DECORRÊNCIA DA INSTAURAÇÃO DE INQUÉRITOS, SINDICÂNCIAS E PROCESSO ADMINISTRATIVO DISCIPLINAR (PAD).');
        $this->addReference('027.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('APLICAÇÃO DE PENALIDADES DISCIPLINARES (ADVERTÊNCIA, SUSPENSÃO, DEMISSÃO, CASSAÇÃO DE APOSENTADORIA, DISPONIBILIDADE, DESTITUIÇÃO DE CARGO EM COMISSÃO E DESTITUIÇÃO DE FUNÇÃO COMISSIONADA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('027.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À IMPOSIÇÃO DE PENALIDADES EM RAZÃO DA CONCLUSÃO DA APURAÇÃO DE RESPONSABILIDADE DISCIPLINAR, PODENDO SE CONSTITUIR EM UMA ADVERTÊNCIA, SUSPENSÃO, DEMISSÃO, CASSAÇÃO DE APOSENTADORIA, DISPONIBILIDADE, DESTITUIÇÃO DE CARGO EM COMISSÃO E DESTITUIÇÃO DE FUNÇÃO COMISSIONADA. QUANTO AO REGISTRO DAS PENALIDADES DISCIPLINARES APLICADAS AO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1.');
        $this->addReference('027.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AJUSTAMENTO DE CONDUTA (CELEBRAÇÃO DE TERMO DE AJUSTAMENTO DE CONDUTA (TAC) NOS CASOS DE INFRAÇÃO DISCIPLINAR DE MENOR POTENCIAL OFENSIVO E DE DESVIOS DE CONDUTA DE BAIXA LESIVIDADE PRATICADOS PELO SERVIDOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('027.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('027.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CUMPRIMENTO DE MISSÕES E VIAGENS A SERVIÇO (AFASTAMENTO DO SERVIDOR PARA O CUMPRIMENTO DE MISSÕES E A REALIZAÇÃO DE VIAGENS A SERVIÇO, NO PAÍS E NO EXTERIOR, E PARA SERVIR EM ORGANISMO INTERNACIONAL DE QUE O BRASIL PARTICIPE OU COM O QUAL COOPERE)');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('028');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('QUANTO AO PLANEJAMENTO, ACOMPANHAMENTO, EXECUÇÃO, AVALIAÇÃO E RELATÓRIO TÉCNICO, CLASSIFICAR NO CÓDIGO ESPECÍFICO RELATIVO AO OBJETO DA MISSÃO E DA VIAGEM A SERVIÇO. QUANTO AOS AFASTAMENTOS REFERENTES À CONCESSÃO DE DIREITOS E VANTAGENS (SUSPENSÃO DE CONTRATO DE TRABALHO, DEPOR, EXERCER MANDATO LEGISLATIVO, SERVIR A JUSTIÇA ELEITORAL, SERVIR COMO JURADO, PARTICIPAR EM PROGRAMAS DE PÓS-GRADUAÇÃO STRICTO SENSU E DE PÓS-DOUTORADO E EM ESTUDOS, NO PAÍS E NO EXTERIOR), CLASSIFICAR NO CÓDIGO 023.4.');
        $this->addReference('028', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NO PAÍS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO AFASTAMENTO DO SERVIDOR PARA O CUMPRIMENTO DE MISSÕES E A REALIZAÇÃO DE VIAGENS NO PAÍS, PODENDO SER: COM ÔNUS (QUANDO IMPLICAREM NO DIREITO À CONCESSÃO DE PASSAGENS E DIÁRIAS E AO RECEBIMENTO DE VENCIMENTOS OU SALÁRIOS E DEMAIS VANTAGENS) E COM ÔNUS LIMITADO (QUANDO IMPLICAREM, APENAS, NO DIREITO AO RECEBIMENTO DE VENCIMENTOS E SALÁRIOS E DEMAIS VANTAGENS).');
        $this->addReference('028.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COM ÔNUS (SOLICITAÇÃO E AUTORIZAÇÃO DE AFASTAMENTO, AJUDAS DE CUSTO, DIÁRIAS, PASSAGENS, RESERVAS DE HOTEL, PRESTAÇÕES DE CONTAS E RELATÓRIOS DE VIAGEM, BEM COMO LISTA DE PARTICIPANTES E CONCESSÃO DE PASSAGENS E DIÁRIAS PARA CONVIDADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('028.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COM ÔNUS LIMITADO (SOLICITAÇÃO E AUTORIZAÇÃO DE AFASTAMENTO PARA PARTICIPAR DE EVENTOS OU CUMPRIR MISSÕES E REALIZAR VIAGENS NO PAÍS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('028.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NO EXTERIOR (AFASTAMENTO DO PAÍS DO SERVIDOR PARA O CUMPRIMENTO DE MISSÕES E A REALIZAÇÃO DE VIAGENS AO EXTERIOR, PODENDO SER: COM ÔNUS, COM ÔNUS LIMITADO E SEM ÔNUS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('AFASTAMENTO DO PAÍS DO SERVIDOR PARA O CUMPRIMENTO DE MISSÕES E A REALIZAÇÃO DE VIAGENS AO EXTERIOR, PODENDO SER: COM ÔNUS (DIREITO À CONCESSÃO DE PASSAGENS E DIÁRIAS E AO RECEBIMENTO DE VENCIMENTOS OU SALÁRIOS E DEMAIS VANTAGENS), COM ÔNUS LIMITADO (QUANDO IMPLICAREM, APENAS, NO DIREITO AO RECEBIMENTO DE VENCIMENTOS E SALÁRIOS E DEMAIS VANTAGENS) E SEM ÔNUS (QUANDO IMPLICAREM A PERDA TOTAL DOS VENCIMENTOS OU SALÁRIOS E DEMAIS VANTAGENS, NÃO ACARRETANDO QUALQUER DESPESA PARA O ÓRGÃO E ENTIDADE).');
        $this->addReference('028.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COM ÔNUS (SOLICITAÇÃO E AUTORIZAÇÃO DE AFASTAMENTO DO PAÍS, AJUDAS DE CUSTO, DIÁRIAS, COMPRA DE MOEDA ESTRANGEIRA, PASSAGENS, RESERVAS DE HOTEL, PRESTAÇÕES DE CONTAS E RELATÓRIOS DE VIAGEM, LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('028.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COM ÔNUS LIMITADO (SOLICITAÇÃO E AUTORIZAÇÃO DE AFASTAMENTO DO PAÍS PARA PARTICIPAR DE EVENTOS OU CUMPRIR MISSÕES E REALIZAR VIAGENS AO EXTERIOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('028.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SEM ÔNUS (SOLICITAÇÃO E AUTORIZAÇÃO DE AFASTAMENTO DO PAÍS PARA PARTICIPAR DE EVENTOS OU CUMPRIR MISSÕES E REALIZAR VIAGENS AO EXTERIOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('028.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(7);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('028.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO DE PESSOAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('029');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DE PESSOAS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('029', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE ASSIDUIDADE E PONTUALIDADE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO CONTROLE DE FREQUÊNCIA DOS SERVIDORES E AO ESTABELECIMENTO DO HORÁRIO DE EXPEDIENTE DO ÓRGÃO E ENTIDADE.');
        $this->addReference('029.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE FREQUÊNCIA (INCLUEM-SE LIVROS, CARTÕES E FOLHAS DE PONTO, BEM COMO DOCUMENTOS REFERENTES AO ABONO DE FALTAS, CUMPRIMENTO DE HORÁRIO ESPECIAL E DE HORAS EXTRAS, BANCO DE HORAS, CORTE DE PONTO E REGISTRO DE DIAS PARADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(52);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('029.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DEFINIÇÃO DO HORÁRIO DE EXPEDIENTE (FIXAÇÃO E MUDANÇAS DO HORÁRIO DE FUNCIONAMENTO DO ÓRGÃO E ENTIDADE E ÀS ESCALAS DE PLANTÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('029.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSTITUIÇÃO DO PROGRAMA DE CRECHE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À IMPLANTAÇÃO DO PROGRAMA DE CRECHE EM DECORRÊNCIA DA IMPLEMENTAÇÃO DE PLANO DE ASSISTÊNCIA PRÉ-ESCOLAR NO ÓRGÃO E ENTIDADE.');
        $this->addReference('029.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PUBLICAÇÃO E DIVULGAÇÃO (LANÇAMENTO DO PROGRAMA DE CRECHE, À PUBLICAÇÃO DE EDITAIS E À DIVULGAÇÃO DAS VAGAS E DOS CRITÉRIOS DE SELEÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('029.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSCRIÇÃO, SELEÇÃO, ADMISSÃO E RENOVAÇÃO (INSCRIÇÃO, NÍVEIS OU CATEGORIAS DE USUÁRIOS, AVALIAÇÃO SOCIOECONÔMICA E COMPROVAÇÃO DE VÍNCULO DO BENEFICIÁRIO, TERMO DE COMPROMISSO, LISTAS DE ATUALIZAÇÃO DE BENEFICIADOS E DE RENOVAÇÃO DO BENEFÍCIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(10);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(10);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À INSCRIÇÃO, AO ESTABELECIMENTO DE NÍVEIS OU CATEGORIAS DE USUÁRIOS DO BENEFÍCIO, À AVALIAÇÃO SOCIOECONÔMICA DO CANDIDATO E À COMPROVAÇÃO DE VÍNCULO DO BENEFICIÁRIO COM O ÓRGÃO E ENTIDADE, BEM COMO TERMO DE COMPROMISSO, LISTAS DE ATUALIZAÇÃO DE BENEFICIADOS E DE RENOVAÇÃO DO BENEFÍCIO. CONDICIONAL "ENQUANTO VIGORA O VÍNCULO DO BENEFICIÁRIO" CONVENCIONADO PARA 10 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA DE VÍNCULO DO BENEFICIÁRIO.');
        $this->addReference('029.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ACOMPANHAMENTO PEDAGÓGICO, MÉDICO E DO DESENVOLVIMENTO DA CRIANÇA (DESENVOLVIMENTO DE ATIVIDADES RECREATIVAS E PEDAGÓGICAS, AO FORNECIMENTO DE ALIMENTAÇÃO E AO CONTROLE DE SAÚDE DA CRIANÇA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(10);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(10);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA O VÍNCULO DO BENEFICIÁRIO" CONVENCIONADO PARA 10 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA DE VÍNCULO DO BENEFICIÁRIO.');
        $this->addReference('029.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO DO PROGRAMA (AVALIAÇÕES PERIÓDICAS E PERMANENTES DO PROGRAMA, TAIS COMO: LAUDOS TÉCNICOS, ESTABELECIMENTO DE INDICADORES, ESTUDOS DE OFERTAS E DEMANDAS E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.24');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('029.24', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INCENTIVOS FUNCIONAIS (CONCESSÃO DE PRÊMIOS, DE MEDALHAS, DIPLOMAS DE HONRA AO MÉRITO, CONDECORAÇÕES E ELOGIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('029.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DELEGAÇÃO DE COMPETÊNCIA E PROCURAÇÃO (AUTORIZAÇÃO/DELEGAÇÃO QUE AUTORIDADE RESPONSÁVEL PODE CONFERIR A UM SERVIDOR PARA TRATAR DE MATÉRIA DE COMPETÊNCIA EXCLUSIVA, TAIS COMO: ORDENAÇÃO DE DESPESAS, DECISÕES DE RECURSOS E EDIÇÃO DE ATOS NORMATIVO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('AUTORIZAÇÃO OU DELEGAÇÃO QUE A AUTORIDADE ADMINISTRATIVA RESPONSÁVEL PELO ÓRGÃO E ENTIDADE PODE CONFERIR A UM SERVIDOR PARA TRATAR DE MATÉRIA DE COMPETÊNCIA EXCLUSIVA, TAIS COMO: ORDENAÇÃO DE DESPESAS, DECISÕES DE RECURSOS E CASOS DE EDIÇÃO DE ATOS DE CARÁTER NORMATIVO. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA OS DOCUMENTOS REFERENTES AOS ORDENADORES DE DESPESAS. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('029.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE SERVIÇOS PROFISSIONAIS TRANSITÓRIOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('A CONTRATAÇÃO PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO, DISPENSA E INEXIGIBILIDADE DE LICITAÇÃO. QUANTO AOS DOCUMENTOS REFERENTES ÀS PESSOAS FÍSICAS CONTRATADAS (AUTÔNOMOS E COLABORADORES), QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NO CÓDIGO 020.12. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('029.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PETIÇÃO DE DIREITOS (INCLUEM-SE REQUERIMENTOS FEITOS PELO SERVIDOR EM DEFESA DE SEUS DIREITOS OU INTERESSES LEGÍTIMOS E PEDIDOS DE INTERPOSIÇÃO DE RECONSIDERAÇÃO OU DE RECURSO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('029.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A SOLUÇÃO DA INTERPOSIÇÃO DE PEDIDO DE RECONSIDERAÇÃO OU DE RECURSO" CONVENCIONADO PARA 1 ANO NO CORRETE, SUPERIOR AOS 15 DIAS PREVISTOS PELO DIREITO DE PETIÇÃO DO ART. 5º, XXXIV, A, DA CONSTITUIÇÃO DA REPÚBLICA, OU IGUALMENTE SUPERIOR AO PRAZO DE DECISÃO DE ATÉ TRINTA DIAS APÓS CONCLUÍDA A INSTRUÇÃO DE PROCESSO ADMINISTRATIVO PELA ADMINISTRAÇÃO.');
        $this->addReference('029.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE MATERIAIS (AQUISIÇÃO, MOVIMENTAÇÃO, ALIENAÇÃO, BAIXA E INVENTÁRIO DE MATERIAL PERMANENTE E DE CONSUMO, BEM COMO AQUELES REFERENTES À CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS E À EXECUÇÃO DE SERVIÇOS DE INSTALAÇÃO E MANUTENÇÃO)');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('030');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('AQUISIÇÃO, MOVIMENTAÇÃO, ALIENAÇÃO, BAIXA E INVENTÁRIO DE MATERIAL PERMANENTE (MOBILIÁRIO, EQUIPAMENTOS, UTENSÍLIOS, APARELHOS, FERRAMENTAS, MÁQUINAS, INSTRUMENTOS TÉCNICOS E OBRAS DE ARTE) E DE CONSUMO (EXPEDIENTE, LIMPEZA, MANUTENÇÃO, ALIMENTAÇÃO E ABASTECIMENTO DE VEÍCULOS, MEDICAMENTOS, UNIFORMES, PEÇAS DE REPOSIÇÃO, MATÉRIAS-PRIMAS E COBAIAS PARA USO CIENTÍFICO), BEM COMO AQUELES REFERENTES À CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS E À EXECUÇÃO DE SERVIÇOS DE INSTALAÇÃO E MANUTENÇÃO.');
        $this->addReference('030', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DE MATERIAL PERMANENTE E DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('030.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('030.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CADASTRAMENTO DE FORNECEDORES E DE PRESTADORES DE SERVIÇOS (REGISTRO CADASTRAL DE FORNECEDORES EM SISTEMA ESPECÍFICO DA ADMINISTRAÇÃO PÚBLICA, VISANDO VERIFICAR A CAPACIDADE TÉCNICA PARA AQUISIÇÕES E CONTRATAÇÕES DE SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('030.02');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('030.02', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ESPECIFICAÇÃO, PADRONIZAÇÃO, CODIFICAÇÃO, PREVISÃO, IDENTIFICAÇÃO E CLASSIFICAÇÃO (MATERIAL PERMANENTE, DE CONSUMO E DE MATÉRIA-PRIMA E INSUMO, BEM COMO CATÁLOGO E AMOSTRAS DE MATERIAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('030.03');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('030.03', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AQUISIÇÃO E INCORPORAÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('031');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS REFERENTES ÀS AÇÕES DE AQUISIÇÃO E INCORPORAÇÃO NÃO EFETIVADAS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO E INCORPORAÇÃO DE MATERIAL PERMANENTE, DE CONSUMO E DE MATÉRIA-PRIMA E INSUMO.');
        $this->addReference('031', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPRA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO. NOTA: A COMPRA PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA DE LICITAÇÃO E INEXIGIBILIDADE DE LICITAÇÃO.');
        $this->addReference('031.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (COMPRA E IMPORTAÇÃO DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À AQUISIÇÃO E INCORPORAÇÃO DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 062.1. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('031.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (COMPRA E IMPORTAÇÃO DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À COMPRA E IMPORTAÇÃO DE ANIMAIS UTILIZADOS EM PESQUISAS E ESTUDOS, MAS QUE NÃO SEJAM COBAIAS, CLASSIFICAR NO CÓDIGO 041.13. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('031.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DOAÇÃO E PERMUTA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('031.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('031.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('031.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DAÇÃO. ADJUDICAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('031.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (DAÇÃO E ADJUDICAÇÃO DE MATERIAL PERMANENTE, PARA RECEBIMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('031.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (DAÇÃO E ADJUDICAÇÃO DE MATERIAL DE CONSUMO, PARA RECEBIMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('031.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CESSÃO, COMODATO E EMPRÉSTIMO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO TEMPORÁRIA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('031.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (CESSÃO, COMODATO E EMPRÉSTIMO DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.41');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO EMPRÉSTIMO E DEVOLUÇÃO DE MATERIAL PERMANENTE DISPONIBILIZADO AOS SERVIDORES, CLASSIFICAR NO CÓDIGO 039.2. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('031.41', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (CESSÃO, COMODATO E EMPRÉSTIMO DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.42');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('031.42', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LOCAÇÃO. ARRENDAMENTO MERCANTIL (LEASING) (AQUISIÇÃO TEMPORÁRIA DE MATERIAL PERMANENTE POR LOCAÇÃO E ARRENDAMENTO MERCANTIL - LEASING)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('031.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('031.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOVIMENTAÇÃO DE MATERIAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('032');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À MOVIMENTAÇÃO DE MATERIAL PERMANENTE E DE CONSUMO, QUE ENVOLVE AS ATIVIDADES DE CONTROLE, SEGURANÇA E PROTEÇÃO DO ARMAZENAMENTO, DO DESLOCAMENTO, DA DISTRIBUIÇÃO, DA PREVISÃO DE CONSUMO E DA REPOSIÇÃO DE ESTOQUE.');
        $this->addReference('032', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TERMOS DE RESPONSABILIDADE. CAUTELA (RESPONSABILIDADE NA MOVIMENTAÇÃO DE MATERIAL E COM O ACAUTELAMENTO NO CONTROLE LOGÍSTICO, BEM COMO AS GUIAS DE TRANSFERÊNCIA E OS RELATÓRIOS DE MOVIMENTAÇÃO DE MATERIAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('032.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('032.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE ESTOQUE (REQUISIÇÃO E DISTRIBUIÇÃO DE MATERIAL E À REPOSIÇÃO E CONTROLE DE ESTOQUE, BEM COMO OS RELATÓRIOS DE MOVIMENTAÇÃO DE ALMOXARIFADO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('032.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO ACOMPANHAMENTO E CONTROLE DE BENS MATERIAIS, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 036. OBSERVAR OS PRAZOS DA LEGISLAÇÃO EM VIGOR PARA OS DOCUMENTOS REFERENTES A PRODUTOS E INSUMOS QUÍMICOS E OUTRAS SUBSTÂNCIAS ENTORPECENTES.');
        $this->addReference('032.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AUTORIZAÇÃO DE ENTRADA E SAÍDA DE MATERIAL (AUTORIZAÇÃO DE ENTRADA E SAÍDA DE MATERIAL, BEM COMO AQUELES REFERENTES À ARMAZENAGEM NO DECORRER DO PROCEDIMENTO DE DESEMBARAÇO ADUANEIRO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('032.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO EMPRÉSTIMO E DEVOLUÇÃO DE MATERIAL PERMANENTE DISPONIBILIZADO AOS SERVIDORES, CLASSIFICAR NO CÓDIGO 039.2. OBSERVAR OS PRAZOS DA LEGISLAÇÃO EM VIGOR PARA OS DOCUMENTOS REFERENTES A PRODUTOS E INSUMOS QUÍMICOS E OUTRAS SUBSTÂNCIAS ENTORPECENTES.');
        $this->addReference('032.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECOLHIMENTO DE MATERIAL INSERVÍVEL AO DEPÓSITO (RECOLHIMENTO DE MATERIAL INSERVÍVEL E DE SUCATAS AO DEPÓSITO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('032.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À COLETA SELETIVA SOLIDÁRIA E À RECICLAGEM DE RESÍDUOS DESCARTÁVEIS, CLASSIFICAR NO CÓDIGO 017.1. QUANTO À ALIENAÇÃO DEFINITIVA, POR DESFAZIMENTO, DE MATERIAL PERMANENTE E DE CONSUMO EM RAZÃO DE SEREM CONSIDERADOS INSERVÍVEIS E IRRECUPERÁVEIS, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 033.4. OBSERVAR OS PRAZOS DA LEGISLAÇÃO EM VIGOR PARA OS DOCUMENTOS REFERENTES A PRODUTOS E INSUMOS QUÍMICOS E OUTRAS SUBSTÂNCIAS ENTORPECENTES.');
        $this->addReference('032.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TOMBAMENTO (TOMBAMENTO DE MATERIAL PERMANENTE, PERTENCENTES AO ÓRGÃO E ENTIDADE, QUANDO SE TORNAM PEÇAS DE EXPOSIÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('032.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A ALIENAÇÃO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUIR A ALIENAÇÃO.');
        $this->addReference('032.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ALIENAÇÃO E BAIXA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('033');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS REFERENTES ÀS AÇÕES DE ALIENAÇÃO E BAIXA NÃO EFETIVADAS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO E BAIXA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('033', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VENDA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('033.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (VENDA E LEILÃO DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('033.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (VENDA E LEILÃO DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('033.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DOAÇÃO E PERMUTA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('033.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('033.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('033.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DAÇÃO. ADJUDICAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('033.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (DAÇÃO E ADJUDICAÇÃO DE MATERIAL PERMANENTE, PARA PAGAMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('033.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (DAÇÃO E ADJUDICAÇÃO DE MATERIAL DE CONSUMO, PARA PAGAMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('033.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESFAZIMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE MATERIAL PERMANENTE E DE CONSUMO EM RAZÃO DE SEREM CONSIDERADOS INSERVÍVEIS E IRRECUPERÁVEIS, OCORRENDO POR MEIO DE INUTILIZAÇÃO, ELIMINAÇÃO OU DESTRUIÇÃO. QUANTO AO MONITORAMENTO E AVALIAÇÃO DOS PROCEDIMENTOS DE CONTROLE E PRESERVAÇÃO AMBIENTAL EXTERNA, CLASSIFICAR NO CÓDIGO 017.2. QUANTO AO RECOLHIMENTO DE MATERIAL INSERVÍVEL E DE SUCATAS AO DEPÓSITO, CLASSIFICAR NO CÓDIGO 032.3.');
        $this->addReference('033.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (DESFAZIMENTO DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.41');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('033.41', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (DESFAZIMENTO DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.42');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('033.42', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CESSÃO, COMODATO E EMPRÉSTIMO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO TEMPORÁRIA DE MATERIAL PERMANENTE E DE CONSUMO.');
        $this->addReference('033.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL PERMANENTE (CESSÃO, COMODATO E EMPRÉSTIMO DE MATERIAL PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO EMPRÉSTIMO E DEVOLUÇÃO DE MATERIAL PERMANENTE DISPONIBILIZADO AOS SERVIDORES, CLASSIFICAR NO CÓDIGO 039.2. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('033.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATERIAL DE CONSUMO (CESSÃO, COMODATO E EMPRÉSTIMO DE MATERIAL DE CONSUMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('033.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXTRAVIO, ROUBO, DESAPARECIMENTO, FURTO E AVARIA (CASOS DE EXTRAVIO, ROUBO, DESAPARECIMENTO, FURTO OU AVARIA DE MATERIAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('033.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('OBSERVAR OS PRAZOS DA LEGISLAÇÃO EM VIGOR PARA OS DOCUMENTOS REFERENTES A PRODUTOS E INSUMOS QUÍMICOS E OUTRAS SUBSTÂNCIAS ENTORPECENTES. QUANTO À APURAÇÃO DE RESPONSABILIDADE DISCIPLINAR DO SERVIDOR, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 027. QUANTO À OCORRÊNCIA DE SINISTROS EM IMÓVEIS DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 046.3. CONDICIONAL "ATÉ A CONCLUSÃO DO CASO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUSÃO DO CASO.');
        $this->addReference('033.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('034');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONTRATAÇÃO DE SEGURO PATRIMONIAL PARA OS BENS IMÓVEIS, VEÍCULOS E BENS SEMOVENTES, CLASSIFICAR NO CÓDIGO 045.1. QUANTO À INSTALAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE COMBATE A INCÊNDIO, CLASSIFICAR NO CÓDIGO 046.13. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('034', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO DE SERVIÇOS DE INSTALAÇÃO E MANUTENÇÃO (EXECUÇÃO DE SERVIÇOS DE INSTALAÇÃO E MANUTENÇÃO DE MATERIAL, COM MEIOS PRÓPRIOS DO ÓRGÃO E ENTIDADE, NÃO SENDO NECESSÁRIA A CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS OU DE MÃO DE OBRA EXTERNA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('035');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('035', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE MATERIAIS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('036');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO ACOMPANHAMENTO E CONTROLE DE BENS MATERIAIS, QUE SUBSIDIAM A ELABORAÇÃO DOS INVENTÁRIOS. QUANTO À REQUISIÇÃO E DISTRIBUIÇÃO DE MATERIAL E À REPOSIÇÃO E CONTROLE DE ESTOQUE, CLASSIFICAR NO CÓDIGO 032.1. QUANTO AO INVENTÁRIO DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO, CLASSIFICAR NO CÓDIGO 062.3.');
        $this->addReference('036', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMISSÃO DE INVENTÁRIO (CONSTITUIÇÃO DAS COMISSÕES DE INVENTÁRIO, BEM COMO AQUELES REFERENTES À DEFINIÇÃO DOS PROCEDIMENTOS PARA A REALIZAÇÃO DOS MESMOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('036.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('036.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVENTÁRIO DE MATERIAL PERMANENTE (ELABORAÇÃO DO INVENTÁRIO DO MATERIAL PERMANENTE DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('036.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('036.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVENTÁRIO DE MATERIAL DE CONSUMO (ELABORAÇÃO DO INVENTÁRIO DO MATERIAL DE CONSUMO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('036.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('036.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO DE MATERIAIS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('039');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DE BENS MATERIAIS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('039', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RACIONALIZAÇÃO DO USO DE MATERIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('039.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CRIAÇÃO, DESIGNAÇÃO, GESTÃO, DIVULGAÇÃO E RESULTADOS DA ATUAÇÃO DE GRUPOS DE TRABALHO E DE COMISSÕES DE RACIONALIZAÇÃO DO USO DE MATERIAL.');
        $this->addReference('039.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CRIAÇÃO E ATUAÇÃO DE GRUPOS DE TRABALHO (CRIAÇÃO DE GRUPOS DE TRABALHO E COMISSÕES DE RACIONALIZAÇÃO DO USO DE MATERIAL, REGISTROS DAS DELIBERAÇÕES E TOMADAS DE DECISÃO DEFINIDAS NAS REUNIÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('039.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À CRIAÇÃO DE GRUPOS DE TRABALHO E COMISSÕES DE RACIONALIZAÇÃO DO USO DE MATERIAL, AOS REGISTROS DAS DELIBERAÇÕES E ÀS TOMADAS DE DECISÃO DEFINIDAS NAS REUNIÕES, TAIS COMO: ATO DE INSTITUIÇÃO, REGRAS PARA ATUAÇÃO, DESIGNAÇÃO E SUBSTITUIÇÃO DE MEMBROS, RESOLUÇÕES, ATAS E RELATÓRIOS.');
        $this->addReference('039.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERACIONALIZAÇÃO DE REUNIÕES (DOCUMENTOS REFERENTES À ORGANIZAÇÃO DAS REUNIÕES DOS GRUPOS DE TRABALHOS E DAS COMISSÕES DE RACIONALIZAÇÃO DO USO DE MATERIAL, BEM COMO AQUELES REFERENTES AO AGENDAMENTO, CONVOCAÇÃO, PAUTA E LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('039.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('039.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EMPRÉSTIMO E DEVOLUÇÃO DE MATERIAL PERMANENTE (EMPRÉSTIMO E DEVOLUÇÃO, PARA USO EM ATIVIDADES INTERNAS E EXTERNAS, COMO COMPUTADORES PORTÁTEIS, FILMADORAS, CÂMERAS E TELEFONES CELULARES FUNCIONAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('039.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('EMPRÉSTIMO E DEVOLUÇÃO, PARA USO EM ATIVIDADES INTERNAS E EXTERNAS, COMO COMPUTADORES PORTÁTEIS, FILMADORAS, CÂMERAS E TELEFONES CELULARES FUNCIONAIS. QUANTO À AUTORIZAÇÃO DE ENTRADA E SAÍDA DE MATERIAL DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 032.2. QUANTO AO EMPRÉSTIMO DE MATERIAL PERMANENTE PARA OUTRO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 033.51. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('039.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE BENS PATRIMONIAIS E DE SERVIÇOS (AQUISIÇÃO, ALIENAÇÃO E INVENTÁRIO DE BENS IMÓVEIS, DE VEÍCULOS MOTORIZADOS E NÃO MOTORIZADOS E DE BENS SEMOVENTES, SERVIÇOS PÚBLICOS ESSENCIAIS, MANUTENÇÃO E REPARO DAS INSTALAÇÕES E DE EXECUÇÃO DE OBRAS)');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('040');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('AQUISIÇÃO, ALIENAÇÃO E INVENTÁRIO DE BENS IMÓVEIS (TERRENOS, EDIFÍCIOS, RESIDÊNCIAS E SALAS), DE VEÍCULOS MOTORIZADOS (TERRESTRES, FLUVIAIS, MARÍTIMOS E AÉREOS) E NÃO MOTORIZADOS (PROPULSÃO HUMANA E TRAÇÃO ANIMAL) E DE BENS SEMOVENTES (ANIMAIS UTILIZADOS PARA PATRULHAMENTO, INVESTIGAÇÃO E TRANSPORTE), CONTRATAÇÃO DE SERVIÇOS PARA O FORNECIMENTO DE SERVIÇOS PÚBLICOS ESSENCIAIS, PARA A MANUTENÇÃO E REPARO DAS INSTALAÇÕES E EXECUÇÃO DE OBRAS E AO CONTROLE, PROTEÇÃO, GUARDA E SEGURANÇA PATRIMONIAL.');
        $this->addReference('040', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DE BENS PATRIMONIAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('040.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES ÀS DETERMINAÇÕES LEGAIS, AOS ATOS E INSTRUÇÕES NORMATIVAS, AOS PROCEDIMENTOS OPERACIONAIS E ÀS DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DE BENS PATRIMONIAIS. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('040.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AQUISIÇÃO E INCORPORAÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('041');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS REFERENTES ÀS AÇÕES DE AQUISIÇÃO E INCORPORAÇÃO NÃO EFETIVADAS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO E INCORPORAÇÃO DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('041', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPRA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO DEFINITIVA DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES. A COMPRA PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA DE LICITAÇÃO E INEXIGIBILIDADE DE LICITAÇÃO.');
        $this->addReference('041.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (COMPRA E LEILÃO DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À ALIENAÇÃO DEFINITIVA E FIDUCIÁRIA DE BENS IMÓVEIS POR VENDA, CLASSIFICAR NO CÓDIGO 042.11. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('041.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (COMPRA E IMPORTAÇÃO DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À ALIENAÇÃO DEFINITIVA E FIDUCIÁRIA DE VEÍCULOS POR VENDA, CLASSIFICAR NO CÓDIGO 042.12. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('041.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (COMPRA E IMPORTAÇÃO DE ANIMAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À COMPRA E IMPORTAÇÃO DE ANIMAIS UTILIZADOS COMO COBAIAS, CLASSIFICAR NO CÓDIGO 031.12. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('041.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DOAÇÃO E PERMUTA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO DEFINITIVA DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('041.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('041.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('041.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (DOAÇÃO, PERMUTA E TRANSFERÊNCIA DE ANIMAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('041.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DAÇÃO. ADJUDICAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO DEFINITIVA DE BENS IMÓVEIS E DE VEÍCULOS.');
        $this->addReference('041.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (DAÇÃO E ADJUDICAÇÃO DE IMÓVEIS, PARA RECEBIMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('041.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (DAÇÃO E ADJUDICAÇÃO DE VEÍCULOS, PARA RECEBIMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('041.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCRIAÇÃO (AQUISIÇÃO DEFINITIVA DE BENS SEMOVENTES POR PROCRIAÇÃO (ANIMAIS NASCIDOS NO LOCAL DE CRIAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('041.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CESSÃO E COMODATO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO TEMPORÁRIA DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('041.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (CESSÃO E COMODATO DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO AO USO DE DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE, POR SERVIDORES, CLASSIFICAR NO CÓDIGO 043.7.');
        $this->addReference('041.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (CESSÃO E COMODATO DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('041.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (CESSÃO E COMODATO DE ANIMAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.53');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('041.53', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LOCAÇÃO. ARRENDAMENTO MERCANTIL (LEASING). SUBLOCAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO TEMPORÁRIA DE BENS IMÓVEIS E DE VEÍCULOS.');
        $this->addReference('041.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (LOCAÇÃO, ARRENDAMENTO MERCANTIL - LEASING - E SUBLOCAÇÃO DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.61');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO USO DE DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE, POR SERVIDORES, CLASSIFICAR NO CÓDIGO 043.7. QUANTO À LOCAÇÃO TEMPORÁRIA DE SALAS E AUDITÓRIOS PARA REALIZAÇÃO DE EVENTOS, CLASSIFICAR NO CÓDIGO 918. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('041.61', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (LOCAÇÃO, ARRENDAMENTO MERCANTIL - LEASING - E SUBLOCAÇÃO DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('041.62');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('041.62', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ALIENAÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('042');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS REFERENTES ÀS AÇÕES DE ALIENAÇÃO NÃO EFETIVADAS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('042', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VENDA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('042.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (VENDA E LEILÃO DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À ALIENAÇÃO FIDUCIÁRIA COMO GARANTIA DE PROPRIEDADE DE BENS IMÓVEIS, CLASSIFICAR NO CÓDIGO 041.11. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('042.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (VENDA E LEILÃO DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À ALIENAÇÃO FIDUCIÁRIA COMO GARANTIA DE PROPRIEDADE DE VEÍCULOS, CLASSIFICAR NO CÓDIGO 041.12. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('042.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (VENDA E LEILÃO DE ANIMAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('042.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DOAÇÃO E PERMUTA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('042.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (DOAÇÃO E PERMUTA DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('042.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (DOAÇÃO E PERMUTA DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('042.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (DOAÇÃO E PERMUTA DE ANIMAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('042.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DAÇÃO. ADJUDICAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO DEFINITIVA DE BENS IMÓVEIS E DE VEÍCULOS.');
        $this->addReference('042.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (DAÇÃO E ADJUDICAÇÃO DE BENS IMÓVEIS, PARA PAGAMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('042.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (DAÇÃO E ADJUDICAÇÃO DE VEÍCULOS, PARA PAGAMENTO DE PARTE OU TOTALIDADE DE DÍVIDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. CONDICIONAL "ATÉ A QUITAÇÃO TOTAL DA DÍVIDA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA A QUITAÇÃO TOTAL DA DÍVIDA.');
        $this->addReference('042.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESAPROPRIAÇÃO E DESMEMBRAMENTO (ALIENAÇÃO DEFINITIVA DE BENS IMÓVEIS POR DESAPROPRIAÇÃO E POR DESMEMBRAMENTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('042.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CESSÃO E COMODATO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ALIENAÇÃO TEMPORÁRIA DE BENS IMÓVEIS, DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('042.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS IMÓVEIS (CESSÃO E COMODATO DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('042.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (CESSÃO E COMODATO DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('042.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (CESSÃO E COMODATO DE ANIMAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.53');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('042.53', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LOCAÇÃO. ARRENDAMENTO. SUBLOCAÇÃO (ALIENAÇÃO TEMPORÁRIA DE BENS IMÓVEIS POR LOCAÇÃO, POR ARRENDAMENTO E POR SUBLOCAÇÃO, BEM COMO OS TERMOS DE PERMISSÃO REMUNERADA DE USO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('042.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BAIXA. DESFAZIMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À BAIXA E DESFAZIMENTO DE VEÍCULOS E DE BENS SEMOVENTES.');
        $this->addReference('042.7', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VEÍCULOS (DOCUMENTOS REFERENTES À BAIXA E DESFAZIMENTO DE VEÍCULOS, QUANDO O MESMO É RETIRADO DE CIRCULAÇÃO, POR SER IRRECUPERÁVEL E INSERVÍVEL, DEFINITIVAMENTE DESMONTADO, SINISTRADO COM LAUDO DE PERDA TOTAL, VENDIDO OU LEILOADO COMO SUCATA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.71');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('042.71', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('BENS SEMOVENTES (BAIXA DE ANIMAIS POR INCAPACIDADE, INAPTIDÃO, INVALIDEZ, MORTE, SACRIFÍCIO E APOSENTADORIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('042.72');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('042.72', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADMINISTRAÇÃO CONDOMINIAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('043');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS NECESSÁRIOS PARA A ADMINISTRAÇÃO, O REGISTRO E O CONTROLE DOS BENS PATRIMONIAIS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('043', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REGISTRO DOS IMÓVEIS (INCLUEM-SE OS DOCUMENTOS REFERENTES À IDENTIFICAÇÃO E AO REGISTRO DOS IMÓVEIS, TAIS COMO: TÍTULO DE PROPRIEDADE, ESCRITURAS, CERTIDÕES, PLANTAS E PROJETOS ARQUITETÔNICOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(3);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('043.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇOS DE CONDOMÍNIO (PAGAMENTO DE DESPESAS CONDOMINIAIS DOS IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À DOCUMENTAÇÃO NORMATIVA, COMO CONVENÇÃO DE CONDOMÍNIO, REGULAMENTO INTERNO E ATAS DE ASSEMBLEIAS, CLASSIFICAR NO CÓDIGO 040.01. QUANTO AO PAGAMENTO DE TAXAS E TRIBUTOS, COMO O IMPOSTO PREDIAL E TERRITORIAL URBANO E A TAXA DE INCÊNDIO, CLASSIFICAR NO CÓDIGO 059.2. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('043.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REINTEGRAÇÃO DE POSSE. REIVINDICAÇÃO DE DOMÍNIO. DESPEJO DE PERMISSIONÁRIO (REINTEGRAÇÃO DE POSSE, À REIVINDICAÇÃO DE DOMÍNIO E AO DESPEJO DE PERMISSIONÁRIO DOS IMÓVEIS DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('043.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TOMBAMENTO (TOMBAMENTO DE IMÓVEIS PERTENCENTES AO ÓRGÃO E ENTIDADE, QUANDO ESTES FOREM DECLARADOS COMO PATRIMÔNIO HISTÓRICO-CULTURAL POR INSTITUIÇÃO COMPETENTE E RESPONSÁVEL POR ESTA ATRIBUIÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A ALIENAÇÃO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUIR A ALIENAÇÃO.');
        $this->addReference('043.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSPEÇÃO PATRIMONIAL (PREVENTIVAS E PERIÓDICAS, INFRAÇÕES VERIFICADAS, REGISTRO DE INVASÕES, GRILAGEM, AÇÕES DE VANDALISMO, OBSTRUÇÃO DE PASSAGEM, OCUPAÇÃO ILEGAL, UTILIZAÇÃO INADEQUADA, CONSTRUÇÃO IRREGULAR E CONSTRUÇÃO NÃO AUTORIZADA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(3);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES ÀS INSPEÇÕES PATRIMONIAIS (PREVENTIVAS E PERIÓDICAS) REALIZADAS NAS PROPRIEDADES DO ÓRGÃO E ENTIDADE, BEM COMO A ENTREGA DE NOTIFICAÇÕES SOBRE AS INFRAÇÕES VERIFICADAS, COMO REGISTRO DE INVASÕES, GRILAGEM, AÇÕES DE VANDALISMO, OBSTRUÇÃO DE PASSAGEM, OCUPAÇÃO ILEGAL, UTILIZAÇÃO INADEQUADA DE IMÓVEL, CONSTRUÇÃO IRREGULAR E CONSTRUÇÃO NÃO AUTORIZADA.');
        $this->addReference('043.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MUDANÇA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À TRANSFERÊNCIA DE BENS MATERIAIS DO ÓRGÃO E ENTIDADE. QUANTO À CONTRATAÇÃO DE SERVIÇOS DE MUDANÇAS, CLASSIFICAR NO CÓDIGO 034.');
        $this->addReference('043.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARA OUTROS IMÓVEIS (MUDANÇA DE BENS MATERIAIS REALIZADA DE UM IMÓVEL PARA OUTRO IMÓVEL DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.61');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('043.61', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DENTRO DO MESMO IMÓVEL (MUDANÇA DE BENS MATERIAIS REALIZADA DENTRO DO MESMO IMÓVEL DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.62');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('043.62', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('USO DE DEPENDÊNCIAS (REQUISIÇÃO E UTILIZAÇÃO, POR SERVIDORES, DE DEPENDÊNCIAS (SALAS E AUDITÓRIOS) DE IMÓVEL DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('043.7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO USO DE DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE, POR TERCEIROS, MEDIANTE CESSÃO E COMODATO, CLASSIFICAR NO CÓDIGO 041.51. QUANTO AO USO DE DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE, POR TERCEIROS, MEDIANTE LOCAÇÃO, ARRENDAMENTO MERCANTIL (LEASING) E SUBLOCAÇÃO, CLASSIFICAR NO CÓDIGO 041.61.');
        $this->addReference('043.7', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADMINISTRAÇÃO DA FROTA DE VEÍCULOS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('044');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS NECESSÁRIOS PARA A ADMINISTRAÇÃO E O CONTROLE DE USO DOS VEÍCULOS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('044', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CADASTRAMENTO, LICENCIAMENTO E EMPLACAMENTO (CADASTRAMENTO, LICENCIAMENTO E EMPLACAMENTO DE VEÍCULOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('044.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO PAGAMENTO DE TAXAS E TRIBUTOS DOS VEÍCULOS, COMO O IMPOSTO SOBRE A PROPRIEDADE DE VEÍCULOS AUTOMOTORES, CLASSIFICAR NO CÓDIGO 059.2. CONDICIONAL "ATÉ A ALIENAÇÃO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUIR A ALIENAÇÃO.');
        $this->addReference('044.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TOMBAMENTO (TOMBAMENTO DE VEÍCULOS, PERTENCENTES AO ÓRGÃO E ENTIDADE, QUANDO SE TORNAM PEÇAS DE EXPOSIÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('044.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A ALIENAÇÃO" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUIR A ALIENAÇÃO.');
        $this->addReference('044.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OCORRÊNCIA DE SINISTROS (DOCUMENTOS REFERENTES A ACIDENTES, EVENTOS INESPERADOS E NÃO PREMEDITADOS OCORRIDOS COM VEÍCULOS PERTENCENTES AO ÓRGÃO E ENTIDADE E COM VEÍCULOS LOCADOS, TAIS COMO: COLISÃO, INCÊNDIO, ROUBO, FURTO, ENCHENTE E ALAGAMENTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('044.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À OCORRÊNCIA DE SINISTROS EM IMÓVEIS DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 046.3. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('044.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE USO (CONTROLE E A UTILIZAÇÃO DE VEÍCULOS, BEM COMO AQUELES REFERENTES À REQUISIÇÃO E AUTORIZAÇÃO PARA USO, DENTRO E FORA DO HORÁRIO DE EXPEDIENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('044.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO CONTROLE DE ENTRADA E SAÍDA DE VEÍCULOS DE VISITANTES E PRESTADORES DE SERVIÇO, CLASSIFICAR NO CÓDIGO 046.4.');
        $this->addReference('044.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ESTACIONAMENTO. GARAGEM (UTILIZAÇÃO DE ESTACIONAMENTO E GARAGEM, DO ÓRGÃO E ENTIDADE, POR VEÍCULOS OFICIAIS E POR VEÍCULOS DOS SERVIDORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('044.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO CONTROLE DE ENTRADA E SAÍDA DE VEÍCULOS DE VISITANTES E DE PRESTADORES DE SERVIÇO, CLASSIFICAR NO CÓDIGO 046.4.');
        $this->addReference('044.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NOTIFICAÇÕES DE INFRAÇÕES E MULTAS (INFRAÇÕES DE TRÂNSITO E MULTAS RELATIVAS AOS VEÍCULOS PERTENCENTES AO ÓRGÃO E ENTIDADE E AOS VEÍCULOS LOCADOS, BEM COMO AQUELES REFERENTES ÀS SINDICÂNCIAS INSTAURADAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('044.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('044.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('045');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('CONTRATAÇÃO DE EMPRESAS PARA A REALIZAÇÃO DE FORNECIMENTO DE SERVIÇOS PÚBLICOS ESSENCIAIS, DE MANUTENÇÃO E REPARO DAS INSTALAÇÕES, DE EXECUÇÃO DE OBRAS, DE VIGILÂNCIA PATRIMONIAL, DE ABASTECIMENTO E MANUTENÇÃO DE VEÍCULOS E DE ASSISTÊNCIA VETERINÁRIA E ADESTRAMENTO DE ANIMAIS A SEREM PRESTADOS SOB O REGIME DE EXECUÇÃO INDIRETA. A CONTRATAÇÃO PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA E INEXIGIBILIDADE DE LICITAÇÃO');
        $this->addReference('045', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SEGURO PATRIMONIAL (CONTRATAÇÃO DE SEGURO PATRIMONIAL PARA OS BENS IMÓVEIS, VEÍCULOS E BENS SEMOVENTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS SEGUROS DESTINADOS AOS SERVIDORES, CLASSIFICAR NO CÓDIGO 023.91. QUANTO AOS SEGUROS DESTINADOS AO TRANSPORTE DE MATERIAL, CLASSIFICAR NO CÓDIGO 034. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FORNECIMENTO DE SERVIÇOS PÚBLICOS ESSENCIAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CONTRATAÇÃO DE EMPRESAS CONCESSIONÁRIAS DE SERVIÇOS PÚBLICOS ESSENCIAIS.');
        $this->addReference('045.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ÁGUA E ESGOTAMENTO SANITÁRIO (SERVIÇO CONTRATADO PARA FORNECIMENTO DE ÁGUA E ESGOTAMENTO SANITÁRIO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GÁS (SERVIÇO CONTRATADO PARA FORNECIMENTO DE GÁS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À AQUISIÇÃO DE GÁS E OUTROS MATERIAIS ENGARRAFADOS DE USO INDUSTRIAL, PARA TRATAMENTO DE ÁGUA, ILUMINAÇÃO E USO MÉDICO, BEM COMO GASES NOBRES PARA USO EM LABORATÓRIO CIENTÍFICO, CLASSIFICAR NO CÓDIGO 031.12. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ENERGIA ELÉTRICA (SERVIÇO CONTRATADO PARA FORNECIMENTO DE ENERGIA ELÉTRICA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MANUTENÇÃO E REPARO DAS INSTALAÇÕES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A EXECUÇÃO DE SERVIÇOS DE MANUTENÇÃO E REPARO DAS INSTALAÇÕES. QUANTO À INSTALAÇÃO, CONSERVAÇÃO E REPARO DOS SISTEMAS ELETRÔNICOS DE MONITORAMENTO E VIGILÂNCIA, CLASSIFICAR NO CÓDIGO 034.');
        $this->addReference('045.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ELEVADORES (SERVIÇO CONTRATADO PARA MANUTENÇÃO E REPARO DE ELEVADORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SISTEMAS CENTRAIS DE AR CONDICIONADO (MANUTENÇÃO E REPARO DE SISTEMAS CENTRAIS DE AR-CONDICIONADO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONTRATAÇÃO DE SERVIÇOS DE MANUTENÇÃO E REPARO DE APARELHO DE AR CONDICIONADO (PORTÁTIL, DE JANELA E SPLIT) E DE CLIMATIZADORES, CLASSIFICAR NO CÓDIGO 034. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SUBESTAÇÕES ELÉTRICAS E GERADORES (MANUTENÇÃO E REPARO DE SUBESTAÇÕES ELÉTRICAS E GERADORES DE ENERGIA ELÉTRICA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSERVAÇÃO PREDIAL (DOCUMENTOS REFERENTES À MANUTENÇÃO BÁSICA DAS INSTALAÇÕES, SERVIÇOS DE LIMPEZA (PISOS, PAREDES E CISTERNAS), JARDINAGEM, IMUNIZAÇÃO, DESINFESTAÇÃO, DEDETIZAÇÃO, MANUTENÇÃO DE PORTÕES, TROCA DE FECHADURAS E CONSERTO DE TORNEIRAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.24');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.24', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO DE OBRAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A EXECUÇÃO DE OBRAS EM BENS IMÓVEIS DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES À PRESTAÇÃO DE CONSULTORIA PARA A REALIZAÇÃO DE OBRAS.');
        $this->addReference('045.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSTRUÇÃO (OBRAS PARA A CONSTRUÇÃO DE IMÓVEIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REFORMA. RECUPERAÇÃO. RESTAURAÇÃO (TROCA DE PISO, REFORMA DE SALA, RECUPERAÇÃO DE RAMPA DE ACESSO, RESTAURAÇÃO DA FACHADA, TROCA DE ENCANAMENTO, TROCA DE FIAÇÃO ELÉTRICA, PINTURA INTERNA E EXTERNA E IMPERMEABILIZAÇÃO DE TELHADO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADAPTAÇÃO DE USO (OBRAS DE ADAPTAÇÃO DE USO DE IMÓVEIS, TOMBADO OU NÃO, INCLUSIVE PARA ACESSIBILIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.33');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.33', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VIGILÂNCIA PATRIMONIAL (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A EXECUÇÃO DE SERVIÇOS DE GUARDA E SEGURANÇA PATRIMONIAL E DE BRIGADA DE INCÊNDIO (BOMBEIRO PROFISSIONAL CIVIL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONTRATAÇÃO DE BOMBEIRO PROFISSIONAL CIVIL COMO AUTÔNOMO, CLASSIFICAR NO CÓDIGO 029.5. QUANTO À CONSTITUIÇÃO DE BRIGADA DE INCÊNDIO, CLASSIFICAR NO CÓDIGO 046.12. QUANTO AOS SISTEMAS ELETRÔNICOS DE MONITORAMENTO E VIGILÂNCIA, CLASSIFICAR NO CÓDIGO 046.2. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ABASTECIMENTO E MANUTENÇÃO DE VEÍCULOS (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA FORNECIMENTO DE SERVIÇOS DE ABASTECIMENTO, CONSERVAÇÃO, MANUTENÇÃO, REPARO, ADAPTAÇÃO, LIMPEZA E INSTALAÇÃO DESTINADOS AOS VEÍCULOS DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À AQUISIÇÃO DE COMBUSTÍVEIS, LUBRIFICANTES E PEÇAS DE REPOSIÇÃO DE FORMA ISOLADA, CLASSIFICAR NO CÓDIGO 031.12. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ASSISTÊNCIA VETERINÁRIA (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA O FORNECIMENTO DE SERVIÇOS DE MEDICINA VETERINÁRIA, COMO VACINAÇÃO, VERMIFUGAÇÃO, ESTERILIZAÇÃO OU CASTRAÇÃO, CONSULTAS E CIRURGIAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADESTRAMENTO (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A EXECUÇÃO DE SERVIÇOS DE ADESTRAMENTO DE ANIMAIS DE TRABALHO, COMO CÃES FAREJADORES E CAVALOS DE MONTARIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('045.7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('045.7', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROTEÇÃO, GUARDA E SEGURANÇA PATRIMONIAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('046');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS ATIVIDADES PARA PROTEÇÃO, GUARDA E SEGURANÇA DAS DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('046', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PREVENÇÃO DE INCÊNDIO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO TREINAMENTO DE PESSOAL, INSTALAÇÃO E MANUTENÇÃO DE EXTINTORES, INSPEÇÕES PERIÓDICAS DOS EQUIPAMENTOS DE COMBATE A INCÊNDIO E CONSTITUIÇÃO DE BRIGADAS VOLUNTÁRIAS DE INCÊNDIO.');
        $this->addReference('046.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO, ELABORAÇÃO E ACOMPANHAMENTO DE PROJETOS (PLANEJAMENTO, ELABORAÇÃO E EXECUÇÃO DE PROJETOS PARA A PREVENÇÃO DE INCÊNDIOS E RELATÓRIOS DE ACOMPANHAMENTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO PLANEJAMENTO, À ELABORAÇÃO E À EXECUÇÃO DE PROJETOS PARA A PREVENÇÃO DE INCÊNDIOS, BEM COMO OS RELATÓRIOS DE ACOMPANHAMENTO.');
        $this->addReference('046.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSTITUIÇÃO DE BRIGADA VOLUNTÁRIA (CONSTITUIÇÃO DE BRIGADA DE INCÊNDIO, COMPOSTA POR SERVIDORES QUE SE APRESENTAM COMO VOLUNTÁRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À CONTRATAÇÃO DE BOMBEIRO PROFISSIONAL CIVIL COMO AUTÔNOMO (PESSOA FÍSICA), CLASSIFICAR NO CÓDIGO 029.5. QUANTO À CONTRATAÇÃO DE EMPRESA TERCEIRIZADA PARA EXECUÇÃO DE SERVIÇOS DE BRIGADA DE INCÊNDIO (BOMBEIRO PROFISSIONAL CIVIL), CLASSIFICAR NO CÓDIGO 045.4.');
        $this->addReference('046.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSTALAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE COMBATE A INCÊNDIO (INSTALAÇÃO E À MANUTENÇÃO DE EQUIPAMENTOS E SISTEMAS DE COMBATE A INCÊNDIO, COMO EXTINTORES, MANGUEIRAS, MACHADOS, LUVAS E CAPACETES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('046.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MONITORAMENTO. VIGILÂNCIA (FUNCIONAMENTO DE SISTEMAS ELETRÔNICOS DE MONITORAMENTO E VIGILÂNCIA QUE UTILIZAM CÂMERAS DE CIRCUITOS FECHADOS DE TELEVISÃO, INSTALADOS NAS DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE, BEM COMO AS GRAVAÇÕES RESULTANTES DO MESMO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À INSTALAÇÃO, CONSERVAÇÃO E REPARO DOS EQUIPAMENTOS, CLASSIFICAR NO CÓDIGO 034. QUANTO À CONTRATAÇÃO DE EMPRESA TERCEIRIZADA PARA EXECUÇÃO DE SERVIÇOS DE GUARDA E SEGURANÇA PATRIMONIAL, CLASSIFICAR NO CÓDIGO 045.4.');
        $this->addReference('046.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OCORRÊNCIA DE SINISTROS (VISTORIAS, SINDICÂNCIAS E PERÍCIAS TÉCNICAS RELATIVAS AO ARROMBAMENTO, INCÊNDIO, EXPLOSÃO, VANDALISMO E DANOS CAUSADOS POR INTEMPÉRIES (RAIO, VENDAVAL E GRANIZO) EM IMÓVEIS DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO EXTRAVIO, ROUBO, DESAPARECIMENTO, FURTO E AVARIA DE MATERIAL PERMANENTE E DE CONSUMO, CLASSIFICAR NO CÓDIGO 033.6. QUANTO À OCORRÊNCIA DE SINISTROS EM VEÍCULOS DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 044.3. QUANTO AO CONTROLE DAS ÁREAS DE ARMAZENAMENTO, CLASSIFICAR NO CÓDIGO 064.2. CONDICIONAL "ATÉ A CONCLUSÃO DO CASO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUSÃO DO CASO.');
        $this->addReference('046.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE PORTARIA (CONTROLE DE ENTRADA E SAÍDA DE PESSOAS, MATERIAIS, VEÍCULOS, VISITANTES E PRESTADORES, PERMISSÃO PARA ENTRADA E PERMANÊNCIA FORA DO HORÁRIO DE EXPEDIENTE, CONTROLE DE ENTREGA E DEVOLUÇÃO DE CHAVES E REGISTRO DE OCORRÊNCIAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('046.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(8);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO CONTROLE DE USO DE VEÍCULOS, CLASSIFICAR NO CÓDIGO 044.4. QUANTO À UTILIZAÇÃO DE ESTACIONAMENTO E GARAGEM, DO ÓRGÃO E ENTIDADE, POR VEÍCULOS OFICIAIS E POR VEÍCULOS DOS SERVIDORES, CLASSIFICAR NO CÓDIGO 044.5. CONDICIONAL "OBSERVAR PARA OS REGISTROS DE OCORRÊNCIAS, O PRAZO TOTAL DE GUARDA DE 10 ANOS" CONVENSIONADO PARA 8 ANOS NO INTERMEDIÁRIO.');
        $this->addReference('046.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE BENS PATRIMONIAIS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('047');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO ACOMPANHAMENTO E AO CONTROLE DE BENS PATRIMONIAIS, QUE SUBSIDIAM A ELABORAÇÃO DOS INVENTÁRIOS.');
        $this->addReference('047', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMISSÃO DE INVENTÁRIO (INCLUEM-SE OS DOCUMENTOS REFERENTES À CONSTITUIÇÃO DAS COMISSÕES DE INVENTÁRIO, BEM COMO AQUELES REFERENTES À DEFINIÇÃO DOS PROCEDIMENTOS PARA A REALIZAÇÃO DOS MESMOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('047.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('047.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVENTÁRIO DE BENS IMÓVEIS (LEVANTAMENTO DA SITUAÇÃO DOS IMÓVEIS QUE SE ENCONTRAM EM USO E À VERIFICAÇÃO DA DISPONIBILIDADE DOS IMÓVEIS DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES À EMISSÃO DE RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('047.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('047.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVENTÁRIO DE VEÍCULOS (LEVANTAMENTO DA SITUAÇÃO DOS VEÍCULOS QUE SE ENCONTRAM EM USO E À VERIFICAÇÃO DA DISPONIBILIDADE DOS VEÍCULOS DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES À EMISSÃO DE RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('047.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('047.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVENTÁRIO DE BENS SEMOVENTES (LEVANTAMENTO DOS ANIMAIS QUE SE ENCONTRAM EM USO E À VERIFICAÇÃO DA DISPONIBILIDADE DOS ANIMAIS DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES À EMISSÃO DE RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('047.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('047.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO DE BENS PATRIMONIAIS E DE SERVIÇOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('049');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE GRUPO CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DE BENS PATRIMONIAIS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('049', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RACIONALIZAÇÃO DO USO DE BENS E SERVIÇOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('049.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CRIAÇÃO, DESIGNAÇÃO, GESTÃO, DIVULGAÇÃO E RESULTADOS DA ATUAÇÃO DE GRUPOS DE ESTUDO E DE COMISSÕES DE RACIONALIZAÇÃO DO USO DOS BENS PATRIMONIAIS E DOS SERVIÇOS PÚBLICOS ESSENCIAIS, COMO REDUÇÃO DE USO DE VEÍCULO OFICIAL E A ECONOMIA DE ÁGUA E DE ENERGIA ELÉTRICA.');
        $this->addReference('049.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CRIAÇÃO E ATUAÇÃO DE GRUPOS DE TRABALHO (CRIAÇÃO DE GRUPOS DE TRABALHO E COMISSÕES DE RACIONALIZAÇÃO DO USO DE BENS E SERVIÇOS, REGISTROS DAS DELIBERAÇÕES E TOMADAS DE DECISÃO DEFINIDAS NAS REUNIÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('049.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À CRIAÇÃO DE GRUPOS DE TRABALHO E COMISSÕES DE RACIONALIZAÇÃO DO USO DE BENS E SERVIÇOS, AOS REGISTROS DAS DELIBERAÇÕES E ÀS TOMADAS DE DECISÃO DEFINIDAS NAS REUNIÕES, TAIS COMO: ATO DE INSTITUIÇÃO, REGRAS PARA ATUAÇÃO, DESIGNAÇÃO E SUBSTITUIÇÃO DE MEMBROS, RESOLUÇÕES, ATAS E RELATÓRIOS.');
        $this->addReference('049.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERACIONALIZAÇÃO DE REUNIÕES (DOCUMENTOS REFERENTES À ORGANIZAÇÃO DAS REUNIÕES DOS GRUPOS DE TRABALHOS E DAS COMISSÕES DE RACIONALIZAÇÃO DO USO DE BENS E SERVIÇOS, BEM COMO OS REFERENTES AO AGENDAMENTO, CONVOCAÇÃO, PAUTA E LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('049.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('049.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO ORÇAMENTÁRIA E FINANCEIRA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('050');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA SUBCLASSE CONTEMPLA DOCUMENTOS REFERENTES ÀS ATIVIDADES DE PROGRAMAÇÃO E ELABORAÇÃO DO ORÇAMENTO, À GESTÃO E EXECUÇÃO ORÇAMENTÁRIA E FINANCEIRA, ÀS OPERAÇÕES BANCÁRIAS E AO CONTROLE EXTERNO DAS ATIVIDADES FINANCEIRAS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('050', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DO ORÇAMENTO E DAS FINANÇAS DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('050.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES ÀS DETERMINAÇÕES LEGAIS, AOS ATOS E INSTRUÇÕES NORMATIVAS, AOS PROCEDIMENTOS OPERACIONAIS E ÀS DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DO ORÇAMENTO E DAS FINANÇAS DO ÓRGÃO E ENTIDADE. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('050.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONFORMIDADE DE REGISTRO DE GESTÃO (CONFORMIDADE DIÁRIA E CONFORMIDADE DE SUPORTE DOCUMENTAL, BEM COMO AQUELES QUE COMPROVAM E DÃO SUPORTE ÀS OPERAÇÕES REGISTRADAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('050.02');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À CONFORMIDADE DIÁRIA E À CONFORMIDADE DE SUPORTE DOCUMENTAL, BEM COMO AQUELES QUE COMPROVAM E DÃO SUPORTE ÀS OPERAÇÕES REGISTRADAS. QUANTO À CONSOLIDAÇÃO DOS REGISTROS CONTÁBEIS, CLASSIFICAR EM 052.23. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('050.02', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONFORMIDADE CONTÁBIL (DEMONSTRATIVOS CONTÁBEIS DECORRENTES DOS REGISTROS DA EXECUÇÃO ORÇAMENTÁRIA, FINANCEIRA E PATRIMONIAL, GERADOS POR MEIO DOS SISTEMAS DE ADMINISTRAÇÃO FINANCEIRA DA ADMINISTRAÇÃO PÚBLICA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('050.03');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À CONSOLIDAÇÃO DOS REGISTROS CONTÁBEIS, CLASSIFICAR EM 052.23. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('050.03', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO ORÇAMENTÁRIA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('051');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE OS DOCUMENTOS REFERENTES ÀS ATIVIDADES DE PROGRAMAÇÃO, GESTÃO E EXECUÇÃO DO ORÇAMENTO DO ÓRGÃO E ENTIDADE.');
        $this->addReference('051', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMAÇÃO ORÇAMENTÁRIA (PROGRAMAÇÃO, PREVISÃO E PROPOSTA ORÇAMENTÁRIA, ESTUDOS DE ADEQUAÇÃO DA ESTRUTURA PROGRAMÁTICA, ATUALIZAÇÃO E APERFEIÇOAMENTO DAS INFORMAÇÕES CONSTANTES DO CADASTRO DE AÇÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('051.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('PROGRAMAÇÃO, PREVISÃO E PROPOSTA ORÇAMENTÁRIA, ESTUDOS DE ADEQUAÇÃO DA ESTRUTURA PROGRAMÁTICA, ATUALIZAÇÃO E APERFEIÇOAMENTO DAS INFORMAÇÕES CONSTANTES DO CADASTRO DE AÇÕES, FIXAÇÃO DOS REFERENCIAIS MONETÁRIOS PARA APRESENTAÇÃO DAS PROPOSTAS ORÇAMENTÁRIAS E DOS LIMITES DE MOVIMENTAÇÃO, DE EMPENHO E DE PAGAMENTO DAS UNIDADES ADMINISTRATIVAS DO ÓRGÃO E ENTIDADE. ELIMINAR, APÓS 2 ANOS, DOCUMENTOS CUJAS INFORMAÇÕES SOBRE PREVISÃO ORÇAMENTÁRIA ENCONTREM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS.');
        $this->addReference('051.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DETALHAMENTO DE DESPESA (ESTABELECIMENTO DAS METAS E DESTINAÇÃO DE RECURSOS E RECEITAS POR FONTES, DETALHAMENTO, A NÍVEL OPERACIONAL, DOS PROJETOS E ATIVIDADES A SEREM DESENVOLVIDAS, ESPECIFICANDO OS ELEMENTOS DE DESPESA E RESPECTIVOS DESDOBRAMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('051.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('051.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO ORÇAMENTÁRIA (MOVIMENTAÇÃO, INTERNA E EXTERNA, E À DESCENTRALIZAÇÃO DE CRÉDITOS ORÇAMENTÁRIOS PELO ÓRGÃO E ENTIDADE, BEM COMO AS TRANSFERÊNCIAS, PROVISÕES, DESTAQUES, ESTORNOS E SUBVENÇÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('051.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('051.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RETIFICAÇÃO ORÇAMENTÁRIA. CRÉDITOS ADICIONAIS (DOCUMENTOS REFERENTES ÀS AUTORIZAÇÕES DE DESPESAS NÃO COMPUTADAS, OU INSUFICIENTEMENTE DOTADAS, NA LEI ORÇAMENTÁRIA, POR MEIO DA LIBERAÇÃO DE CRÉDITOS SUPLEMENTARES, ESPECIAIS E EXTRAORDINÁRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('051.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('051.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO FINANCEIRA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('052');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS ATIVIDADES DE PROGRAMAÇÃO, GESTÃO E EXECUÇÃO FINANCEIRA DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES AO CONTROLE DA EFETIVA ENTRADA E SAÍDA DE RECURSOS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('052', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMAÇÃO FINANCEIRA (ENTRADA E SAÍDA DE RECURSOS FINANCEIROS, PREVISÃO DA UTILIZAÇÃO DOS RECURSOS E OPERACIONALIZAÇÃO DE GASTOS ESPECÍFICOS VISANDO A REALIZAÇÃO DAS ATIVIDADES E PROJETOS ATRIBUÍDOS ÀS UNIDADES ORÇAMENTÁRIAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('PROGRAMAÇÃO DA ENTRADA E DA SAÍDA DE RECURSOS FINANCEIROS, PREVISÃO DA UTILIZAÇÃO DOS RECURSOS DESTINADOS A DETERMINADOS FINS E OPERACIONALIZAÇÃO DE GASTOS ESPECÍFICOS VISANDO A REALIZAÇÃO DAS ATIVIDADES E PROJETOS ATRIBUÍDOS ÀS UNIDADES ORÇAMENTÁRIAS. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO FINANCEIRA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO CONTROLE DA ENTRADA E SAÍDA DE RECURSOS FINANCEIROS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('052.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECEITA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS INGRESSOS DE RECURSOS NOS COFRES DA ADMINISTRAÇÃO PÚBLICA, QUE SE DESDOBRAM EM RECEITAS ORÇAMENTÁRIAS, QUANDO REPRESENTAM DISPONIBILIDADES DE RECURSOS FINANCEIROS PARA O ERÁRIO, E EM INGRESSOS EXTRAORÇAMENTÁRIOS, QUANDO REPRESENTAM ENTRADAS COMPENSATÓRIAS.');
        $this->addReference('052.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECEITA CORRENTE (PROVENIENTES DE TRIBUTOS, DE CONTRIBUIÇÕES, DA EXPLORAÇÃO DO PATRIMÔNIO ESTATAL, DA EXPLORAÇÃO DE ATIVIDADES ECONÔMICAS E DE RECURSOS FINANCEIROS RECEBIDOS DE OUTRAS PESSOAS DE DIREITO PÚBLICO OU PRIVADO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.211');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO ESTABELECIMENTO DE PREÇOS E TARIFAS PELA PRESTAÇÃO DE SERVIÇOS POR PARTE DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 059.3. QUANTO À DEVOLUÇÃO AO ERÁRIO, CLASSIFICAR NO CÓDIGO 059.4. QUANTO À RESTITUIÇÃO DE RENDAS ARRECADADAS, CLASSIFICAR NO CÓDIGO 059.5. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.211', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECEITA DE CAPITAL (PROVENIENTES DE RECURSOS FINANCEIROS ORIUNDOS DA CONSTITUIÇÃO DE DÍVIDAS, DA CONVERSÃO, EM ESPÉCIE, DE BENS E DIREITOS, DA VENDA DE AÇÕES E DO RECEBIMENTO DE RECURSOS DE OUTRAS PESSOAS DE DIREITO PÚBLICO OU PRIVADO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.212');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('DESTINADAS A ATENDER DESPESAS DE CAPITAL E AO SUPERÁVIT DO ORÇAMENTO CORRENTE. QUANTO À COMPRA E SUBSCRIÇÃO DE AÇÕES, CLASSIFICAR NO CÓDIGO 059.1. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.212', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INGRESSO EXTRAORÇAMENTÁRIO (RECURSOS DE CARÁTER TEMPORÁRIO, QUE NÃO ESTÃO PREVISTOS, COMO OS DEPÓSITOS EM CAUÇÃO, AS FIANÇAS, A ANTECIPAÇÃO DE RECEITA ORÇAMENTÁRIA, A EMISSÃO DE MOEDA E AS ENTRADAS COMPENSATÓRIAS NO ATIVO E PASSIVO FINANCEIRO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.213');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.213', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESPESA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À UTILIZAÇÃO DE RECURSOS, FIXADOS E ESPECIFICADOS NA LEI ORÇAMENTÁRIA ANUAL (LOA), PARA PAGAMENTO DAS DESPESAS EFETUADAS PELO ÓRGÃO E ENTIDADE.');
        $this->addReference('052.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESPESA CORRENTE (UTILIZAÇÃO DOS RECURSOS PROVENIENTES DAS DOTAÇÕES ORÇAMENTÁRIAS ORDINÁRIAS DESTINADAS À MANUTENÇÃO CONTÍNUA DOS SERVIÇOS PÚBLICOS, COMO AS DESPESAS DE CUSTEIO RESERVADAS AO PAGAMENTO DE PESSOAL E DOS ENCARGOS SOCIAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.221');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('DESPESAS DE COMPRA DE MATERIAL DE CONSUMO, CLASSIFICAR NO CÓDIGO 031.12. DESPESAS DE CONTRATAÇÃO DE EMPRESAS PARA A PRESTAÇÃO DE SERVIÇOS, CLASSIFICAR NOS CÓDIGOS 018, 034, 045.1, 045.2, 045.4, 045.5, 045.6, 045.7, 067, 071 E 918, DE ACORDO COM O OBJETO DA CONTRATAÇÃO. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.221', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESPESA DE CAPITAL (UTILIZAÇÃO DOS RECURSOS PROVENIENTES DAS DOTAÇÕES ORÇAMENTÁRIAS ORDINÁRIAS DESTINADAS AOS INVESTIMENTOS, ÀS INVERSÕES FINANCEIRAS E À AMORTIZAÇÃO DA DÍVIDA INTERNA E EXTERNA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.222');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('DESPESAS DE COMPRA DE MATERIAL PERMANENTE, CLASSIFICAR NO CÓDIGO 031.11. DESPESAS DE COMPRA DE BENS IMÓVEIS, CLASSIFICAR NO CÓDIGO 041.11. DESPESAS DECORRENTES DA CONTRATAÇÃO DE EMPRESAS PARA A EXECUÇÃO DE OBRAS EM IMÓVEIS, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 045.3. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.222', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DEMONSTRAÇÃO CONTÁBIL (LIVRO-RAZÃO, BALANÇO PATRIMONIAL, ORÇAMENTÁRIO E FINANCEIRO, DEMONSTRAÇÃO DAS VARIAÇÕES PATRIMONIAIS, DEMONSTRAÇÕES DOS FLUXOS DE CAIXA, DAS MUTAÇÕES DO PATRIMÔNIO LÍQUIDO E DO RESULTADO ECONÔMICO E BALANCETES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE OS DOCUMENTOS REFERENTES À CONSOLIDAÇÃO DOS REGISTROS CONTÁBEIS. QUANTO À CONFORMIDADE DE REGISTRO DE GESTÃO, CLASSIFICAR NO CÓDIGO 050.02. QUANTO À CONFORMIDADE CONTÁBIL, CLASSIFICAR NO CÓDIGO 050.03. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE FUNDOS ESPECIAIS (ADMINISTRAÇÃO DE RECEITAS ESPECÍFICAS VINCULADAS POR LEI À REALIZAÇÃO DE DETERMINADOS OBJETIVOS OU SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.24');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.24', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCESSÃO DE BENEFÍCIOS, ESTÍMULOS E INCENTIVOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.25');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS BENEFÍCIOS, ESTÍMULOS E INCENTIVOS CONCEDIDOS AO ÓRGÃO E ENTIDADE.');
        $this->addReference('052.25', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FINANCEIROS (DESEMBOLSOS EFETIVOS REALIZADOS POR MEIO DAS EQUALIZAÇÕES DE JUROS E PREÇOS, ASSUNÇÃO DAS DÍVIDAS DECORRENTES DE SALDOS DE OBRIGAÇÕES DE RESPONSABILIDADE DO TESOURO NACIONAL, CUJOS VALORES CONSTAM DA LEI ORÇAMENTÁRIA DA UNIÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.251');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.251', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CREDITÍCIOS (SUBSÍDIOS, INCENTIVOS FISCAIS, INVESTIMENTOS DESTINADOS AO FINANCIAMENTO DE ATIVIDADES PRODUTIVAS E AO DESENVOLVIMENTO ECONÔMICO E GASTOS DECORRENTES DE PROGRAMAS OFICIAIS DE CRÉDITO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('052.252');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('SUBSÍDIOS, INCENTIVOS FISCAIS, INVESTIMENTOS DESTINADOS AO FINANCIAMENTO DE ATIVIDADES PRODUTIVAS E AO DESENVOLVIMENTO ECONÔMICO, GASTOS DECORRENTES DE PROGRAMAS OFICIAIS DE CRÉDITO, OPERACIONALIZADOS POR FUNDOS OU PROGRAMAS COM TAXA DE JUROS INFERIOR AO CUSTO DE CAPTAÇÃO. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('052.252', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERAÇÃO BANCÁRIA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('053');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS OPERAÇÕES DE CONCILIAÇÃO BANCÁRIA, AOS PAGAMENTOS EM MOEDA ESTRANGEIRA E À MOVIMENTAÇÃO DE CONTA ÚNICA DO TESOURO NACIONAL E DE OUTRAS CONTAS CORRENTES.');
        $this->addReference('053', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCILIAÇÃO BANCÁRIA (CONCILIAÇÕES DAS CONTAS CORRENTES E CONTÁBEIS, COM O CONTROLE FINANCEIRO INTERNO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('053.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('053.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PAGAMENTO EM MOEDA ESTRANGEIRA (PAGAMENTOS EM MOEDAS DIFERENTES DA MOEDA NACIONAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('053.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('053.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DA CONTA ÚNICA (TRANSFERÊNCIA DE RECURSOS RECEBIDOS NA REDE BANCÁRIA PARA A CONTA ÚNICA, COM OS CRÉDITOS DAS RESPECTIVAS UNIDADES GESTORAS, BEM COMO AQUELES REFERENTES ÀS ASSINATURAS AUTORIZADAS, ÀS ORDENS BANCÁRIAS E AOS EXTRATOS DE CONTAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('053.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('053.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE CONTAS CORRENTES BANCÁRIAS: TIPO A, B, C, D E E (DOCUMENTOS REFERENTES À ABERTURA, MOVIMENTAÇÃO E ENCERRAMENTO DAS CONTAS CORRENTES, BEM COMO AQUELES REFERENTES ÀS ASSINATURAS AUTORIZADAS, ÀS ORDENS BANCÁRIAS E AOS EXTRATOS DE CONTAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('053.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('053.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE CONTAS ESPECIAIS (MOVIMENTAÇÃO DOS RECURSOS ADVINDOS DE EMPRÉSTIMOS E CRÉDITOS EXTERNOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('053.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('053.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE EXTERNO. AUDITORIA EXTERNA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('054');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS AUDITORIAS DE CONTAS DO ÓRGÃO E ENTIDADE, REALIZADAS PELOS ÓRGÃOS DE CONTROLE EXTERNO. QUANTO AO CONTROLE INTERNO E À AUDITORIA INTERNA, CLASSIFICAR NO CÓDIGO 003.1.');
        $this->addReference('054', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRESTAÇÃO DE CONTAS. TOMADA DE CONTAS (PRESTAÇÃO E TOMADA DE CONTAS REALIZADAS EM RAZÃO DA SOLICITAÇÃO DO ÓRGÃO RESPONSÁVEL PELA AUDITORIA DAS CONTAS DA ADMINISTRAÇÃO PÚBLICA, BEM COMO OS RELATÓRIOS, PARECERES E CERTIFICADOS DE JULGAMENTO DAS CONTAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('054.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('054.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TOMADA DE CONTAS ESPECIAL (DOCUMENTOS REFERENTES À INSTAURAÇÃO DE TOMADA DE CONTAS ESPECIAL PELO ÓRGÃO RESPONSÁVEL PELA AUDITORIA DAS CONTAS DA ADMINISTRAÇÃO PÚBLICA, BEM COMO OS RELATÓRIOS, PARECERES E CERTIFICADOS DE JULGAMENTO DAS CONTAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('054.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('054.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO ORÇAMENTÁRIA E FINANCEIRA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('059');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO ORÇAMENTÁRIA E FINANCEIRA NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('059', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPRA E SUBSCRIÇÃO DE AÇÕES (COMPRA E AO DIREITO DE SUBSCREVER AÇÕES DAS SOCIEDADES DE ECONOMIA MISTA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('059.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO À VENDA DE AÇÕES, CLASSIFICAR NO CÓDIGO 052.212. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('059.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECOLHIMENTO DE TRIBUTOS, IMPOSTOS E TAXAS (RECOLHIMENTO, PELO ÓRGÃO E ENTIDADE, DE TRIBUTOS, IMPOSTOS E TAXAS, COMO O IMPOSTO PREDIAL E TERRITORIAL URBANO, A TAXA DE INCÊNDIO E O IMPOSTO SOBRE A PROPRIEDADE DE VEÍCULOS AUTOMOTORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('059.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO PAGAMENTO DOS ENCARGOS PATRONAIS E RECOLHIMENTOS EFETUADOS PELO EMPREGADOR, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 023.18. QUANTO AO PAGAMENTO DAS DESPESAS CONDOMINIAIS DOS BENS IMÓVEIS, CLASSIFICAR NO CÓDIGO 043.2. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('059.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FIXAÇÃO DE CUSTOS DE SERVIÇOS (ESTABELECIMENTO DE PREÇOS E TARIFAS PELA PRESTAÇÃO DE SERVIÇOS POR PARTE DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('059.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AO RECEBIMENTO DE RECURSOS FINANCEIROS RECEBIDOS DA PRESTAÇÃO DE SERVIÇOS POR PARTE DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 052.211. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('059.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DEVOLUÇÃO AO ERÁRIO (RESTITUIÇÃO AO ERÁRIO DE VALORES PERCEBIDOS INDEVIDAMENTE PELO SERVIDOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('059.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS PEDIDOS DE RETIFICAÇÃO DE PAGAMENTO FEITOS PELO SERVIDOR, CLASSIFICAR NO CÓDIGO 023.191. QUANTO À RECEITA CORRENTE, CLASSIFICAR NO CÓDIGO 052.211. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('059.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RESTITUIÇÃO DE RENDAS ARRECADADAS (SOLICITAÇÃO DE RESTITUIÇÃO, TOTAL OU PARCIAL, AO CIDADÃO, DE RECEITAS RECOLHIDAS A MAIOR OU INDEVIDAMENTE, POR MEIO DE GUIA DE RECOLHIMENTO DA UNIÃO - GRU)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('059.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À RECEITA CORRENTE, CLASSIFICAR NO CÓDIGO 052.211. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('059.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DA DOCUMENTAÇÃO E DA INFORMAÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('060');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA SUBCLASSE CONTEMPLA DOCUMENTOS REFERENTES À PRODUÇÃO, CONTROLE, CLASSIFICAÇÃO, AVALIAÇÃO, DESTINAÇÃO E TRATAMENTO TÉCNICO DA DOCUMENTAÇÃO ARQUIVÍSTICA, À AQUISIÇÃO, PROCESSAMENTO TÉCNICO, CONTROLE, DISTRIBUIÇÃO E ACESSO AOS ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO, BEM COMO AQUELES REFERENTES À CONSERVAÇÃO E PRESERVAÇÃO DE ACERVOS, À PRODUÇÃO EDITORIAL E À GESTÃO DE SISTEMAS E DE INFRAESTRUTURA TECNOLÓGICA DO ÓRGÃO E ENTIDADE.');
        $this->addReference('060', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DA DOCUMENTAÇÃO E DA INFORMAÇÃO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('060.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('060.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE DOCUMENTOS DE ARQUIVO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('061');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESSE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À ELABORAÇÃO E IMPLANTAÇÃO DE PROGRAMAS DE GESTÃO DA DOCUMENTAÇÃO ARQUIVÍSTICA.');
        $this->addReference('061', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSTITUIÇÃO DA COMISSÃO PERMANENTE DE AVALIAÇÃO DE DOCUMENTOS (CPAD)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS PARA A CONSTITUIÇÃO E ATUAÇÃO DA COMISSÃO.');
        $this->addReference('061.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPOSIÇÃO E ATUAÇÃO (CONSTITUIÇÃO DA CPAD, À INDICAÇÃO, DESIGNAÇÃO E SUBSTITUIÇÃO DE MEMBROS E À INSTALAÇÃO E POSSE DA COMISSÃO, BEM COMO AQUELES REFERENTES AO REGISTRO DAS DELIBERAÇÕES E ÀS TOMADAS DE DECISÕES, RESOLUÇÕES, ATAS E RELATÓRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.011');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.011', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OPERACIONALIZAÇÃO DE REUNIÕES (ORGANIZAÇÃO DAS REUNIÕES DA CPAD, BEM COMO AQUELES REFERENTES AO AGENDAMENTO, CONVOCAÇÃO, PAUTA E LISTA DE PARTICIPANTES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.012');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.012', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADOÇÃO E CONTROLE DOS PROCEDIMENTOS DE PROTOCOLO (CONTROLE DA ENTRADA, DA DISTRIBUIÇÃO, DA MOVIMENTAÇÃO E DA EXPEDIÇÃO DE DOCUMENTOS, BEM COMO AQUELES REFERENTES AOS PROCEDIMENTOS PARA AUTUAÇÃO DOS DOCUMENTOS AVULSOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ANÁLISE DA SITUAÇÃO ARQUIVÍSTICA (REALIZAÇÃO DE DIAGNÓSTICO DA SITUAÇÃO DOS SERVIÇOS DE GESTÃO DE DOCUMENTOS DE ARQUIVO DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LEVANTAMENTO DA PRODUÇÃO E DO FLUXO DOCUMENTAL (ESTUDO E AO LEVANTAMENTO DA PRODUÇÃO E DO FLUXO DOCUMENTAL PARA SUBSIDIAR A ELABORAÇÃO DOS INSTRUMENTOS TÉCNICOS DE GESTÃO DE DOCUMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A FINALIZAÇÃO DA ELABORAÇÃO DOS INSTRUMENTOS" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA FINALIZAÇÃO.');
        $this->addReference('061.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ELABORAÇÃO DOS INSTRUMENTOS TÉCNICOS DE GESTÃO DE DOCUMENTOS (ELABORAÇÃO DO CÓDIGO DE CLASSIFICAÇÃO E DA TABELA DE TEMPORALIDADE E DESTINAÇÃO DE DOCUMENTOS DE ARQUIVO RELATIVOS ÀS ATIVIDADES-FIM DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, 2 ANOS APÓS A FINALIZAÇÃO DA ELABORAÇÃO, AS VERSÕES PRELIMINARES DOS INSTRUMENTOS, ASSIM COMO OS DEMAIS EXEMPLARES QUANDO OCORREREM ATUALIZAÇÕES. CONDICIONAL "ATÉ A FINALIZAÇÃO DA ELABORAÇÃO DOS INSTRUMENTOS" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA FINALIZAÇÃO.');
        $this->addReference('061.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('APLICAÇÃO DOS INSTRUMENTOS TÉCNICOS DE GESTÃO DE DOCUMENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À APLICAÇÃO DO CÓDIGO DE CLASSIFICAÇÃO E DA TABELA DE TEMPORALIDADE E DESTINAÇÃO DE DOCUMENTOS DE ARQUIVO RELATIVOS ÀS ATIVIDADES-MEIO E ATIVIDADES-FIM DO ÓRGÃO E ENTIDADE.');
        $this->addReference('061.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CLASSIFICAÇÃO (PROCEDIMENTOS PARA APLICAÇÃO DOS CÓDIGOS DE CLASSIFICAÇÃO DE DOCUMENTOS DE ARQUIVO RELATIVOS ÀS ATIVIDADES-MEIO E ATIVIDADES-FIM DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES À METODOLOGIA UTILIZADA PARA A ORDENAÇÃO DOS DOCUMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS PARA APLICAÇÃO DOS PRAZOS DE GUARDA E DA DESTINAÇÃO FINAL DEFINIDOS NAS TABELAS DE TEMPORALIDADE E DESTINAÇÃO DE DOCUMENTOS DE ARQUIVO RELATIVAS ÀS ATIVIDADES-MEIO E ATIVIDADES-FIM DO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES À METODOLOGIA UTILIZADA PARA A SELEÇÃO DOS DOCUMENTOS.');
        $this->addReference('061.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ELIMINAÇÃO (PROCEDIMENTOS PARA ANÁLISE E SELEÇÃO DE DOCUMENTOS DE ARQUIVO, BEM COMO AQUELES REFERENTES À ELABORAÇÃO DE LISTAGENS DE ELIMINAÇÃO, DE PLANOS DE DESTINAÇÃO, DE EDITAIS DE CIÊNCIA DE ELIMINAÇÃO E DE TERMOS DE ELIMINAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.521');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.521', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TRANSFERÊNCIA (PROCEDIMENTOS PARA CONTROLE DA PASSAGEM DE DOCUMENTOS DO ARQUIVO CORRENTE (ARQUIVOS SETORIAIS) PARA O ARQUIVO INTERMEDIÁRIO (ARQUIVO CENTRAL OU GERAL), TAIS COMO: LISTAGEM DESCRITIVA DO ACERVO, GUIA E TERMO DE TRANSFERÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.522');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.522', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECOLHIMENTO (PROCEDIMENTOS PARA CONTROLE DA PASSAGEM DE DOCUMENTOS DO ARQUIVO INTERMEDIÁRIO PARA O ARQUIVO PERMANENTE, TAIS COMO: LISTAGEM DESCRITIVA DO ACERVO, GUIA E TERMO DE RECOLHIMENTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('061.523');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('061.523', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('062');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO, INCORPORAÇÃO, PROCESSAMENTO TÉCNICO, INVENTÁRIO E DESINCORPORAÇÃO DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO.');
        $this->addReference('062', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AQUISIÇÃO E INCORPORAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS REFERENTES ÀS AÇÕES DE AQUISIÇÃO E INCORPORAÇÃO NÃO EFETIVADAS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AQUISIÇÃO, NO BRASIL E EXTERIOR, E À INCORPORAÇÃO DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO PELO ÓRGÃO E ENTIDADE.');
        $this->addReference('062.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('COMPRA (AQUISIÇÃO DEFINITIVA DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO POR COMPRA E POR IMPORTAÇÃO, BEM COMO AQUELES REFERENTES À ASSINATURA DE PERIÓDICOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('A COMPRA PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA DE LICITAÇÃO E INEXIGIBILIDADE DE LICITAÇÃO. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('062.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DOAÇÃO (AQUISIÇÃO DEFINITIVA DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO POR DOAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À DOAÇÃO DA PRODUÇÃO EDITORIAL DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 065.3. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('062.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PERMUTA (AQUISIÇÃO DEFINITIVA DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO POR PERMUTA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À PERMUTA DA PRODUÇÃO EDITORIAL DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 065.3 UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('062.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSAMENTO TÉCNICO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS ADOTADOS PARA O TRATAMENTO TÉCNICO DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO DO ÓRGÃO E ENTIDADE.');
        $this->addReference('062.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REGISTRO (REGISTRO DE ENTRADA DO ITEM BIBLIOGRÁFICO OU MUSEOLÓGICO INCORPORADO AOS ACERVOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('062.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CATALOGAÇÃO, CLASSIFICAÇÃO E INDEXAÇÃO (IDENTIFICAÇÃO, CLASSIFICAÇÃO E DESCRIÇÃO DO ITEM BIBLIOGRÁFICO OU MUSEOLÓGICO, CUJAS INFORMAÇÕES SUBSIDIARÃO A ELABORAÇÃO DAS FICHAS CATALOGRÁFICAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('062.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INVENTÁRIO (CONTROLE DE ITENS DOS ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO QUE VISAM APOIAR AS ATIVIDADES DE ALIENAÇÃO, DESINCORPORAÇÃO E BAIXA, BEM COMO OS RELATÓRIOS DE INVENTÁRIO E OS LIVROS DE TOMBO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('QUANTO AOS INVENTÁRIOS DE MATERIAL PERMANENTE E DE CONSUMO, CLASSIFICAR NOS CÓDIGOS 036.1 E 036.2, RESPECTIVAMENTE. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('062.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESINCORPORAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À DESINCORPORAÇÃO DEFINITIVA DE ITENS DOS ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO PELO ÓRGÃO E ENTIDADE.');
        $this->addReference('062.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DOAÇÃO (DOAÇÃO DE ITENS DE ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO CONSIDERADOS INADEQUADOS E OBSOLETOS, BEM COMO DAQUELES QUE POSSUEM VÁRIOS EXEMPLARES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.41');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('062.41', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESCARTE (DESCARTE DE ITENS DOS ACERVOS BIBLIOGRÁFICO E MUSEOLÓGICO QUE SE ENCONTRAM INFECTADOS, DETERIORADOS E MUTILADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('062.42');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(4);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('062.42', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE ACESSO E DE MOVIMENTAÇÃO DE ACERVOS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('063');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO ACESSO, ÀS CONSULTAS E AOS EMPRÉSTIMOS DE DOCUMENTOS ARQUIVÍSTICOS, BIBLIOGRÁFICOS E MUSEOLÓGICOS, BEM COMO AQUELES REFERENTES AO CONTROLE DA MOVIMENTAÇÃO DOS ACERVOS.');
        $this->addReference('063', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSULTAS (ACESSO E AO CONTROLE DAS CONSULTAS AOS DOCUMENTOS ARQUIVÍSTICOS, BIBLIOGRÁFICOS E MUSEOLÓGICOS, BEM COMO AQUELES REFERENTES AO REGISTRO DOS CONSULENTES E USUÁRIOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('063.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS PEDIDOS DE ACESSO À INFORMAÇÃO E AOS DOCUMENTOS INSTITUCIONAIS, ENCAMINHADOS AO SIC, CLASSIFICAR NO CÓDIGO 002.11.');
        $this->addReference('063.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EMPRÉSTIMOS (CONTROLE DOS EMPRÉSTIMOS DE DOCUMENTOS ARQUIVÍSTICOS, BIBLIOGRÁFICOS E MUSEOLÓGICOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('063.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A DEVOLUÇÃO" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA DEVOLUÇÃO.');
        $this->addReference('063.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOVIMENTAÇÃO DE ACERVOS (GESTÃO DE DEPÓSITOS E CONTROLE DA LOCALIZAÇÃO E DA MOVIMENTAÇÃO DOS DOCUMENTOS ARQUIVÍSTICOS, BIBLIOGRÁFICOS E MUSEOLÓGICOS ENTRE AS ÁREAS DE ARMAZENAMENTO E AS ÁREAS DESTINADAS ÀS CONSULTAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('063.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('063.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSERVAÇÃO E PRESERVAÇÃO DE ACERVOS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('064');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À DESINFESTAÇÃO, HIGIENIZAÇÃO E CONTROLE DAS ÁREAS DE ARMAZENAMENTO, À ENCADERNAÇÃO E À REFORMATAÇÃO E RESTAURAÇÃO DOS DOCUMENTOS.');
        $this->addReference('064', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO E MONITORAMENTO (ELABORAÇÃO DE DIAGNÓSTICOS, RELATÓRIOS E PARECERES TÉCNICOS SOBRE AS CONDIÇÕES DE CONSERVAÇÃO E PRESERVAÇÃO DE ACERVOS E FICHAS DE REGISTRO DO TRATAMENTO ADOTADO PARA A RESTAURAÇÃO OU ENCADERNAÇÃO DE DOCUMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À ELABORAÇÃO DE DIAGNÓSTICOS, RELATÓRIOS E PARECERES TÉCNICOS SOBRE AS CONDIÇÕES DE CONSERVAÇÃO E PRESERVAÇÃO DE ACERVOS E FICHAS DE REGISTRO DO TRATAMENTO ADOTADO PARA A RESTAURAÇÃO OU ENCADERNAÇÃO DE DOCUMENTOS, BEM COMO AQUELES REFERENTES AO PLANO DE PREVENÇÃO DE RISCOS E À DEFINIÇÃO DOS CRITÉRIOS ADOTADOS PARA A REFORMATAÇÃO DE ACERVOS. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('064.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESINFESTAÇÃO E HIGIENIZAÇÃO (PROCEDIMENTOS PARA DESINFESTAÇÃO E HIGIENIZAÇÃO DAS ÁREAS DE ARMAZENAMENTO DE ACERVOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('064.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DAS ÁREAS DE ARMAZENAMENTO (PROCEDIMENTOS PARA CONTROLE DA CLIMATIZAÇÃO E DA SEGURANÇA DOS DEPÓSITOS DE GUARDA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À OCORRÊNCIA DE SINISTROS EM IMÓVEIS DO ÓRGÃO E ENTIDADE, CLASSIFICAR NO CÓDIGO 046.3. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('064.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REFORMATAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROCEDIMENTOS PARA A ADOÇÃO DA REFORMATAÇÃO DE ACERVOS. QUANTO AO FORNECIMENTO DE CÓPIAS DE DOCUMENTOS, CLASSIFICAR NO CÓDIGO 069.2.');
        $this->addReference('064.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MICROFILMAGEM (PROCEDIMENTOS ADOTADOS PARA MICROFILMAGEM DE DOCUMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('064.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DIGITALIZAÇÃO (PROCEDIMENTOS ADOTADOS PARA DIGITALIZAÇÃO DE DOCUMENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('064.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RESTAURAÇÃO (PROCEDIMENTOS ADOTADOS PARA REALIZAÇÃO DE RESTAURAÇÃO DE DOCUMENTOS DETERIORADOS OU DANIFICADOS, BEM COMO AQUELES REFERENTES AOS SERVIÇOS DE ENCADERNAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('064.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('064.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRODUÇÃO EDITORIAL');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('065');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AOS PROJETOS DE PRODUÇÃO EDITORIAL DO ÓRGÃO E ENTIDADE.');
        $this->addReference('065', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EDIÇÃO. COEDIÇÃO (EDIÇÃO E À COEDIÇÃO DE LIVROS, PERIÓDICOS E VÍDEOS, AUTORIZAÇÕES DE DIREITOS AUTORAIS E SOLICITAÇÃO DO REGISTRO ISBN E DO ISSN)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('065.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES À EDIÇÃO E À COEDIÇÃO DE LIVROS, PERIÓDICOS E VÍDEOS PRODUZIDOS PELO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES ÀS AUTORIZAÇÕES DE DIREITOS AUTORAIS E À SOLICITAÇÃO DO REGISTRO INTERNACIONAL PARA IDENTIFICAÇÃO DE LIVROS (ISBN) E DO REGISTRO INTERNACIONAL PARA IDENTIFICAÇÃO DE PUBLICAÇÕES SERIADAS (ISSN). CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('065.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EDITORAÇÃO E PROGRAMAÇÃO VISUAL (EDIÇÃO DE LIVROS, PERIÓDICOS E VÍDEOS, À COMPOSIÇÃO, COPIDESQUE, TRADUÇÃO E REVISÃO DE TEXTOS E À EXECUÇÃO DE IMPRESSÃO E SERVIÇOS GRÁFICOS, BEM COMO AQUELES REFERENTES À ELABORAÇÃO DE PAGE VIEWS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('065.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('065.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO, DIVULGAÇÃO E DISTRIBUIÇÃO (PROMOÇÃO, À DIVULGAÇÃO, À DOAÇÃO E À PERMUTA DA PRODUÇÃO EDITORIAL DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('065.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À AQUISIÇÃO DE ACERVOS BIBLIOGRÁFICOS POR DOAÇÃO E PERMUTA, CLASSIFICAR NOS CÓDIGOS 062.12 E 062.13, RESPECTIVAMENTE. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('065.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE TECNOLOGIA DA INFORMAÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('066');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS. NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO DESENVOLVIMENTO DE PROGRAMAS, INSTALAÇÃO DE EQUIPAMENTOS, IMPLANTAÇÃO E CONTROLE DE SISTEMAS INFORMATIZADOS, BEM COMO AQUELES REFERENTES À ADMINISTRAÇÃO DA INFRAESTRUTURA TECNOLÓGICA.');
        $this->addReference('066', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESENVOLVIMENTO E CONTROLE DE SISTEMAS INFORMATIZADOS (DESENVOLVIMENTO, IMPLANTAÇÃO, MANUTENÇÃO E CONTROLE DE PROGRAMAS E SISTEMAS INFORMATIZADOS, MANUAL DE USUÁRIO, CÓDIGO FONTE, REQUISITOS, DIAGRAMAS, TELAS, GERÊNCIA DE CONFIGURAÇÃO E PROJETOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO DESENVOLVIMENTO, IMPLANTAÇÃO, MANUTENÇÃO E CONTROLE DE PROGRAMAS E SISTEMAS INFORMATIZADOS, TAIS COMO: MANUAL DE USUÁRIO DESENVOLVIDO PELO ÓRGÃO E ENTIDADE, CÓDIGO FONTE, ESPECIFICAÇÃO DE REQUISITOS, DIAGRAMAS, DESENHOS DE TELAS, GERÊNCIA DE CONFIGURAÇÃO E PROJETOS DE BANCOS DE DADOS. CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 15 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('066.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSTALAÇÃO DE EQUIPAMENTOS (IMPLEMENTAÇÃO DE PROGRAMAS E SISTEMAS, TAIS COMO: MANUAL DOS EQUIPAMENTOS, TERMO DE GARANTIA, MANUAL DE USUÁRIO DESENVOLVIDO PELA EMPRESA PROPRIETÁRIA DO EQUIPAMENTO, LICENÇA E REGISTRO DE USO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('066.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADMINISTRAÇÃO DA INFRAESTRUTURA TECNOLÓGICA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO DESENVOLVIMENTO DO PROJETO DE INFRAESTRUTURA TECNOLÓGICA, BEM COMO AQUELES REFERENTES À MANUTENÇÃO, GERENCIAMENTO E USO DA INFRAESTRUTURA.');
        $this->addReference('066.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROJETO DE MANUTENÇÃO (PROJETO DE MANUTENÇÃO DA INFRAESTRUTURA TECNOLÓGICA, TAIS COMO: PROJETO DA REDE E CONFIGURAÇÃO DOS SERVIDORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('066.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GERENCIAMENTO E USO (GERENCIAMENTO DE DISCOS, REGISTRO E CONTROLE DAS PERMISSÕES DE ACESSO A REDE, CREDENCIAIS DE SEGURANÇA, GERENCIAMENTO DE CORREIO ELETRÔNICO, RELATÓRIOS DE DESEMPENHO, LOG DE DADOS E CONTROLE DE BACKUP)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('066.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADMINISTRAÇÃO DE BANCO DE DADOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À INSTALAÇÃO, CONFIGURAÇÃO E GERENCIAMENTO DE BANCO DE DADOS.');
        $this->addReference('066.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSTALAÇÃO E CONFIGURAÇÃO (INSTALAÇÃO E CONFIGURAÇÃO DE BANCO DE DADOS, ESTRUTURA, DICIONÁRIO DE DADOS, SCRIPT DE CRIAÇÃO E STORED PROCEDURES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.41');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('066.41', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GERENCIAMENTO E USO (GERENCIAMENTO DE BANCO DE DADOS, TAIS COMO: REGISTRO E CONTROLE DAS PERMISSÕES DE ACESSO AO BANCO DE DADOS E RELATÓRIOS DE DESEMPENHO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.42');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('066.42', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO DE TECNOLOGIA DA INFORMAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NA SUBDIVISÃO DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DE TECNOLOGIA DA INFORMAÇÃO NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('066.9', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DO SUPORTE TÉCNICO (CONTROLE DO SUPORTE TÉCNICO PRESTADO PARA UTILIZAÇÃO DOS SISTEMAS INFORMATIZADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('066.91');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO A CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS POR EMPRESAS TERCEIRIZADAS PARA A GESTÃO DE SISTEMAS E DE INFRAESTRUTURA TECNOLÓGICA, CLASSIFICAR NO CÓDIGO 067.');
        $this->addReference('066.91', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('067');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('A CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA E INEXIGIBILIDADE DE LICITAÇÃO. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('067', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO DA DOCUMENTAÇÃO E DA INFORMAÇÃO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('069');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DA DOCUMENTAÇÃO E DA INFORMAÇÃO NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('069', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TRATAMENTO TÉCNICO DA DOCUMENTAÇÃO ARQUIVÍSTICA PERMANENTE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('069.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO TRATAMENTO TÉCNICO DA DOCUMENTAÇÃO ARQUIVÍSTICA DE GUARDA PERMANENTE.');
        $this->addReference('069.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ARRANJO E DESCRIÇÃO (METODOLOGIA ADOTADA PARA O DESENVOLVIMENTO DAS ATIVIDADES DE IDENTIFICAÇÃO, ARRANJO E DESCRIÇÃO DOS DOCUMENTOS ARQUIVÍSTICOS DE GUARDA PERMANENTE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('069.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, 2 ANOS APÓS A CONCLUSÃO DA ORGANIZAÇÃO, AS VERSÕES PRELIMINARES DAS PLANILHAS E DOS ESTUDOS DE APOIO. INCLUEM-SE DOCUMENTOS REFERENTES À METODOLOGIA ADOTADA PARA O DESENVOLVIMENTO DAS ATIVIDADES DE IDENTIFICAÇÃO, ARRANJO E DESCRIÇÃO DOS DOCUMENTOS ARQUIVÍSTICOS DE GUARDA PERMANENTE. CONDICIONAL "ATÉ A CONCLUSÃO DA ORGANIZAÇÃO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA CONCLUIR A ORGANIZAÇÃO.');
        $this->addReference('069.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ELABORAÇÃO DE INSTRUMENTOS DE PESQUISA (INSTRUMENTOS QUE PERMITEM A IDENTIFICAÇÃO E A LOCALIZAÇÃO DOS DOCUMENTOS ARQUIVÍSTICOS DE GUARDA PERMANENTE: CATÁLOGO, GUIA, INVENTÁRIO, LISTAGEM DESCRITIVA DO ACERVO, REPERTÓRIO E TABELA DE EQUIVALÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('069.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, 2 ANOS APÓS A FINALIZAÇÃO DA ELABORAÇÃO, AS VERSÕES PRELIMINARES DOS INSTRUMENTOS ASSIM COMO OS DEMAIS EXEMPLARES QUANDO OCORREREM ATUALIZAÇÕES. CONDICIONAL "ATÉ A FINALIZAÇÃO DA ELABORAÇÃO DOS INSTRUMENTOS DE PESQUISA" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO PARA FINALIZAÇÃO.');
        $this->addReference('069.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FORNECIMENTO DE CÓPIAS DE DOCUMENTOS (REQUISIÇÃO E AO CONTROLE DA REPRODUÇÃO DE DOCUMENTOS POR IMPRESSÃO E POR OUTROS SERVIÇOS REPROGRÁFICOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('069.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À REFORMATAÇÃO DE ACERVOS POR MICROFILMAGEM E DIGITALIZAÇÃO, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 064.3. UTILIZAR OS PRAZOS DOS DOCUMENTOS FINANCEIROS PARA AS TRANSAÇÕES QUE ENVOLVAM PAGAMENTO DE DESPESAS.');
        $this->addReference('069.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PUBLICAÇÃO DE MATÉRIAS (PUBLICAÇÃO DE MATÉRIAS, DA COMPETÊNCIA DO ÓRGÃO E ENTIDADE, EM DIÁRIOS OFICIAIS E EM PERIÓDICOS DE GRANDE CIRCULAÇÃO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('069.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO À PUBLICAÇÃO DE MATÉRIAS NOS BOLETINS ADMINISTRATIVOS E DE SERVIÇO, CLASSIFICAR NO CÓDIGO 010.01. QUANTO À PUBLICAÇÃO DE MATÉRIAS NOS BOLETINS DE PESSOAL, CLASSIFICAR NO CÓDIGO 020.01. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('069.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DOS SERVIÇOS POSTAIS E DE TELECOMUNICAÇÕES');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('070');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA SUBCLASSE CONTEMPLA DOCUMENTOS REFERENTES ÀS ATIVIDADES DESENVOLVIDAS PELO ÓRGÃO E ENTIDADE PARA A GESTÃO DOS SERVIÇOS POSTAIS E DE TELECOMUNICAÇÕES (RADIOFREQUÊNCIA, TELEX, TELEFONIA, FAX E TRANSMISSÃO DE DADOS, VOZ E IMAGEM), BEM COMO AQUELES REFERENTES À CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS DE INSTALAÇÃO, MANUTENÇÃO E REPARO E À AUTORIZAÇÃO E CONTROLE DE USO.');
        $this->addReference('070', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DOS SERVIÇOS POSTAIS E DE TELECOMUNICAÇÕES DO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('070.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('070.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('071');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A REALIZAÇÃO DE FORNECIMENTO DE SERVIÇOS DE INSTALAÇÃO, MANUTENÇÃO E REPARO DOS SERVIÇOS POSTAIS E DE TELECOMUNICAÇÕES A SEREM PRESTADOS SOB O REGIME DE EXECUÇÃO INDIRETA. A CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS PODERÁ OCORRER NAS MODALIDADES DE LICITAÇÃO (CONVITE, TOMADA DE PREÇOS, CONCORRÊNCIA, LEILÃO, CONCURSO E PREGÃO), DISPENSA E INEXIGIBILIDADE DE LICITAÇÃO.');
        $this->addReference('071', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO POSTAL (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A REALIZAÇÃO DE SERVIÇOS POSTAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('071.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('071.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE RADIOFREQUÊNCIA (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A REALIZAÇÃO DE SERVIÇOS DE RADIOFREQUÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('071.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('071.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE TELEX (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A REALIZAÇÃO DE SERVIÇOS DE TELEX)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('071.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('071.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE TELEFONIA. SERVIÇO DE FAX (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A REALIZAÇÃO DE SERVIÇOS DE TELEFONIA E DE FAX)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('071.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('071.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE TRANSMISSÃO DE DADOS, VOZ E IMAGEM (CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS PARA A REALIZAÇÃO DE SERVIÇOS DE ACESSO À INTERNET, BEM COMO AQUELES REFERENTES À ASSINATURA DE TELEVISÃO E VIDEOCONFERÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('071.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS.');
        $this->addReference('071.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXECUÇÃO DE SERVIÇOS PELO ÓRGÃO E ENTIDADE (INSTALAÇÃO, MANUTENÇÃO E REPARO DOS SERVIÇOS DE TELECOMUNICAÇÕES, EXECUTADOS COM MEIOS PRÓPRIOS PELO ÓRGÃO E ENTIDADE, NÃO GERANDO CONTRATAÇÃO DE EMPRESAS TERCEIRIZADAS OU PAGAMENTO DE DESPESAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('072');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('072', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AUTORIZAÇÃO E CONTROLE DE USO');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('073');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À AUTORIZAÇÃO E CONTROLE DE USO DOS SERVIÇOS DE RADIOFREQUÊNCIA, DE TELEX, DE TELEFONIA, DE FAX E DE TRANSMISSÃO DE DADOS, VOZ E IMAGEM.');
        $this->addReference('073', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE RADIOFREQUÊNCIA (AUTORIZAÇÃO E AO CONTROLE DO USO DOS SERVIÇOS DE RADIOFREQUÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('073.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE TELEX (AUTORIZAÇÃO E AO CONTROLE DO USO DOS SERVIÇOS DE TELEX)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('073.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE TELEFONIA. SERVIÇO DE FAX');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESSE DESCRITOR CLASSIFICAM-SE OS DOCUMENTOS REFERENTES À AUTORIZAÇÃO E AO CONTROLE DA UTILIZAÇÃO DOS SERVIÇOS DE TELEFONIA E DE FAX.');
        $this->addReference('073.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TRANSFERÊNCIA DE PROPRIEDADE OU TITULARIDADE (TRANSFERÊNCIA DE PROPRIEDADE OU TITULARIDADE DAS LINHAS TELEFÔNICAS E DOS SERVIÇOS TELEFÔNICOS FIXO OU MÓVE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A CONCLUSÃO DA TRANSFERÊNCIA" CONVENCIONADO PARA 1 ANO NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO SUFICIENTE PARA CONCLUSÃO DA TRANSFERÊNCIA.');
        $this->addReference('073.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REGISTRO DE LIGAÇÕES (AUTORIZAÇÃO E AO CONTROLE DAS LIGAÇÕES INTERURBANAS, INTERNACIONAIS E DE TELEFONIA MÓVEL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('073.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DIVULGAÇÃO DE LISTAS TELEFÔNICAS INTERNAS (INCLUEM-SE AS LISTAGENS DE SERVIDORES E UNIDADES ADMINISTRATIVAS, COM OS RESPECTIVOS RAMAIS INTERNOS, ELABORADAS COM O OBJETIVO DE FACILITAR E AGILIZAR A COMUNICAÇÃO INTERNA NO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.33');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('073.33', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇO DE TRANSMISSÃO DE DADOS, VOZ E IMAGEM (AUTORIZAÇÃO E AO CONTROLE DO USO DOS SERVIÇOS DE ACESSO À INTERNET, ASSINATURA DE TELEVISÃO E VIDEOCONFERÊNCIA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('073.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('073.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PESSOAL MILITAR');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('080');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA CLASSE CONTEMPLA DOCUMENTOS REFERENTES AO DESENVOLVIMENTO DE ATIVIDADES COMPLEMENTARES, NORMALMENTE, VINCULADAS ÀS ATIVIDADES-MEIO, MAS QUE NÃO SÃO ESSENCIAIS PARA O FUNCIONAMENTO E CUMPRIMENTO DAS COMPETÊNCIAS FINALÍSTICAS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('080', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LEGISLAÇÃO (NORMAS; AVISOS; PORTARIAS DE CARÁTER GERAL; BOLETINS ADMINISTRATIVO, DE PESSOAL E DE SERVIÇO; DIRETRIZES; PROCEDIMENTOS; PARECERES; ESTUDOS E/OU DECISÕES DE CARÁTER GERAL)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('É OPCIONAL A REPRODUÇÃO DOS DOCUMENTOS PREVIAMENTE AO RECOLHIMENTO, PARA QUE O ÓRGÃO PERMANEÇA COM CÓPIAS PARA CONSULTA.');
        $this->addReference('080.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IDENTIFICAÇÃO MILITAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NA SUBDIVISÃO DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DE EVENTOS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('080.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IDENTIDADE MILITAR. CARTEIRA. CARTÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('080.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FICHA DE IDENTIDADE GRANDE, FICHA INDIVIDUAL DATILOSCÓPICA, CARTÃO ÍNDICE, FICHA DE DADOS CADASTRAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.21.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(129);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('O PRAZO TOTAL DE GUARDA DOS DOCUMENTOS É DE 130 ANOS, INDEPENDENTE DO SUPORTE. CONDICIONAL "ENQUANTO O MILITAR PERMANECER NA ATIVA" CONVENCIONADO PARA 1 ANO NO CORRENTE. SERÃO TRANSFERIDOS AO ARQUIVO INTERMEDIÁRIO APÓS A TRANSFERÊNCIA DO MILITAR PARA A RESERVA.');
        $this->addReference('080.21.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GUIA DE REMESSA DE MATERIAL DE IDENTIFICAÇÃO, MAPA MENSAL DO MATERIAL TÉCNICO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.21.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('080.21.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('IDENTIDADE PROVISÓRIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.21.c');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA PERDA DA VALIDADE DO DOCUMENTO.');
        $this->addReference('080.21.c', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONCESSÃO DE PASSAPORTE: DIPLOMÁTICO E/OU OFICIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(1);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA PERDA DA VALIDADE DO DOCUMENTO.');
        $this->addReference('080.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ASSENTAMENTOS INDIVIDUAIS.CADASTRO (INCLUEM-SE FICHA DE APRESENTAÇÃO; FICHA PADRÃO PASEP E FICHA DE CÓDIGO DE ESPECIALIDADE, BEM COMO OS DOCUMENTOS REFERENTES À CONTAGEM DE TEMPO DE SERVIÇO E À CONCESSÃO E CESSAÇÃO DE PORTE DE ARMA)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('080.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FOLHAS DE ALTERAÇÕES, CADERNETA REGISTRO CADASTRO, CADERNETA SANITÁRIA, DECLARAÇÃO/CADASTRO DE DEPENDENTES, FICHA INDIVIDUAL, DECLARAÇÃO/ALTERAÇÃO DE BENEFICIÁRIOS, TERMO DE OPÇÃO OU DE RETIFICAÇÃO DA LICENÇA ESPECIAL, TERMO DE RENÚNCIA DE PENSÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(130);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('A COMISSÃO PERMANENTE DE AVALIAÇÃO DE DOCUMENTOS, FINDO O PRAZO TOTAL DE GUARDA, PODERÁ DETERMINAR A PRESERVAÇÃO DE ALGUNS CONJUNTOS DOCUMENTAIS DE RELEVÂNCIA PARA A FORÇA. CONDICIONAL "ENQUANTO O MILITAR PERMANECER NA ATIVA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA TRANSFERÊNCIA DO MILITAR PARA A RESERVA.');
        $this->addReference('080.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FICHA DE APRESENTAÇÃO, CONTAGEM DE TEMPO DE SERVIÇO, FICHA PADRÃO PASEP, FICHA DE CÓDIGO DE ESPECIALIDADE, CONCESSÃO E CESSAÇÃO DE PORTE DE ARMA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('080.3.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO O MILITAR PERMANECER NA ATIVA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA TRANSFERÊNCIA DO MILITAR PARA A RESERVA.');
        $this->addReference('080.3.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INGRESSO NAS FORÇAS ARMADAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('081');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE OS DOCUMENTOS REFERENTES À PROMOÇÃO DE VISITAS CULTURAIS, EDUCATIVAS E TÉCNICAS AO ÓRGÃO E ENTIDADE.');
        $this->addReference('081', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECRUTAMENTO. SELEÇÃO: INSCRIÇÃO PARA CONCURSO, CRONOGRAMA DE REALIZAÇÃO DE PROVAS, CONTROLE DE APLICAÇÃO DAS PROVAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EDITAL DE CONCURSOS E ORIENTAÇÕES ESPECÍFICAS. MATERIAL DE DIVULGAÇÃO*, RELATÓRIOS E ATAS DOS PROCESSOS SELETIVOS, PROVAS ESCRITAS, PRÁTICAS E ORAIS*, GABARITOS*, INSTRUÇÕES COMPLEMENTARES DE CONVOCAÇÃO E DE SISTEMA DE SERVIÇO MILITAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.1.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('* EXEMPLARES ÚNICOS.');
        $this->addReference('081.1.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SELEÇÃO E DESIGNAÇÃO, NOMEAÇÃO E TERMO DE COMPROMISSO DE BANCA, LISTA DE CANDIDATOS, QUESTIONÁRIO BIOGRÁFICO SIMPLIFICADO, CARTÕES RESPOSTAS, TESTES, PROVAS DE TÍTULO, RESULTADOS, RELAÇÃO DOS APROVADOS, RECURSOS, SELEÇÃO INGRESSO NA CARREIRA MILITAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.1.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(25);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('SELEÇÃO E DESIGNAÇÃO PARA INCORPORAÇÃO E MATRÍCULA, NOMEAÇÃO E TERMO DE COMPROMISSO DE BANCA DE PROVAS, LISTA DE CANDIDATOS, QUESTIONÁRIO BIOGRÁFICO SIMPLIFICADO, CARTÕES RESPOSTAS DE TESTES OU PROVAS DO CANDIDATO, TESTES, PROVAS DE TÍTULO, RESULTADOS DAS PROVAS, RELAÇÃO DOS CANDIDATOS APROVADOS, RECURSOS, SELEÇÃO PARA INGRESSO NA CARREIRA MILITAR.');
        $this->addReference('081.1.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INCORPORAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ATOS DE CONVOCAÇÃO À INCORPORAÇÃO, ALISTAMENTOS, ESTÁGIOS, DISPENSA OU ISENÇÃO DO SERVIÇO MILITAR, CONVOCAÇÃO À INCORPORAÇÃO PARA PRESTAR SERVIÇO MILITAR OBRIGATÓRIO (SERVIÇO MILITAR INICIAL OU OUTRAS FORMAS POSTERIORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.2.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.2.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MATRÍCULA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADMISSÃO EM ESCOLAS, CENTROS E CURSOS DE FORMAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NOMEAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INGRESSO NOS CORPOS E/OU QUADROS DE CARREIRA DE OFICIAIS, NOS POSTOS INICIAIS OU NOS CORPOS/QUADROS DE OFICIAIS DA RESERVA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.4.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.4.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXERCÍCIOS DE MOBILIZAÇÃO / APRESENTAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CAMPANHAS DE CONVOCAÇÃO, MAPAS DE ENCARGOS DE MOBILIZAÇÃO, RELATÓRIOS SOBRE O EXERCÍCIO DE APRESENTAÇÃO DA RESERVA, CONTROLE DE EFETIVO DE MILITARES TEMPORÁRIOS (MÉDICOS, FARMACÊUTICOS, DENTISTAS, VETERINÁRIOS), TIROS DE GUERRA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.5.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('081.5.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTROS ASSUNTOS REFERENTES A INGRESSO NAS FORÇAS ARMADAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('081.9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS COMUNICAÇÕES OCASIONAIS E GENÉRICAS EFETUADAS PELO ÓRGÃO E ENTIDADE NO RELACIONAMENTO COM OUTRAS INSTITUIÇÕES PÚBLICAS E PRIVADAS E QUE NÃO DIZEM RESPEITO AO DESENVOLVIMENTO DE SUAS ATIVIDADES ESPECÍFICAS.');
        $this->addReference('081.9', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANO DE CARREIRA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('082');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES À PROMOÇÃO, ELABORAÇÃO E EXECUÇÃO DE PROGRAMAS DE CAPACITAÇÃO, DESENVOLVIMENTO E VALORIZAÇÃO DO SERVIDOR.');
        $this->addReference('082', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ANTIGUIDADE, POSICIONAMENTO E COGITAÇÃO/INCLUSÃO QUADRO DE ACESSO, FAIXA DE COGITAÇÃO, LISTA DE ESCOLHA, ATO, RESSARCIMENTO/RECONSIDERAÇÃO, RECONTAGEM DE PONTOS, CORREÇÃO, RETIFICAÇÃO, MÉRITOS, INQUÉRITOS, PROMOÇÃO POST-MORTEM E POR MOTIVO DE JUSTIÇA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.1.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(130);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('ANTIGUIDADE, POSICIONAMENTO E COGITAÇÃO/INCLUSÃO NO QUADRO DE ACESSO, FAIXA DE COGITAÇÃO, LISTA DE ESCOLHA, ATO DE PROMOÇÃO, RESSARCIMENTO/RECONSIDERAÇÃO, RECONTAGEM DE PONTOS, CORREÇÃO, RETIFICAÇÃO, MÉRITOS RELATIVOS, INFORMAÇÕES SOBRE A EXISTÊNCIA DE INQUÉRITOS E AÇÕES JUDICIAIS ENVOLVENDO OS AVALIADOS, PROMOÇÃO POST-MORTEM E POR MOTIVO DE JUSTIÇA. CONDICIONAL "ENQUANTO O MILITAR PERMANECER NA ATIVA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA TRANSFERÊNCIA DO MILITAR PARA A RESERVA.');
        $this->addReference('082.1.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES AO DESENVOLVIMENTO DE PROGRAMAS, INSTALAÇÃO DE EQUIPAMENTOS, IMPLANTAÇÃO E CONTROLE DE SISTEMAS INFORMATIZADOS, BEM COMO AQUELES REFERENTES À ADMINISTRAÇÃO DA INFRAESTRUTURA TECNOLÓGICA.');
        $this->addReference('082.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FORMAÇÃO. ADAPTAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CONCURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.21.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.21.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('APERFEIÇOAMENTO.ESPECIALIZAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.22');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.22', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.22.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.22.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ESTADO-MAIOR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.23');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.23', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.23.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.23.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ALTOS ESTUDOS MILITARES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.24');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.24', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.24.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.24.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FICHAS/FOLHAS DE AVALIAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REQUISITOS ESPECÍFICOS DE CARREIRA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MANOBRA, TEMPO DE TROPA, TEMPO DE EMBARQUE, VIVÊNCIA NACIONAL, DIAS DE MAR, ATIVIDADE BÉLICA, HORAS DE VOO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.4.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.4.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CURSOS COMPLEMENTARES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('082.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADESTRAMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.51');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.51', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS DIVERSOS TIPOS DE ADESTRAMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.51.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.51.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PÓS-GRADUAÇÃO LATO SENSU');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.52');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.52', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.52.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.52.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('QUALIFICAÇÃO TÉCNICA ESPECIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.53');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.53', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.53.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.53.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PÓS-GRADUAÇÃO STRICTO SENSU');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.54');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.54', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.54.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.54.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PÓS-DOUTORADO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.55');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.55', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO, MATRÍCULA, CONCLUSÃO, CANCELAMENTO, TRANCAMENTO E/OU DESLIGAMENTO DOS CURSOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.55.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.55.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRORROGAÇÃO DE TEMPO DE SERVIÇO. REENGAJAMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REQUERIMENTOS, AVALIAÇÕES, PARECERES E DESPACHOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.6.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.6.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TRANSPOSIÇÃO DE QUADRO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.7', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REQUERIMENTOS, AVALIAÇÕES, PARECERES E DESPACHOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.7.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('082.7.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTROS ASSUNTOS REFERENTES A PLANO DE CARREIRA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('082.9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('082.9', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOVIMENTAÇÃO. DESTAQUE. ADIÇÃO. EXCLUSÃO DO SERVIÇO ATIVO: MAPAS DE LOTAÇÃO DE OFICIAIS E PRAÇAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('083');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOVIMENTAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('083.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOTIVO DE SAÚDE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SOLICITAÇÃO DA MOVIMENTAÇÃO, CÓPIA DA ATA DE INSPEÇÃO DE SAÚDE, TERMO DE INSPEÇÃO DE SAÚDE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.11.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.11.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INTERESSE DO MILITAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SOLICITAÇÃO DA MOVIMENTAÇÃO, ORDEM DE MOVIMENTAÇÃO, PORTARIA DE MOVIMENTAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.12.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.12.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NECESSIDADE DO SERVIÇO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROPOSTA DE PLANO DE MOVIMENTAÇÃO, SOLICITAÇÕES DE ÓRGÃOS DE DIREÇÃO-GERAL OU SETORIAL, INCOMPATIBILIDADE DE POSTO, MATRÍCULA, TÉRMINO DE CURSO, INTERCÂMBIO E A BEM DA DISCIPLINA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.13.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.13.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MOTIVO DE JUSTIÇA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.14');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.14', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ORDEM JUDICIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.14.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(51);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ O TRÂNSITO EM JULGADO" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DO TRÂNSITO EM JULGADO. COMO O PRAZO DE GUARDA TOTAL DOS DOCUMENTOS É DE 52 ANOS, O PRAZO NO INTERMEDIÁRIO FOI AJUSTADO PARA 51 ANOS.');
        $this->addReference('083.14.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESTAQUE. ADIÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARECERES, DESPACHOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.2.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.2.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EXCLUSÃO DO SERVIÇO ATIVO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DEMISSÃO, PERDA DE POSTO E DA PATENTE, LICENCIAMENTO, ANULAÇÃO DE INCORPORAÇÃO, DESINCORPORAÇÃO, A BEM DA DISCIPLINA, FALECIMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESERÇÃO. EXTRAVIO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.3.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(100);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ATÉ A APURAÇÃO DO FATO" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA CONCLUSÃO DA APRURAÇÃO.');
        $this->addReference('083.3.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTROS ASSUNTOS REFERENTES À MOVIMENTAÇÃO.DESTAQUE. ADIÇÃO. EXCLUSÃO DO SERVIÇO ATIVO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.9', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('POSSE E NOMEAÇÃO PARA CARGOS PÚBLICOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.9.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('083.9.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANOS DE MOVIMENTAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('083.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 1 ANO NO CORRENTE, A CONTAR A PARTIR DA PERDA DA VIGÊNCIA DO DOCUMENTO.');
        $this->addReference('083.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VIOLAÇÃO DAS OBRIGAÇÕES E DOS DEVERES');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('084');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('084', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TRANSGRESSÕES E/OU CONTRAVENÇÕES DISCIPLINARES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('084.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SINDICÂNCIA, ACAREAÇÃO E APURAÇÃO DAS TRANSGRESSÕES E/OU CONTRAVENÇÕES, APLICAÇÃO DAS PUNIÇÕES DISCIPLINARES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.1.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('084.1.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CRIMES MILITARES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('084.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PORTARIA DE NOMEAÇÃO DO ENCARREGADO E ESCRIVÃO DO IPM, SOLUÇÃO DO IPM, OFÍCIO DE REMESSA DO IPM À JUSTIÇA MILITAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.2.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('OS AUTOS DOS INQUÉRITOS POLICIAIS MILITARES (IPM) SERÃO ENCAMINHADOS Á JUSTIÇA MILITAR.');
        $this->addReference('084.2.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONSELHOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('084.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DE DISCIPLINA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.31');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('084.31', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NOMEAÇÃO DOS MEMBROS DO CONSELHO, ATOS DE AFASTAMENTO DO ACUSADO, AUTOS DO CONSELHO, CONCLUSÕES E DECISÕES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.31.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(130);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CASO SEJA CONSIDERADO CRIME, OS AUTOS DO PROCESSO DO CONSELHO SERÃO ENCAMINHADOS À JUSTIÇA MILITAR. CONDICIONAL "ATÉ O DESPACHO FINAL DO COMANDANTE DA FORÇA" CONVENCIONADA PARA 1 ANO NO ARQUIVO CORRENTE, A CONTAR DO DESPACHO FINAL DO COMANDANTE DA FORÇA.');
        $this->addReference('084.31.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DE JUSTIFICAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.32');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('084.32', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NOMEAÇÃO DOS MEMBROS DO CONSELHO, ATOS DE AFASTAMENTO DO ACUSADO, AUTOS DO CONSELHO, CONCLUSÕES E DECISÕES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('084.32.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(130);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('OS AUTOS DO PROCESSO DO CONSELHO SERÃO ENCAMINHADOS À JUSTIÇA MILITAR. CONDICIONAL "ATÉ O TRÂNSITO EM JULGADO" CONVENCIONADA PARA 1 ANO NO ARQUIVO CORRENTE, A CONTAR DO TRÂNSITO EM JULGADO.');
        $this->addReference('084.32.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DIREITOS E PRERROGATIVAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('085');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('085', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RECOMPENSAS. DISTINÇÕES. HONRARIAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRÊMIOS DE HONRA AO MÉRITO, ELOGIOS, LOUVORES, REFERÊNCIAS ELOGIOSAS, DISTINTIVOS, DISPENSAS DE SERVIÇO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.1.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.1.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELAÇÕES DE AGRACIADOS COM AS CONDECORAÇÕES, RELAÇÕES DAQUELES QUE TIVERAM AS CONDECORAÇÕES CASSADAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.1.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.1.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('LICENÇAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADOTANTE, PARA ACOMPANHAR CÔNJUGE/COMPANHEIRO, CANDIDATO A CARGO ELETIVO, ESPECIAL, GESTANTE, PATERNIDADE, PARA TRATAR DE INTERESSE PARTICULAR, PARA TRATAMENTO DE SAÚDE DE PESSOA DA FAMÍLIA, PARA TRATAMENTO DE SAÚDE PRÓPRIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.2.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.2.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AFASTAMENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSTALAÇÃO (NO BRASIL E NO EXTERIOR), LUTO, NÚPCIAS, TRÂNSITO (NO BRASIL E NO EXTERIOR)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DISPENSAS DE SERVIÇO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARA DESCONTO EM FÉRIAS, POR PRESCRIÇÃO MÉDICA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.4.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.4.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FÉRIAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO, SOLICITAÇÃO, CONCESSÃO, CANCELAMENTO E PUBLICAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.5.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.5.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REMUNERAÇÃO. PROVENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('085.6', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REMUNERAÇÃO NA ATIVA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.61');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.61', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FICHAS FINANCEIRAS E FOLHAS DE PAGAMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.61.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.61.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADICIONAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.611');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.611', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MILITAR, DE HABILITAÇÃO, DE TEMPO DE SERVIÇO, DE COMPENSAÇÃO ORGÂNICA, DE PERMANÊNCIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.611.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.611.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GRATIFICAÇÕES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.612');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.612', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DE LOCALIDADE ESPECIAL, DE REPRESENTAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.612.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.612.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTROS DIREITOS REMUNERATÓRIOS NA ATIVA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.619');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.619', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADICIONAL DE FÉRIAS E NATALINO; AJUDA DE CUSTO; ASSISTÊNCIA PRÉ-ESCOLAR; AUXÍLIOS FARDAMENTO, ALIMENTAÇÃO, NATALIDADE, INVALIDEZ, FUNERAL E TRANSPORTE; COMPENSAÇÃO; DIÁRIAS; SALÁRIO-FAMÍLIA; TRANSPORTE; ADIANTAMENTO DE FÉRIAS; RETRIBUIÇÃO NO EXTERIOR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.619.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('ADICIONAL DE FÉRIAS; ADICIONAL NATALINO; AJUDA DE CUSTO; ASSISTÊNCIA PRÉ-ESCOLAR; AUXÍLIOS FARDAMENTO, ALIMENTAÇÃO, NATALIDADE, INVALIDEZ, FUNERAL E TRANSPORTE; COMPENSAÇÃO PECUNIÁRIA; DIÁRIAS; SALÁRIO-FAMÍLIA; TRANSPORTE DE PESSOAL E BAGAGENS POR MUDANÇA DE LOCALIDADE; REMUNURAÇÃO/ADIANTAMENTO DE FÉRIAS; RETRIBUIÇÃO NO EXTERIOR.');
        $this->addReference('085.619.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROVENTOS NA INATIVIDADE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.62');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.62', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FICHAS FINANCEIRAS E FOLHAS DE PAGAMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.62.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.62.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADICIONAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.621');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.621', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADICIONAIS: MILITAR, DE HABILITAÇÃO, DE TEMPO DE SERVIÇO, DE COMPENSAÇÃO ORGÂNICA, DE PERMANÊNCIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.621.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.621.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTROS DIREITOS PECUNIÁRIOS NA INATIVIDADE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.629');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.629', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADICIONAL NATALINO, ASSISTÊNCIA PRÉ-ESCOLAR, AUXÍLIOS: INVALIDEZ, NATALIDADE E FUNERAL, SALÁRIO-FAMÍLIA, ADICIONAL DESIGNAÇÃO PARA O SERVIÇO ATIVO, PRO-LABORE PARA TAREFA POR TEMPO CERTO, AJUDA DE TRANSPORTE POR BAIXA/ALTA EM ORGANIZAÇÃO, HOSPITALAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.629.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.629.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESCONTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.63');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('085.63', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OBRIGATÓRIOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.631');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.631', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTR. PARA A ASSISTÊNCIA MÉDICO-HOSPITALAR E SOCIAL, INDENIZAÇÃO PELA ASSISTÊNCIA, INDENIZAÇÃO À FAZENDA, MULTA POR OCUPAÇÃO IRREGULAR DE PRÓPRIO NACIONAL RESIDENCIAL, PENSÃO ALIMENTÍCIA OU JUDICIAL, CONTR. A PENSÃO MILITAR, TAXA DE USO POR OCUPAÇÃO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.631.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('OBRIGATÓRIOS: CONTRIBUIÇÃO PARA A ASSISTÊNCIA MÉDICO-HOSPITALAR E SOCIAL (PRESTADA POR ENTIDADE MILITAR), IMPOSTOS INCIDENTES SOBRE A REMUNERAÇÃO OU PROVENTOS, INDENIZAÇÃO PELA ASSISTÊNCIA MÉDICO-HOSPITALAR (PRESTADA POR ENTIDADE MILITAR), INDENIZAÇÃO À FAZENDA NACIONAL, MULTA POR OCUPAÇÃO IRREGULAR DE PRÓPRIO NACIONAL RESIDENCIAL, PENSÃO ALIMENTÍCIA OU JUDICIAL, CONTRIBUIÇÃO PARA A PENSÃO MILITAR, TAXA DE USO POR OCUPAÇÃO DE PRÓPRIO NACIONAL RESIDENCIAL');
        $this->addReference('085.631.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AUTORIZADOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.632');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.632', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESCONTOS EM FAVOR DE ENTIDADE CONSIGNATÁRIAS, DE TERCEIRO OU BENEFÍCIO FAMÍLIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('085.632.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('085.632.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INATIVOS E PENSIONISTAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('086');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('086', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INATIVOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('086.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RESERVA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('086.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REMUNERADA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.111');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.111', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSO DE TRANSFERÊNCIA PARA A RESERVA REMUNERADA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.111.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('O PROCESSO DE RESERVA REMUNERADA TRANSFORMA-SE EM PROCESSO DE REFORMA OU, EM CASO DE FALECIMENTO, É ANEXADO AO PROCESSO DE PENSÃO MILITAR. CONDICIONAL "ATÉ A REFORMA OU FALECIMENTO DO MILITAR" CONVENCIONADA PARA 125 ANOS, ACOMPANHANDO O MAIOR PRAZO DETERMINADO NO INTERMEDIÁRIO PARA O PROCESSO DE PENSÃO MILITAR.');
        $this->addReference('086.111.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NÃO REMUNERADA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.112');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.112', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSO DE TRANSFERÊNCIA PARA A RESERVA NÃO REMUNERADA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.112.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.112.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('REFORMA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('086.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('POR INVALIDEZ');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.121');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.121', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSO DE REFORMA POR INVALIDEZ');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.121.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('O PROCESSO É ANEXADO AO PROCESSO DE PENSÃO MILITAR. CONDICIONAL "ATÉ O FALECIMENTO DO MILITAR" CONVENCIONADA PARA 125 ANOS, ACOMPANHANDO O MAIOR PRAZO DETERMINADO NO INTERMEDIÁRIO PARA O PROCESSO DE PENSÃO MILITAR.');
        $this->addReference('086.121.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('POR IDADES-LIMITE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.122');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.122', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSO DE REFORMA POR IDADES-LIMITE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.122.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('O PROCESSO É ANEXADO AO PROCESSO DE PENSÃO MILITAR. CONDICIONAL "ATÉ O FALECIMENTO DO MILITAR" CONVENCIONADA PARA 125 ANOS, ACOMPANHANDO O MAIOR PRAZO DETERMINADO NO INTERMEDIÁRIO PARA O PROCESSO DE PENSÃO MILITAR.');
        $this->addReference('086.122.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DESIGNAÇÃO PARA O SERVIÇO ATIVO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.13', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSO DE DESIGNAÇÃO PARA O SERVIÇO ATIVO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.13.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.13.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TAREFA POR TEMPO CERTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.14');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.14', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSO DE DESIGNAÇÃO PARA TAREFA POR TEMPO CERTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.14.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.14.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PENSIONISTAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('086.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PENSÕES');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.21');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('086.21', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TEMPORÁRIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.211');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.211', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSOS DE SOLICITAÇÃO/CONCESSÃO DE PENSÃO MILITAR TEMPORÁRIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.211.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.211.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VITALÍCIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.212');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.212', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSOS DE SOLICITAÇÃO/CONCESSÃO DE PENSÃO MILITAR VITALÍCIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.212.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.212.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ESPECIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.213');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.213', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSOS DE SOLICITAÇÃO/CONCESSÃO DE PENSÃO MILITAR ESPECIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('086.213.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('086.213.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ASSISTÊNCIA');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('087');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('087', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('MÉDICA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('087.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('HOSPITALAR');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.11', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ATENDIMENTO AMBULATORIAL OU PRONTO-ATENDIMENTO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.11.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(20);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.11.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PRONTUÁRIOS MÉDICOS, FICHAS ODONTOLÓGICAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.11.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.11.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PERICIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.12', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE E VERIFICAÇÃO DE HIGIDEZ DO PESSOAL; ATESTADO E INQUÉRITO SANITÁRIO; RESULTADO DE EXAMES; CORPO DE DELITO; INSPEÇÃO; PROCESSOS DE PERÍCIA PARA REFORMA, ISENÇÃO DE IMPOSTO DE RENDA, MELHORIA DE REFORMA E MOVIMENTAÇÃO POR MOTIVO DE SAÚDE');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.12.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONTROLE E VERIFICAÇÃO DO ESTADO DE HIGIDEZ (EM ESTADO SAUDÁVEL) DO PESSOAL EM SERVIÇO ATIVO, INATIVO E A SER SELECIONADO PARA INGRESSO NAS FORÇAS ARMADAS; ATESTADO SANITÁRIO DE ORIGEM; INQUÉRITO SANITÁRIO DE ORIGEM; RESULTADO DE EXAMES; AUTO DE CORPO DE DELITO; ATAS DE INSPEÇÃO DE SAÚDE; PROCESSOS DE PERÍCIA MÉDICA PARA REFORMA, ISENÇÃO DE IMPOSTO DE RENDA, MELHORIA DE REFORMA E MOVIMENTAÇÃO POR MOTIVO DE SAÚDE.');
        $this->addReference('087.12.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SOCIAL');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMAS DE ASSISTÊNCIA SOCIAL COM VISTAS À CONCESSÃO DE LICENÇAS E BENEFÍCIOS; ATENDIMENTOS EDUCACIONAIS E ASSISTENCIAIS PRESTADOS POR EMPRESAS CONVENIADAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.2.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(95);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.2.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('JURÍDICA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ORIENTAÇÃO DE CARÁTER PARTICULAR; ATENDIMENTOS JURÍDICOS PRESTADOS POR EMPRESAS CONVENIADAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(20);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PSICOLÓGICA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TRIAGEM PARA ENCAMINHAMENTO AO SERVIÇO DE SAÚDE ESPECÍFICO; ORIENTAÇÃO E ACONSELHAMENTO PSICOLÓGICO; ATENDIMENTOS PSICOLÓGICOS PRESTADOS POR EMPRESAS CONVENIADAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.4.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(125);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.4.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELIGIOSA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.5', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CENSO RELIGIOSO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.5.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(45);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.5.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROCESSOS DE HABILITAÇÃO E REGISTROS DE CASAMENTO; BATIZADO E CRISMA; LIVRO TOMBO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('087.5.b');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(15);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('087.5.b', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VAGA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('088');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('088', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTROS ASSUNTOS REFERENTES A PESSOAL MILITAR');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('089');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('089', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('SERVIÇOS DE ESCALA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('089.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ESCALAS DE SERVIÇO');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.1.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('089.1.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TABELAS MESTRAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('089.2', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('TABELAS INDIVIDUAIS E GERAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.2.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA PERDA DA VALIDADE DO DOCUMENTO.');
        $this->addReference('089.2.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE FREQUÊNCIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('089.3', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('FICHAS DE CONTROLE DE EFETIVOS; LIVROS DE LICENCIADOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.3.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(47);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('089.3.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DELEGAÇÕES DE COMPETÊNCIA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('089.4', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ATOS DE DELEGAÇÃO; RELAÇÃO DE ENCARGOS COLATERAIS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('089.4.a');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADA PARA 1 ANO NO CORRENTE, A CONTAR DA PERDA DA VALIDADE DO DOCUMENTO.');
        $this->addReference('089.4.a', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('VAGA');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('090');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao(null);
        $this->addReference('090', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('ADMINISTRAÇÃO DE ATIVIDADES ACESSÓRIAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('900');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('ESTA CLASSE CONTEMPLA DOCUMENTOS REFERENTES AO DESENVOLVIMENTO DE ATIVIDADES COMPLEMENTARES, NORMALMENTE, VINCULADAS ÀS ATIVIDADES-MEIO, MAS QUE NÃO SÃO ESSENCIAIS PARA O FUNCIONAMENTO E CUMPRIMENTO DAS COMPETÊNCIAS FINALÍSTICAS DO ÓRGÃO E ENTIDADE.');
        $this->addReference('900', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE EVENTOS (SOLENIDADES, COMEMORAÇÕES, HOMENAGENS, CONGRESSOS, CONFERÊNCIAS, SEMINÁRIOS, SIMPÓSIOS, OFICINAS, ENCONTROS, CONVENÇÕES, PALESTRAS, MESAS REDONDAS, FEIRAS, EXPOSIÇÕES, MOSTRAS, EXIBIÇÃO, LANÇAMENTOS, FESTAS E CONCURSOS CULTURAIS)');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('910');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('SOLENIDADES, COMEMORAÇÕES, HOMENAGENS, CONGRESSOS, CONFERÊNCIAS, SEMINÁRIOS, SIMPÓSIOS, JORNADAS, OFICINAS, ENCONTROS, CONVENÇÕES, PALESTRAS, MESAS REDONDAS, FEIRAS, SALÕES, EXPOSIÇÕES, MOSTRAS, EXIBIÇÃO, LANÇAMENTOS, FESTAS E CONCURSOS CULTURAIS. EVENTOS PROMOVIDOS E REALIZADOS PELO ÓRGÃO E ENTIDADE A PARTIR DO DESENVOLVIMENTO DE ALGUMA ATIVIDADE FINALÍSTICA, CLASSIFICAR NO CÓDIGO ESPECÍFICO. ATIVIDADES DE COMUNICAÇÃO SOCIAL NO ÂMBITO EXTERNO, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 019.11.');
        $this->addReference('910', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A GESTÃO DE EVENTOS PROMOVIDOS E REALIZADOS PELO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('910.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('910.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PLANEJAMENTO E PROGRAMAÇÃO (TEMA, PROGRAMAÇÃO PRÉVIA/FINAL, LISTA DE PALESTRANTES E CONVIDADOS, CRONOGRAMA, INSTRUÇÕES PARA PARTICIPANTES E OUVINTES, CONTATOS, PATROCINADORES E FORNECEDORES E DISPONIBILIZAÇÃO DE INFORMAÇÕES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('911');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES AO PLANEJAMENTO E À PROGRAMAÇÃO DO EVENTO, TAIS COMO: A DEFINIÇÃO DO TEMA, A PROGRAMAÇÃO PRÉVIA E FINAL, A LISTA DE PALESTRANTES E CONVIDADOS, O CRONOGRAMA DAS ATIVIDADES (DIAS, HORÁRIOS E SESSÕES), AS INSTRUÇÕES PARA PARTICIPANTES E OUVINTES, OS CONTATOS COM PARCERIAS, PATROCINADORES E FORNECEDORES E A DISPONIBILIZAÇÃO DE INFORMAÇÕES TURÍSTICAS E SOBRE HOSPEDAGEM, ALIMENTAÇÃO E TRANSPORTE.');
        $this->addReference('911', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('DIVULGAÇÃO (DIVULGAÇÃO DOS EVENTOS, TAIS COMO: FÔLDERES, CARTAZES, FOLHETOS, CHAMADAS NAS REDES SOCIAIS E ANÚNCIOS NAS MÍDIAS DE COMUNICAÇÃO IMPRESSAS E ELETRÔNICAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('912');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('ARQUIVAR UM EXEMPLAR DO MATERIAL DE DIVULGAÇÃO DE CADA EVENTO.');
        $this->addReference('912', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('INSCRIÇÃO E CONTROLE DE FREQUÊNCIA (INCLUEM-SE FICHAS DE INSCRIÇÃO, CADASTRO OU RELAÇÃO DE INSCRITOS E LISTAS DE PRESENÇA DOS PARTICIPANTES NOS EVENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('913');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('INCLUEM-SE FICHAS DE INSCRIÇÃO, CADASTRO OU RELAÇÃO DE INSCRITOS E LISTAS DE PRESENÇA DOS PARTICIPANTES NOS EVENTOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('913', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('EMISSÃO DE CERTIFICADOS (EXPEDIÇÃO, REGISTRO E CONTROLE DA ENTREGA DO CERTIFICADO AOS PARTICIPANTES NOS EVENTOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('914');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(3);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('914', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('AVALIAÇÃO DOS RESULTADOS (AVALIAÇÃO DOS RESULTADOS ALCANÇADOS PELOS EVENTOS, TAIS COMO: FORMULÁRIOS DE AVALIAÇÃO E RELATÓRIOS PARCIAIS E FINAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('915');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('ELIMINAR, APÓS 2 ANOS, OS DOCUMENTOS CUJAS INFORMAÇÕES ENCONTRAM-SE RECAPITULADAS OU CONSOLIDADAS EM OUTROS. INCLUEM-SE DOCUMENTOS REFERENTES À AVALIAÇÃO DOS RESULTADOS ALCANÇADOS PELOS EVENTOS, TAIS COMO: FORMULÁRIOS DE AVALIAÇÃO E RELATÓRIOS PARCIAIS E FINAIS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('915', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('HABILITAÇÃO, JULGAMENTO E RECURSOS (HABILITAÇÃO DOS CANDIDATOS INSCRITOS, JULGAMENTO DOS TRABALHOS CONCORRENTES, DESEMPENHO DOS PARTICIPANTES E RECURSOS APRESENTADOS AOS RESULTADOS DO JULGAMENTO, TRABALHOS INSCRITOS E AS ATAS DE JULGAMENTO)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('916');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('HABILITAÇÃO DOS CANDIDATOS, JULGAMENTO DOS TRABALHOS CONCORRENTES, DESEMPENHO DOS PARTICIPANTES E RECURSOS APRESENTADOS AOS RESULTADOS DO JULGAMENTO, TRABALHOS INSCRITOS E AS ATAS DE JULGAMENTO. AGUARDAR O TÉRMINO DA AÇÃO, NO CASO DE INTERPOSIÇÃO DE RECURSOS. ELIMINAR, APÓS 2 ANOS DA HOMOLOGAÇÃO DO EVENTO, OS DOCUMENTOS DE RECURSOS INDEFERIDOS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('916', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PREMIAÇÃO (ENTREGA DA PREMIAÇÃO AOS CANDIDATOS VENCEDORES DOS CONCURSOS CULTURAIS, TAIS COMO: TERMO DE ENTREGA E RECEBIMENTO E TERMO DE CESSÃO DE DIREITOS AUTORAIS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('917');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(2);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('INCLUEM-SE DOCUMENTOS REFERENTES A ENTREGA DA PREMIAÇÃO AOS CANDIDATOS VENCEDORES DOS CONCURSOS CULTURAIS, TAIS COMO: TERMO DE ENTREGA E RECEBIMENTO E TERMO DE CESSÃO DE DIREITOS AUTORAIS. CONDICIONAL "ATÉ A HOMOLOGAÇÃO DO EVENTO" CONVENCIONADO PARA 2 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE HOMOLOGAÇÃO DE EVENTO.');
        $this->addReference('917', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTRATAÇÃO DE PRESTAÇÃO DE SERVIÇOS (PLANEJAMENTO, DIVULGAÇÃO, SELEÇÃO DO FORNECEDOR, DESIGNAÇÃO DO GESTOR E DOS FISCAIS, FISCALIZAÇÃO, AVALIAÇÃO E AFERIÇÃO DOS RESULTADOS E DEMAIS DOCUMENTOS COMPROBATÓRIOS DA PRESTAÇÃO DOS SERVIÇOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('918');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(15);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('CONTRATAÇÃO DE LOCAÇÃO DE ESPAÇO, LOCAÇÃO DE MOBILIÁRIO, FORNECIMENTO DE BUFÊ, CERIMONIAL E TRADUÇÃO SIMULTÂNEA. QUANTO AO USO DE DEPENDÊNCIAS DO ÓRGÃO E ENTIDADE, POR TERCEIROS, MEDIANTE LOCAÇÃO, ARRENDAMENTO MERCANTIL (LEASING) E SUBLOCAÇÃO, CLASSIFICAR NO CÓDIGO 041.61. CONDICIONAL "ATÉ A APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" CONVENCIONADO PARA 5 ANOS NO CORRENTE E "5 ANOS A CONTAR DA APROVAÇÃO DAS CONTAS PELO TRIBUNAL DE CONTAS" PARA 15 ANOS NO INTERMEDIÁRIO, SOMANDO-SE 20 ANOS');
        $this->addReference('918', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À GESTÃO DE EVENTOS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('919');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NA SUBDIVISÃO DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES A OUTRAS AÇÕES DE GESTÃO DE EVENTOS NÃO CONTEMPLADAS NOS DESCRITORES ANTERIORES.');
        $this->addReference('919', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PARTICIPAÇÃO EM EVENTOS PROMOVIDOS E REALIZADOS POR OUTRAS INSTITUIÇÕES (PARTICIPAÇÃO DO SERVIDOR EM EVENTOS PROMOVIDOS POR OUTRAS INSTITUIÇÕES, COMPROVANTES DA INSCRIÇÃO E DA PARTICIPAÇÃO NO EVENTO, DISCURSOS, PALESTRAS E TRABALHOS APRESENTADOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('919.1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('QUANTO AOS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO DO SERVIDOR, QUE DEVERÃO INTEGRAR O ASSENTAMENTO FUNCIONAL, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 020.1. UTILIZAR OS PRAZOS DE GUARDA E A DESTINAÇÃO FINAL DOS ASSENTAMENTOS FUNCIONAIS PARA OS DOCUMENTOS COMPROBATÓRIOS DE PARTICIPAÇÃO.');
        $this->addReference('919.1', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROMOÇÃO DE VISITAS');
        $classificacao->setPermissaoUso(False);
        $classificacao->setCodigo('920');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE OS DOCUMENTOS REFERENTES À PROMOÇÃO DE VISITAS CULTURAIS, EDUCATIVAS E TÉCNICAS AO ÓRGÃO E ENTIDADE.');
        $this->addReference('920', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('NORMATIZAÇÃO. REGULAMENTAÇÃO (DETERMINAÇÕES LEGAIS, ATOS E INSTRUÇÕES NORMATIVAS, PROCEDIMENTOS OPERACIONAIS E DECISÕES DE CARÁTER GERAL SOBRE A PROMOÇÃO DE VISITAS AO ÓRGÃO E ENTIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('920.01');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao('CONDICIONAL "ENQUANTO VIGORA" CONVENCIONADO PARA 5 ANOS NO CORRENTE, QUE FOI CONSIDERADO COMO TEMPO MÉDIO DE VIGÊNCIA.');
        $this->addReference('920.01', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('PROGRAMAÇÃO DE VISITAS (ATENDIMENTO DE SOLICITAÇÃO DE VISITAS AO ÓRGÃO E ENTIDADE, BEM COMO AQUELES REFERENTES AO PLANEJAMENTO E À PROGRAMAÇÃO DE VISITAS MONITORADAS, DIRIGIDAS A DIFERENTES PÚBLICOS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('921');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $classificacao->setObservacao(null);
        $this->addReference('921', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('CONTROLE DE VISITAS E VISITANTES (CONTROLE DA ENTRADA DE VISITANTES E AO ACOMPANHAMENTO DOS MESMOS POR OCASIÃO DAS VISITAS)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('922');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(2);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('922', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('OUTRAS AÇÕES REFERENTES À ADMINISTRAÇÃO DE ATIVIDADES ACESSÓRIAS');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('990');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setObservacao('NAS SUBDIVISÕES DESTE DESCRITOR CLASSIFICAM-SE DOCUMENTOS REFERENTES ÀS COMUNICAÇÕES OCASIONAIS E GENÉRICAS EFETUADAS PELO ÓRGÃO E ENTIDADE NO RELACIONAMENTO COM OUTRAS INSTITUIÇÕES PÚBLICAS E PRIVADAS E QUE NÃO DIZEM RESPEITO AO DESENVOLVIMENTO DE SUAS ATIVIDADES ESPECÍFICAS.');
        $this->addReference('990', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('GESTÃO DE COMUNICAÇÕES EVENTUAIS (COMUNICADOS, INFORMES, PEDIDOS, SOLICITAÇÕES E OFERECIMENTOS, QUE TRATAM DE TEMAS NÃO CONTEMPLADOS NAS ATIVIDADES FINALÍSTICAS E QUE NÃO TIVERAM SOLUÇÃO DE CONTINUIDADE)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('991');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao('APRESENTAÇÃO E RECOMENDAÇÃO DE PESSOAS/PROFISSIONAIS; FALECIMENTO E ENVIO DE PÊSAMES; INFORME DE POSSE, AFASTAMENTO E MUDANÇA DE TITULAR; ALTERAÇÕES DE TELEFONES E ENDEREÇOS; INFORME DE LUTO OFICIAL; ENVIO DE CUMPRIMENTOS E FELICITAÇÕES; RECEBIMENTO DE CONVITES PARA SOLENIDADE E EVENTOS DIVERSOS. SOLICITAÇÕES DE INFORMAÇÕES PELOS CIDADÃOS POR MEIO DO SIC, CLASSIFICAR NAS SUBDIVISÕES DO CÓDIGO 002.1. ELOGIOS E RECLAMAÇÕES RECEBIDOS PELA OUVIDORIA E OUTROS CANAIS, CLASSIFICAR NO CÓDIGO 002.2.');
        $this->addReference('991', $classificacao);
        
        $this->manager->persist($classificacao);
        
        $classificacao = new Classificacao();
        $classificacao->setNome('RELACIONAMENTO COM ASSOCIAÇÕES CULTURAIS, DE AMIGOS E DE SERVIDORES (RELACIONAMENTO DO ÓRGÃO E ENTIDADE COM ASSOCIAÇÕES CULTURAIS, DE AMIGOS E DE SERVIDORES)');
        $classificacao->setPermissaoUso(True);
        $classificacao->setCodigo('992');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(1);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $classificacao->setObservacao(null);
        $this->addReference('992', $classificacao);
        
        $this->manager->persist($classificacao);
        
        

        $classificacao = $this->getReference('002.01');
        $classificacao->setParent($this->getReference('002'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('002.1');
        $classificacao->setParent($this->getReference('002'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('002.11');
        $classificacao->setParent($this->getReference('002'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('002.12');
        $classificacao->setParent($this->getReference('002'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('002.2');
        $classificacao->setParent($this->getReference('002'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('003.01');
        $classificacao->setParent($this->getReference('003'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('003.1');
        $classificacao->setParent($this->getReference('003'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('003.2');
        $classificacao->setParent($this->getReference('003'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('003.3');
        $classificacao->setParent($this->getReference('003'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('004.1');
        $classificacao->setParent($this->getReference('004'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('004.11');
        $classificacao->setParent($this->getReference('004'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('004.12');
        $classificacao->setParent($this->getReference('004'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('004.2');
        $classificacao->setParent($this->getReference('004'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('004.21');
        $classificacao->setParent($this->getReference('004'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('004.22');
        $classificacao->setParent($this->getReference('004'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('005.1');
        $classificacao->setParent($this->getReference('005'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('005.2');
        $classificacao->setParent($this->getReference('005'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('010.01');
        $classificacao->setParent($this->getReference('010'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('013.1');
        $classificacao->setParent($this->getReference('013'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('013.2');
        $classificacao->setParent($this->getReference('013'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('014.1');
        $classificacao->setParent($this->getReference('014'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('014.2');
        $classificacao->setParent($this->getReference('014'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('014.3');
        $classificacao->setParent($this->getReference('014'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('014.4');
        $classificacao->setParent($this->getReference('014'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('015.1');
        $classificacao->setParent($this->getReference('015'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('015.2');
        $classificacao->setParent($this->getReference('015'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('015.3');
        $classificacao->setParent($this->getReference('015'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('015.31');
        $classificacao->setParent($this->getReference('015'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('015.32');
        $classificacao->setParent($this->getReference('015'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('015.33');
        $classificacao->setParent($this->getReference('015'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('016.1');
        $classificacao->setParent($this->getReference('016'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('016.2');
        $classificacao->setParent($this->getReference('016'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('016.3');
        $classificacao->setParent($this->getReference('016'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('016.4');
        $classificacao->setParent($this->getReference('016'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('016.5');
        $classificacao->setParent($this->getReference('016'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('017.1');
        $classificacao->setParent($this->getReference('017'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('017.2');
        $classificacao->setParent($this->getReference('017'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.1');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.11');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.111');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.112');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.113');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.12');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('019.2');
        $classificacao->setParent($this->getReference('019'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.01');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.02');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.021');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.022');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.03');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.031');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.032');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.033');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.1');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.11');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.12');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.13');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.14');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('020.2');
        $classificacao->setParent($this->getReference('020'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('021.1');
        $classificacao->setParent($this->getReference('021'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('021.2');
        $classificacao->setParent($this->getReference('021'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('021.3');
        $classificacao->setParent($this->getReference('021'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('021.4');
        $classificacao->setParent($this->getReference('021'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('021.5');
        $classificacao->setParent($this->getReference('021'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.1');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.2');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.21');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.22');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.3');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.4');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.5');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.6');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.61');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.62');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.63');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('022.7');
        $classificacao->setParent($this->getReference('022'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.1');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.11');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.12');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.13');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.14');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.15');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.151');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.152');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.153');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.154');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.155');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.156');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.157');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.16');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.161');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.162');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.163');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.164');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.165');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.166');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.167');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.17');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.171');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.172');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.173');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.174');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.175');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.18');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.181');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.182');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.183');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.184');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.185');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.186');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.19');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.191');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.2');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.3');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.4');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.5');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.6');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.7');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.71');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.72');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.73');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.9');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.91');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.92');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('023.93');
        $classificacao->setParent($this->getReference('023'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.01');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.1');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.11');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.12');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.13');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.2');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.3');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.31');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.32');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.33');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.4');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.5');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.51');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('024.52');
        $classificacao->setParent($this->getReference('024'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.1');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.11');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.12');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.13');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.14');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.2');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.21');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.22');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.3');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.31');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.311');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.312');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('025.32');
        $classificacao->setParent($this->getReference('025'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.01');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.02');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.1');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.2');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.3');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.4');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.5');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.51');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.52');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.53');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.54');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.6');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.61');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.62');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.9');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('026.91');
        $classificacao->setParent($this->getReference('026'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('027.1');
        $classificacao->setParent($this->getReference('027'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('027.2');
        $classificacao->setParent($this->getReference('027'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('027.3');
        $classificacao->setParent($this->getReference('027'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.1');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.11');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.12');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.2');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.21');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.22');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('028.23');
        $classificacao->setParent($this->getReference('028'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.1');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.11');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.12');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.2');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.21');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.22');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.23');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.24');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.3');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.4');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.5');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('029.6');
        $classificacao->setParent($this->getReference('029'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('030.01');
        $classificacao->setParent($this->getReference('030'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('030.02');
        $classificacao->setParent($this->getReference('030'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('030.03');
        $classificacao->setParent($this->getReference('030'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.1');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.11');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.12');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.2');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.21');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.22');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.3');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.31');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.32');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.4');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.41');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.42');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('031.5');
        $classificacao->setParent($this->getReference('031'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('032.01');
        $classificacao->setParent($this->getReference('032'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('032.1');
        $classificacao->setParent($this->getReference('032'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('032.2');
        $classificacao->setParent($this->getReference('032'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('032.3');
        $classificacao->setParent($this->getReference('032'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('032.4');
        $classificacao->setParent($this->getReference('032'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.1');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.11');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.12');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.2');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.21');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.22');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.3');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.31');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.32');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.4');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.41');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.42');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.5');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.51');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.52');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('033.6');
        $classificacao->setParent($this->getReference('033'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('036.01');
        $classificacao->setParent($this->getReference('036'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('036.1');
        $classificacao->setParent($this->getReference('036'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('036.2');
        $classificacao->setParent($this->getReference('036'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('039.1');
        $classificacao->setParent($this->getReference('039'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('039.11');
        $classificacao->setParent($this->getReference('039'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('039.12');
        $classificacao->setParent($this->getReference('039'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('039.2');
        $classificacao->setParent($this->getReference('039'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('040.01');
        $classificacao->setParent($this->getReference('040'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.1');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.11');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.12');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.13');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.2');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.21');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.22');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.23');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.3');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.31');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.32');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.4');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.5');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.51');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.52');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.53');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.6');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.61');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('041.62');
        $classificacao->setParent($this->getReference('041'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.1');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.11');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.12');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.13');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.2');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.21');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.22');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.23');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.3');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.31');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.32');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.4');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.5');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.51');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.52');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.53');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.6');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.7');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.71');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('042.72');
        $classificacao->setParent($this->getReference('042'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.1');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.2');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.3');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.4');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.5');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.6');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.61');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.62');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('043.7');
        $classificacao->setParent($this->getReference('043'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('044.1');
        $classificacao->setParent($this->getReference('044'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('044.2');
        $classificacao->setParent($this->getReference('044'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('044.3');
        $classificacao->setParent($this->getReference('044'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('044.4');
        $classificacao->setParent($this->getReference('044'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('044.5');
        $classificacao->setParent($this->getReference('044'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('044.6');
        $classificacao->setParent($this->getReference('044'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.01');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.1');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.11');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.12');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.13');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.2');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.21');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.22');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.23');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.24');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.3');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.31');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.32');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.33');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.4');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.5');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.6');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('045.7');
        $classificacao->setParent($this->getReference('045'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.1');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.11');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.12');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.13');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.2');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.3');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('046.4');
        $classificacao->setParent($this->getReference('046'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('047.01');
        $classificacao->setParent($this->getReference('047'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('047.1');
        $classificacao->setParent($this->getReference('047'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('047.2');
        $classificacao->setParent($this->getReference('047'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('047.3');
        $classificacao->setParent($this->getReference('047'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('049.1');
        $classificacao->setParent($this->getReference('049'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('049.11');
        $classificacao->setParent($this->getReference('049'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('049.12');
        $classificacao->setParent($this->getReference('049'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('050.01');
        $classificacao->setParent($this->getReference('050'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('050.02');
        $classificacao->setParent($this->getReference('050'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('050.03');
        $classificacao->setParent($this->getReference('050'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('051.1');
        $classificacao->setParent($this->getReference('051'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('051.2');
        $classificacao->setParent($this->getReference('051'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('051.3');
        $classificacao->setParent($this->getReference('051'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('051.4');
        $classificacao->setParent($this->getReference('051'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.1');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.2');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.21');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.211');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.212');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.213');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.22');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.221');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.222');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.23');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.24');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.25');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.251');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('052.252');
        $classificacao->setParent($this->getReference('052'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('053.01');
        $classificacao->setParent($this->getReference('053'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('053.1');
        $classificacao->setParent($this->getReference('053'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('053.2');
        $classificacao->setParent($this->getReference('053'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('053.3');
        $classificacao->setParent($this->getReference('053'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('053.4');
        $classificacao->setParent($this->getReference('053'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('054.1');
        $classificacao->setParent($this->getReference('054'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('054.2');
        $classificacao->setParent($this->getReference('054'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('059.1');
        $classificacao->setParent($this->getReference('059'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('059.2');
        $classificacao->setParent($this->getReference('059'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('059.3');
        $classificacao->setParent($this->getReference('059'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('059.4');
        $classificacao->setParent($this->getReference('059'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('059.5');
        $classificacao->setParent($this->getReference('059'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('060.01');
        $classificacao->setParent($this->getReference('060'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.01');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.011');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.012');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.1');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.2');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.3');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.4');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.5');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.51');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.52');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.521');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.522');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('061.523');
        $classificacao->setParent($this->getReference('061'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.1');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.11');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.12');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.13');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.2');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.21');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.22');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.3');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.4');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.41');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('062.42');
        $classificacao->setParent($this->getReference('062'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('063.1');
        $classificacao->setParent($this->getReference('063'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('063.2');
        $classificacao->setParent($this->getReference('063'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('063.3');
        $classificacao->setParent($this->getReference('063'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.01');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.1');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.2');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.3');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.31');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.32');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('064.4');
        $classificacao->setParent($this->getReference('064'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('065.1');
        $classificacao->setParent($this->getReference('065'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('065.2');
        $classificacao->setParent($this->getReference('065'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('065.3');
        $classificacao->setParent($this->getReference('065'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.1');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.2');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.3');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.31');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.32');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.4');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.41');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.42');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.9');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('066.91');
        $classificacao->setParent($this->getReference('066'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('069.1');
        $classificacao->setParent($this->getReference('069'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('069.11');
        $classificacao->setParent($this->getReference('069'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('069.12');
        $classificacao->setParent($this->getReference('069'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('069.2');
        $classificacao->setParent($this->getReference('069'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('069.3');
        $classificacao->setParent($this->getReference('069'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('070.01');
        $classificacao->setParent($this->getReference('070'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('071.1');
        $classificacao->setParent($this->getReference('071'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('071.2');
        $classificacao->setParent($this->getReference('071'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('071.3');
        $classificacao->setParent($this->getReference('071'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('071.4');
        $classificacao->setParent($this->getReference('071'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('071.5');
        $classificacao->setParent($this->getReference('071'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.1');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.2');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.3');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.31');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.32');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.33');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('073.4');
        $classificacao->setParent($this->getReference('073'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.1');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.2');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.21');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.21.a');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.21.b');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.21.c');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.22');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.3');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.3.a');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('080.3.b');
        $classificacao->setParent($this->getReference('080'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.1');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.1.a');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.1.b');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.2');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.2.a');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.3');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.3.a');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.4');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.4.a');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.5');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.5.a');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('081.9');
        $classificacao->setParent($this->getReference('081'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.1');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.1.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.2');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.21');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.21.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.22');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.22.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.23');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.23.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.24');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.24.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.3');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.3.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.4');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.4.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.5');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.51');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.51.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.52');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.52.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.53');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.53.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.54');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.54.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.55');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.55.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.6');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.6.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.7');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.7.a');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('082.9');
        $classificacao->setParent($this->getReference('082'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.1');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.11');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.11.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.12');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.12.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.13');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.13.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.14');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.14.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.2');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.2.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.3');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.3.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.3.b');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.9');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.9.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('083.a');
        $classificacao->setParent($this->getReference('083'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.1');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.1.a');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.2');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.2.a');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.3');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.31');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.31.a');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.32');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('084.32.a');
        $classificacao->setParent($this->getReference('084'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.1');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.1.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.1.b');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.2');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.2.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.3');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.3.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.4');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.4.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.5');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.5.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.6');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.61');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.61.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.611');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.611.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.612');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.612.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.619');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.619.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.62');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.62.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.621');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.621.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.629');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.629.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.63');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.631');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.631.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.632');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('085.632.a');
        $classificacao->setParent($this->getReference('085'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.1');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.11');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.111');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.111.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.112');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.112.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.12');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.121');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.121.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.122');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.122.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.13');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.13.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.14');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.14.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.2');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.21');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.211');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.211.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.212');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.212.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.213');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('086.213.a');
        $classificacao->setParent($this->getReference('086'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.1');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.11');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.11.a');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.11.b');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.12');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.12.a');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.2');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.2.a');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.3');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.3.a');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.4');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.4.a');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.5');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.5.a');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('087.5.b');
        $classificacao->setParent($this->getReference('087'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.1');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.1.a');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.2');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.2.a');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.3');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.3.a');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.4');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('089.4.a');
        $classificacao->setParent($this->getReference('089'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('910.01');
        $classificacao->setParent($this->getReference('910'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('919.1');
        $classificacao->setParent($this->getReference('919'));
        $this->manager->persist($classificacao);

        $classificacao = $this->getReference('920.01');
        $classificacao->setParent($this->getReference('920'));
        $this->manager->persist($classificacao);

        // Flush database changes
        $this->manager->flush();
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 2;
    }

    /**
     * This method must return an array of groups
     * on which the implementing class belongs to.
     *
     * @return string[]
     */
    public static function getGroups(): array
    {
        return ['ref'];
    }
}
