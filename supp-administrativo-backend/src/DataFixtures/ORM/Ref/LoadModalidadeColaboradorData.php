<?php

declare(strict_types=1);
/**
 * /src/DataFixtures/ORM/Prod/LoadModalidadeColaboradorData.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\DataFixtures\ORM\Ref;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use SuppCore\AdministrativoBackend\Entity\ModalidadeColaborador;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadModalidadeColaboradorData.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoadModalidadeColaboradorData extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface, FixtureGroupInterface
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

        $modalidadeColaborador = new ModalidadeColaborador();
        $modalidadeColaborador->setValor('MEMBRO');
        $modalidadeColaborador->setDescricao('MEMBRO');

        $this->manager->persist($modalidadeColaborador);

        $this->addReference('ModalidadeColaborador-'.$modalidadeColaborador->getValor(), $modalidadeColaborador);

        $modalidadeColaborador = new ModalidadeColaborador();
        $modalidadeColaborador->setValor('SERVIDOR');
        $modalidadeColaborador->setDescricao('SERVIDOR');

        $this->manager->persist($modalidadeColaborador);

        $this->addReference('ModalidadeColaborador-'.$modalidadeColaborador->getValor(), $modalidadeColaborador);

        $modalidadeColaborador = new ModalidadeColaborador();
        $modalidadeColaborador->setValor('ESTAGIÁRIO');
        $modalidadeColaborador->setDescricao('ESTAGIÁRIO');

        $this->manager->persist($modalidadeColaborador);

        $this->addReference('ModalidadeColaborador-'.$modalidadeColaborador->getValor(), $modalidadeColaborador);

        $modalidadeColaborador = new ModalidadeColaborador();
        $modalidadeColaborador->setValor('TERCEIRIZADO');
        $modalidadeColaborador->setDescricao('TERCEIRIZADO');

        $this->manager->persist($modalidadeColaborador);

        $this->addReference('ModalidadeColaborador-'.$modalidadeColaborador->getValor(), $modalidadeColaborador);

        // Flush database changes
        $this->manager->flush();
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

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 1;
    }
}
