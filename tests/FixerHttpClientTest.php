<?php

namespace VictorAvelar\Fixer\Tests;

use PHPUnit\Framework\TestCase;
use VictorAvelar\Fixer\FixerHttpClient;

class FixerHttpClientTest extends TestCase
{
    /**
     * @var FixerHttpClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = new FixerHttpClient('abcdefgh123456789');
    }

    public function testGetAPIVersion()
    {
        $this->assertEquals('0.1.0', $this->client->getAPIVersion());
    }

    public function testGetClientKey()
    {
        $this->assertEquals('abcdefgh123456789', $this->client->getClientKey());
    }
}
