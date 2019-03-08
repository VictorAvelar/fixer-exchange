<?php

namespace VictorAvelar\Fixer\Resources;

use VictorAvelar\Fixer\Contracts\ExecutorInterface;
use VictorAvelar\Fixer\Contracts\QueryableInterface;
use VictorAvelar\Fixer\FixerHttpClient;

abstract class AbstractFixerResource implements ExecutorInterface, QueryableInterface
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
     * Query param.
     *
     * @var array
     */
    protected $params = [];

    /**
     * AbstractFixerResource constructor.
     *
     * @param FixerHttpClient $client
     */
    public function __construct(FixerHttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Builds a correct query string considering the params and the token.
     *
     * @return array
     */
    protected function parametrize(): array
    {
        return array_merge_recursive($this->params, [
            FixerHttpClient::KEY_NAME => $this->client->getClientKey()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function addQueryParam(string $name, string $value): QueryableInterface
    {
        array_push($this->params, [$name => $value]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addQueryParams(array $httpQueryParams): QueryableInterface
    {
        array_push($this->params, $httpQueryParams);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this->client->request(
            self::REQUEST_METHOD,
            $this->path,
            [
                'query' => $this->parametrize()
            ]
        );
    }
}
