<?php

namespace VictorAvelar\Fixer\Resources;

use VictorAvelar\Fixer\FixerHttpClient;

/**
 * Class CurrencySupportResource
 *
 * @package VictorAvelar\Fixer\Resources
 */
class CurrencySupportResource extends AbstractFixerResource
{
    /**
     * Endpoint path.
     *
     * @var string
     */
    protected $path = "symbols";

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
