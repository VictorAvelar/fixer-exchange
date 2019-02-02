<?php

namespace VictorAvelar\Fixer\Endpoints;

use VictorAvelar\Fixer\Contracts\ExecutorInterface;
use VictorAvelar\Fixer\FixerHttpClient;

abstract class AbstractEndpoint implements ExecutorInterface
{
    /**
     * Execution method.
     */
    const REQUEST_METHOD = "GET";

    /**
     * @var FixerHttpClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $path = "";

    /**
     * AbstractEndpoint constructor.
     *
     * @param FixerHttpClient $client
     */
    public function __construct(FixerHttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this->client->request(
            self::REQUEST_METHOD,
            $this->path,
            ['query' => [FixerHttpClient::KEY_NAME => $this->client->getClientKey()]]
        );
    }
}
