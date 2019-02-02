<?php
/**
 * Created by PhpStorm.
 * User: vavelar
 * Date: 2019-01-30
 * Time: 14:24
 */

namespace VictorAvelar\Fixer\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use VictorAvelar\Fixer\Endpoints\AbstractEndpoint;
use VictorAvelar\Fixer\Endpoints\CurrencySupportEndpoint;
use PHPUnit\Framework\TestCase;
use VictorAvelar\Fixer\FixerHttpClient;

class CurrencySupportEndpointTest extends TestCase
{
    /**
     * @var AbstractEndpoint|CurrencySupportEndpoint
     */
    private $endpoint;

    /**
     * @var FixerHttpClient
     */
    private $client;

    public function setUp(): void
    {
        parent::setUp();
        $mock = new MockHandler([
            new Response(200, [])
        ]);

        $handler = new HandlerStack($mock);

        $this->client = new FixerHttpClient('123124123', ['handler' => $handler]);
        $this->endpoint = new CurrencySupportEndpoint($this->client);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testExecute()
    {
        $this->assertEquals(200, $this->endpoint->execute()->getStatusCode());
    }

    public function testBuildURI()
    {
        $this->assertEquals('symbols?access_key='.$this->client->getClientKey(), $this->endpoint->buildURI());
    }
}
