<?php

declare(strict_types=1);
/**
 * /src/DataFixtures/ORM/Test/LoadCompartilhamentoData.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\DataFixtures\ORM\Test;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use SuppCore\AdministrativoBackend\Entity\Compartilhamento;
use SuppCore\AdministrativoBackend\Entity\Coordenador;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadCompartilhamentoData.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoadCompartilhamentoData extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface, FixtureGroupInterface
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

        $compartilhamento = new Compartilhamento();
        $compartilhamento->setUsuario($this->getReference('Usuario-00000000006'));
        $compartilhamento->setTarefa($this->getReference('Tarefa-TESTE_1'));
        $compartilhamento->setProcesso($this->getReference('Processo-TESTE_1'));
        $compartilhamento->setAssessor(false);

        // Persist entity
        $this->manager->persist($compartilhamento);

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
        return 7;
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
