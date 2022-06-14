<?php

declare(strict_types=1);
/**
 * /src/DataFixtures/ORM/Test/LoadClassificacaoData.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\DataFixtures\ORM\Test;

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
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
            
        //classificação pai
        $classificacao = new Classificacao();
        $classificacao->setNome('CLASSIFICAÇÃO INATIVA');
        $classificacao->setPermissaoUso(false);
        $classificacao->setCodigo('I00');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao(null);
        $classificacao->setAtivo(false);
            
        // Persist entity
        $this->manager->persist($classificacao);
            
        // Create reference for later usage
        $this->addReference('Classificacao381', $classificacao);
            
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE – RECOLHIMENTO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-1');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $this->addReference('Classificacao382', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE – RECOLHIMENTO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-2');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $this->addReference('Classificacao383', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE – ELIMINAÇÃO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-3');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $this->addReference('Classificacao384', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE – ELIMINAÇÃO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-4');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $this->addReference('Classificacao385', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE – TRANSFERÊNCIA – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-5');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-TRANSFERÊNCIA'));
        $this->addReference('Classificacao386', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE – TRANSFERÊNCIA – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-6');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-TRANSFERÊNCIA'));
        $this->addReference('Classificacao387', $classificacao);
        $this->manager->persist($classificacao);
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – RECOLHIMENTO – EVENTO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-7');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento('ENQUANTO VIGORA');
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $this->addReference('Classificacao388', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – RECOLHIMENTO – ANO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-8');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(6);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $this->addReference('Classificacao389', $classificacao);
        $this->manager->persist($classificacao);   
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – ELIMINAÇÃO – EVENTO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-9');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento('ENQUANTO VIGORA');
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $this->addReference('Classificacao390', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – ELIMINAÇÃO – ANO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-10');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(6);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $this->addReference('Classificacao391', $classificacao);
        $this->manager->persist($classificacao);       
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – TRANSFERÊNCIA – EVENTO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-11');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento('ENQUANTO VIGORA');
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-TRANSFERÊNCIA'));
        $this->addReference('Classificacao392', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – TRANSFERÊNCIA – ANO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-12');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(6);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-TRANSFERÊNCIA'));
        $this->addReference('Classificacao393', $classificacao);
        $this->manager->persist($classificacao);  
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – RECOLHIMENTO – ANO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-13');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento('ENQUANTO VIGORA');
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $this->addReference('Classificacao394', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – RECOLHIMENTO – EVENTO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-14');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-RECOLHIMENTO'));
        $this->addReference('Classificacao395', $classificacao);
        $this->manager->persist($classificacao);    
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – ELIMINAÇÃO – ANO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-15');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento('ENQUANTO VIGORA');
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $this->addReference('Classificacao396', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – ELIMINAÇÃO – EVENTO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-16');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-ELIMINAÇÃO'));
        $this->addReference('Classificacao397', $classificacao);
        $this->manager->persist($classificacao);    
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – TRANSFERÊNCIA – ANO – EVENTO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-17');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(null);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento('ENQUANTO VIGORA');
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(5);
        $classificacao->setPrazoGuardaFaseCorrenteEvento(null);
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-TRANSFERÊNCIA'));
        $this->addReference('Classificacao398', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = new Classificacao();
        $classificacao->setNome('CORRENTE E INTERMEDIARIO – TRANSFERÊNCIA – EVENTO – ANO');
        $classificacao->setPermissaoUso(true);
        $classificacao->setCodigo('I00-18');
        $classificacao->setPrazoGuardaFaseIntermediariaDia(null);
        $classificacao->setPrazoGuardaFaseIntermediariaMes(null);
        $classificacao->setPrazoGuardaFaseIntermediariaAno(5);
        $classificacao->setPrazoGuardaFaseIntermediariaEvento(null);
        $classificacao->setPrazoGuardaFaseCorrenteDia(null);
        $classificacao->setPrazoGuardaFaseCorrenteMes(null);
        $classificacao->setPrazoGuardaFaseCorrenteAno(null);
        $classificacao->setPrazoGuardaFaseCorrenteEvento('ENQUANTO VIGORA');
        $classificacao->setModalidadeDestinacao($this->getReference('ModalidadeDestinacao-TRANSFERÊNCIA'));
        $this->addReference('Classificacao399', $classificacao);
        $this->manager->persist($classificacao);
            
            
        $classificacao = $this->getReference('Classificacao382');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao383');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao384');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao385');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao386');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao387');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao388');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao389');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);   
            
        $classificacao = $this->getReference('Classificacao390');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao391');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao392');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao393');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao394');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao395');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao396');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao397');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                      
            
            
        $classificacao = $this->getReference('Classificacao398');
        $classificacao->setParent($this->getReference('Classificacao381'));
        $this->manager->persist($classificacao);                                                 
            
            
        $classificacao = $this->getReference('Classificacao399');
        $classificacao->setParent($this->getReference('Classificacao381'));
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
        return ['test'];
    }
}
