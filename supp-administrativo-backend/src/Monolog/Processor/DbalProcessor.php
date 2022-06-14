<?php

declare(strict_types=1);
/**
 * /src/Rest/Controller.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Monolog\Processor;

use function array_merge;

/**
 * Injeta elementos do doctrine.
 *
 * @author Eduardo Lang <edu.lang@hotmail.com>
 */
class DbalProcessor
{
    /**
     * @param array $record
     *
     * @return array
     */
    public function __invoke(array $record)
    {
        if ('doctrine' !== $record['channel']) {
            return $record;
        }

        $doctrine = [];

        $context = json_decode($record['message'], true);

        if (is_array($context) && !empty($context)) {
            foreach ($context as $key => $val) {
                if ('sql' === $key || 'duration' === $key) {
                    $doctrine['dbal'][$key] = $val;
                }
                if ('params' === $key) {
                    $doctrine['dbal'][$key] = json_encode($val);
                }
            }
        }

        $record['message'] = 'slow query';

        $record['extra'] = array_merge(
            $record['extra'],
            $doctrine
        );

        return $record;
    }
}
