<?php

namespace VictorAvelar\Fixer;

use GuzzleHttp\Client;

class FixerHttpClient extends Client
{
    /**
     * Library version.
     */
    const VERSION = "0.1.0";

    /**
     * API base URL.
     */
    const BASE_URL = "https://data.fixer.io/api/";

    /**
     * How to name the property containing the API key.
     */
    const KEY_NAME = "access_key";

    /**
     * Default API timeout.
     */
    const API_TIMEOUT = 10;

    /**
     * @var string
     */
    private $clientKey;

    /**
     * @var Client
     */
    private $client;

    /**
     * FixerHttpClient constructor.
     *
     * @param string $clientKey
     */
    public function __construct(string $clientKey)
    {
        parent::__construct([
            'base_uri' => self::BASE_URL,
            'timeout' => self::API_TIMEOUT,
            'allow_redirects' => false
        ]);

        $this->clientKey = $clientKey;
    }

    /**
     * Retrieve the API version.
     *
     * @return string
     */
    public function getAPIVersion(): string
    {
        return self::VERSION;
    }

    /**
     * @return string
     */
    public function getClientKey(): string
    {
        return $this->clientKey;
    }
}
