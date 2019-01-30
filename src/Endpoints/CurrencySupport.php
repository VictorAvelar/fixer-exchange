<?php

namespace VictorAvelar\Fixer\Endpoints;

use VictorAvelar\Fixer\Contracts\ExecutorInterface;
use VictorAvelar\Fixer\FixerHttpClient;

class CurrencySupport extends AbstractEndpoint implements ExecutorInterface
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
     * CurrencySupport constructor.
     *
     * @param FixerHttpClient $client
     */
    public function __construct(FixerHttpClient $client)
    {
        parent::__construct($client);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this->client->request(
            self::REQUEST_METHOD,
            $this->path
        );
    }
}
