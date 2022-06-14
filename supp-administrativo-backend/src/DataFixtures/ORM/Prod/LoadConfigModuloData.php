<?php

declare(strict_types=1);
/**
 * /src/DataFixtures/ORM/Prod/LoadConfigModuloData.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\DataFixtures\ORM\Prod;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use SuppCore\AdministrativoBackend\Entity\ConfigModulo;
use SuppCore\AdministrativoBackend\Entity\Processo;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadConfigModuloData.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class LoadConfigModuloData extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface, FixtureGroupInterface
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

        $configModulo = new ConfigModulo();
        $configModulo->setModulo($this->getReference('Modulo-ADMINISTRATIVO'));
        $configModulo->setNome('supp_core.administrativo_backend.gerador_dossie.template');
        $configModulo->setDescricao('CONFIGURAÇÕES RELATIVAS À GERAÇÃO DE DOSSIÊS');
        $configModulo->setInvalid(false);
        $configModulo->setMandatory(false);
        $configModulo->setDataType('json');
        $configModulo->setDataSchema(
            json_encode([
                '$schema' => 'http://json-schema.org/draft-07/schema#',
                'type' => 'array',
                'minItems' => 1,
                'items' => [
                    '$ref' => '#/definitions/configDossie'
                ],
                'additionalProperties' => false,
                'definitions' => [
                    'configDossie' => [
                        '$comment' => '',
                        'type' => 'object',
                        'additionalProperties' => false,
                        'properties' => [
                            'nome_tipo_dossie' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                            ],
                            'template' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                            ],
                            'ativo' => [
                                '$comment' => '',
                                'type' => 'boolean',
                                'default' => true,
                            ],
                            'pesquisa_assunto_pai' => [
                                '$comment' => '',
                                'type' => 'boolean',
                                'default' => true,
                            ],
                            'assuntos_suportados' => [
                                '$comment' => '',
                                'type' => 'array',
                                'items' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                ],
                                'default' => [
                                    0 => '*',
                                ],
                            ],
                            'siglas_unidades_suportadas' => [
                                '$comment' => '',
                                'type' => 'array',
                                'items' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                ],
                                'default' => [
                                    0 => '*',
                                ],
                            ],
                            'tarefas_suportadas' => [
                                '$comment' => '',
                                'type' => 'array',
                                'items' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                ],
                                'default' => [
                                    0 => '*',
                                ],
                                'examples' => [
                                    0 => [
                                        0 => 'MILITAR',
                                        1 => 'SERVIDOR PÚBLICO CIVIL',
                                    ],
                                ],
                            ],
                        ],
                        'required' => [
                            0 => 'assuntos_suportados',
                            1 => 'ativo',
                            2 => 'pesquisa_assunto_pai',
                            3 => 'siglas_unidades_suportadas',
                            4 => 'tarefas_suportadas',
                            5 => 'template',
                        ],
                    ],
                ],
            ], JSON_UNESCAPED_SLASHES)
        );
        $this->manager->persist($configModulo);
        $this->addReference(
            'ConfigModulo-'.$configModulo->getNome(),
            $configModulo
        );

        $configModulo = new ConfigModulo();
        $configModulo->setModulo($this->getReference('Modulo-ADMINISTRATIVO'));
        $configModulo->setNome('supp_core.administrativo_backend.processo.template');
        $configModulo->setDescricao('TEMPLATE PARA CRIAÇÃO DE PROCESSO');
        $configModulo->setInvalid(false);
        $configModulo->setMandatory(false);
        $configModulo->setDataType('json');
        $configModulo->setDataSchema(
            json_encode([
                '$schema' => 'http://json-schema.org/draft-07/schema#',
                '$ref' => '#/definitions/processo_template',
                'additionalProperties' => false,
                'definitions' => [
                    'processo_template' => [
                        '$comment' => '',
                        'type' => 'object',
                        'additionalProperties' => false,
                        'properties' => [
                            'nup' => [
                                '$comment' => 'Caso não seja informado, será cadastrado como novo tipo de processo',
                                'type' => 'string',
                                'pattern' => '$[0-9]{17}|([0-9]{21}^',
                                'example' => '',
                            ],
                            'unidade_arquivistica' => [
                                '$comment' => '',
                                'type' => 'integer',
                                'example' => [
                                    Processo::UA_PROCESSO
                                ],
                                'default' => Processo::UA_PROCESSO
                            ],
                            'cpf_cnpj_procedencia' => [
                                '$comment' => '',
                                'type' => 'string',
                                'pattern' => '$[0-9]{11}|([0-9]{14}^',
                                'example' => '',
                            ],
                            'nome_especie_processo' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                            'nome_genero_processo' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                            'codigo_classificacao' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                            'valor_modalidade_interessado_ativo' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                            'valor_modalidade_interessado_passivo' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                            'assunto_administrativo' => [
                                '$comment' => '',
                                'type' => 'object',
                                'additionalProperties' => false,
                                'properties' => [
                                    'nome' => [
                                        '$comment' => '',
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'example' => ['DOSSIÊ DE GESTÃO DEVEDOR'],
                                    ],
                                    'codigo_cnj' => [
                                        '$comment' => '',
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'example' => ['5989'],
                                    ]
                                ],
                                'example' => '',
                            ],
                            'valor_modalidade_meio' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                            'prefixo_titulo' => [
                                '$comment' => '',
                                'type' => 'string',
                                'minLength' => 1,
                                'example' => '',
                            ],
                        ],
                        'required' => [],
                    ],
                ],
            ], JSON_UNESCAPED_SLASHES)
        );
        $this->manager->persist($configModulo);
        $this->addReference(
            'ConfigModulo-'.$configModulo->getNome(),
            $configModulo
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
        return 10012;
    }

    /**
     * This method must return an array of groups
     * on which the implementing class belongs to.
     *
     * @return string[]
     */
    public static function getGroups(): array
    {
        return ['prod', 'dev', 'test'];
    }
}
