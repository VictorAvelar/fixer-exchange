<?php

namespace VictorAvelar\Fixer\Endpoints;

use VictorAvelar\Fixer\FixerHttpClient;

class CurrencySupportEndpoint extends AbstractEndpoint
{
    /**
     * Method to perform requests to this endpoint.
     */
    const REQUEST_METHOD = "GET";

    /**
     * Endpoint path.
     *
     * @var string
     */
    protected $path = "symbols";

    /**
     * CurrencySupportEndpoint constructor.
     *
     * @param FixerHttpClient $client
     */
    public function __construct(FixerHttpClient $client)
    {
        parent::__construct($client);
    }
}
