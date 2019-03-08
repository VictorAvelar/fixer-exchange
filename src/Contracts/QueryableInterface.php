<?php

namespace VictorAvelar\Fixer\Contracts;

/**
 * Interface QueryableInterface
 *
 * @package VictorAvelar\Fixer\Contracts
 */
interface QueryableInterface
{
    /**
     * Adds a query param to the request.
     *
     * @param string $name
     * @param string $value
     *
     * @return QueryableInterface
     */
    public function addQueryParam(string $name, string $value): QueryableInterface;

    /**
     * Bulk addition of query parameters.
     *
     * @param array $httpQueryParams
     *
     * @return QueryableInterface
     */
    public function addQueryParams(array $httpQueryParams): QueryableInterface;
}
