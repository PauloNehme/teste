<?php

declare(strict_types=1);
/**
 * /src/Fields/RendererManager.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Fields;

use function explode;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ComponenteDigitalResource;
use SuppCore\AdministrativoBackend\Entity\Documento;
use SuppCore\AdministrativoBackend\Entity\EntityInterface;
use SuppCore\AdministrativoBackend\Utils\lib\simple_html_dom;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function trim;
use Twig\Environment;

/**
 * Class RendererManager.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class RendererManager
{
    private Environment $twig;
    private TokenStorageInterface $tokenStorage;
    private FieldsManager $fieldsManager;
    private ParameterBagInterface $parameterBag;
    private ComponenteDigitalResource $componenteDigitalResource;

    /**
     * RendererManager constructor.
     */
    public function __construct(
        Environment $twig,
        TokenStorageInterface $tokenStorage,
        FieldsManager $fieldsManager,
        ParameterBagInterface $parameterBag,
        ComponenteDigitalResource $componenteDigitalResource
    ) {
        $this->twig = $twig;
        $this->tokenStorage = $tokenStorage;
        $this->fieldsManager = $fieldsManager;
        $this->parameterBag = $parameterBag;
        $this->componenteDigitalResource = $componenteDigitalResource;
    }

    public function renderModelo(
        EntityInterface $componenteDigital,
        string $transactionId,
        array $contextoEspecifico = [],
        ?string $conteudoReprocessado = null
    ): string {
        /** @var Documento $documento */
        $documento = $componenteDigital->getDocumento();

        $processo = $documento->getProcessoOrigem();
        $tarefa = $documento->getTarefaOrigem();

        $parser = new simple_html_dom();

        if (!$conteudoReprocessado) {
            $conteudoHTMLTemplate = $this->componenteDigitalResource->download(
                $componenteDigital->getModelo()->getTemplate()->getDocumento()->getComponentesDigitais()[0]->getId(),
                $transactionId
            )->getConteudo();
            $conteudoHTMLModelo = $this->componenteDigitalResource->download(
                $componenteDigital->getModelo()->getDocumento()->getComponentesDigitais()[0]->getId(),
                $transactionId
            )->getConteudo();

            $parser->load($conteudoHTMLTemplate);

            foreach ($parser->find('div') as $div) {
                if ('conteudoModelo' === $div->id) {
                    $div->outertext = $conteudoHTMLModelo;
                    break;
                }
            }
        } else {
            $parser->load($conteudoReprocessado);
        }

        /* @noinspection PhpUndefinedFieldInspection */
        $parser->load($parser->innertext);

        $usuario = $this->tokenStorage->getToken()->getUser();

        // na soma de arrays se uma chava se repete prevalece a chave do primeiro array
        // no caso abaixo, do array referente ao contexto "generico" em detrimento do especifico
        $contexto = [
            'processo' => $processo,
            'documento' => $documento,
            'tarefa' => $tarefa,
            'usuario' => $usuario,
            'componenteDigital' => $componenteDigital,
        ] + $contextoEspecifico;

        foreach ($parser->find('span') as $span) {
            if (isset($span->{'data-method'})) {
                $name = $span->{'data-method'};
                $options = explode(', ', $span->{'data-options'});
                $field = $this->fieldsManager->getField($name);
                if ($field) {
                    $span->innertext = $field->render($transactionId, $contexto, $options);
                    continue;
                }
                $field = $this->fieldsManager->getField($this->getNomeCampo($span->innertext));
                if ($field) {
                    $span->innertext = str_replace(
                        '*'.$this->getNomeCampo($span->innertext).'*',
                        $field->render($transactionId, $contexto, $options),
                        $span->innertext
                    );
                }
                $span->outertext = '';
            }
        }

        /* @noinspection PhpUndefinedFieldInspection */
        return $this->renderCkeditor($parser->innertext);
    }

    /**
     * @return string
     */
    public function renderCkeditor(string $conteudo)
    {
        return $this->twig->render(
            $this->parameterBag->get('supp_core.administrativo_backend.template_ckeditor_administrativo_comum'),
            [
                'conteudo' => $conteudo,
            ]
        );
    }

    /**
     * @param $text
     *
     * @return bool|string
     */
    private function getNomeCampo($text)
    {
        $strings = explode('*', $text);

        if (count($strings) > 1) {
            return trim($strings[1]);
        } else {
            return false;
        }
    }
}
