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

    public function setUp(): void
    {
        $this->client = new FixerHttpClient('abcdefgh123456789');
        parent::setUp();
    }

    public function testGetAPIVersion()
    {
        $this->assertEquals('0.1.0', $this->client->getAPIVersion());
    }

    public function testGetClientKey()
    {
        $this->assertEquals('abcdefgh123456789', $this->client->getClientKey());
    }

    public function testConstructorWorks()
    {
        $client = new FixerHttpClient('1212', ['headers' => ['Accept' => 'application/json']]);

        $this->assertArrayHasKey('Accept', $client->getConfig('headers'));
        $this->assertFalse($client->getConfig('allow_redirects'));
        $this->assertEquals($client->getConfig('timeout'), 10);
    }
}
