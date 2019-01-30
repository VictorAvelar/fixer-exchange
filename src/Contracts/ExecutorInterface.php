<?php

namespace VictorAvelar\Fixer\Contracts;

interface ExecutorInterface
{
    /**
     * Executes the API call.
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute();
}
