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
     * FixerHttpClient constructor.
     *
     * @param string $clientKey
     * @param array  $options
     */
    public function __construct(string $clientKey, array $options = [])
    {
        $opt = array_merge_recursive($options, [
            'base_uri' => self::BASE_URL,
            'timeout' => self::API_TIMEOUT,
            'allow_redirects' => false
        ]);

        parent::__construct($opt);

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
