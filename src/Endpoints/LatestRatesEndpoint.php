<?php

namespace VictorAvelar\Fixer\Endpoints;

use VictorAvelar\Fixer\FixerHttpClient;

/**
 * Class LatestRatesEndpoint
 *
 * @package VictorAvelar\Fixer\Endpoints
 */
class LatestRatesEndpoint extends AbstractEndpoint
{
    /**
     * Endpoint path.
     *
     * @var string
     */
    protected $path = "latest";

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
