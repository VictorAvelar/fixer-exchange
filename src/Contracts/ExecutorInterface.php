<?php

namespace VictorAvelar\Fixer\Contracts;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface ExecutorInterface
 *
 * @package VictorAvelar\Fixer\Contracts
 */
interface ExecutorInterface
{
    /**
     * Executes the API call.
     *
     * @return ResponseInterface|mixed
     *
     * @throws GuzzleException
     */
    public function execute();
}
