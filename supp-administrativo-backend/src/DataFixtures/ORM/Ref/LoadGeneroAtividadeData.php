<?php

declare(strict_types=1);
/**
 * /src/DataFixtures/ORM/Prod/LoadGeneroAtividadeData.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\DataFixtures\ORM\Ref;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use SuppCore\AdministrativoBackend\Entity\GeneroAtividade;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadGeneroAtividadeData.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoadGeneroAtividadeData extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface, FixtureGroupInterface
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

        $generoAtividade = new GeneroAtividade();
        $generoAtividade->setNome('ADMINISTRATIVO');
        $generoAtividade->setDescricao('ADMINISTRATIVO');

        $this->manager->persist($generoAtividade);

        $this->addReference(
            'GeneroAtividade-'.$generoAtividade->getNome(),
            $generoAtividade
        );

        $generoAtividade = new GeneroAtividade();
        $generoAtividade->setNome('ARQUIVÍSTICO');
        $generoAtividade->setDescricao('ARQUIVÍSTICO');

        $this->manager->persist($generoAtividade);

        $this->addReference(
            'GeneroAtividade-'.$generoAtividade->getNome(),
            $generoAtividade
        );

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
        return 1;
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
