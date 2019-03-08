<?php

namespace VictorAvelar\Fixer\Resources;

use VictorAvelar\Fixer\FixerHttpClient;

/**
 * Class LatestRatesResource
 *
 * @package VictorAvelar\Fixer\Endpoints
 */
class LatestRatesResource extends AbstractFixerResource
{
    /**
     * Endpoint path.
     *
     * @var string
     */
    protected $path = "latest";

    /**
     * CurrencySupportResource constructor.
     *
     * @param FixerHttpClient $client
     */
    public function __construct(FixerHttpClient $client)
    {
        parent::__construct($client);
    }
}
