<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SuppCore\AdministrativoBackend\Doctrine\DBAL\Logger;

use Doctrine\DBAL\Logging\SQLLogger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DbalLogger implements SQLLogger
{
    public const MAX_STRING_LENGTH = 32;
    public const BINARY_DATA_VALUE = '(binary value)';

    protected $logger;
    protected $stopwatch;
    protected $sql;
    protected $params;

    public function __construct(LoggerInterface $logger = null, Stopwatch $stopwatch = null)
    {
        $this->logger = $logger;
        $this->stopwatch = $stopwatch;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->sql = $sql;
        $this->params = $params;

        if (null !== $this->stopwatch) {
            $this->stopwatch->start('doctrine', 'doctrine');
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function stopQuery()
    {
        if (null !== $this->stopwatch) {
            $this->stopwatch->stop('doctrine');
        }

        $event = $this->stopwatch->getEvent('doctrine');

        if ($event) {
            $periods = $event->getPeriods();
            $duration = $periods[count($periods) - 1]->getDuration();
            if ((null !== $this->logger) && ($duration > 500)) {
                $this->logger->info(json_encode([
                    'sql' => $this->sql,
                    'duration' => $duration / 1000,
                    'params' => $this->params ? $this->normalizeParams($this->params) : null,
                ]));
            }
        }
    }

    private function normalizeParams(array $params): array
    {
        foreach ($params as $index => $param) {
            // normalize recursively
            if (\is_array($param)) {
                $params[$index] = $this->normalizeParams($param);
                continue;
            }

            if (!\is_string($params[$index])) {
                continue;
            }

            // non utf-8 strings break json encoding
            if (!preg_match('//u', $params[$index])) {
                $params[$index] = self::BINARY_DATA_VALUE;
                continue;
            }

            // detect if the too long string must be shorten
            if (self::MAX_STRING_LENGTH < mb_strlen($params[$index], 'UTF-8')) {
                $params[$index] = mb_substr($params[$index], 0, self::MAX_STRING_LENGTH - 6, 'UTF-8').' [...]';
                continue;
            }
        }

        return $params;
    }
}
