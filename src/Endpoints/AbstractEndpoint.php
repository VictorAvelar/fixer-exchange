<?php

namespace VictorAvelar\Fixer\Endpoints;

use VictorAvelar\Fixer\FixerHttpClient;

abstract class AbstractEndpoint
{
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
     * Builds the correct URI to perform requests.
     *
     * @param array $params
     *
     * @return string
     */
    public function buildURI(array $params = []): string
    {
        return join('?', [$this->path, $this->attachQueryParams($params)]);
    }

    /**
     * Attach query params to the request.
     *
     * @param array $params
     *
     * @return string
     */
    private function attachQueryParams(array $params = []): string
    {
        return http_build_query(array_merge($params, [
            FixerHttpClient::KEY_NAME => $this->client->getClientKey()
        ]));
    }
}
