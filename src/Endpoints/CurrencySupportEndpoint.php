<?php

namespace VictorAvelar\Fixer\Endpoints;

use VictorAvelar\Fixer\FixerHttpClient;

class CurrencySupportEndpoint extends AbstractEndpoint
{
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
