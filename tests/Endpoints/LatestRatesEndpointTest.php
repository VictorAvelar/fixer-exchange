<?php
/**
 * Created by PhpStorm.
 * User: victoravelar
 * Date: 2019-02-02
 * Time: 11:36
 */

namespace VictorAvelar\Fixer\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use VictorAvelar\Fixer\Endpoints\AbstractEndpoint;
use VictorAvelar\Fixer\Endpoints\LatestRatesEndpoint;
use PHPUnit\Framework\TestCase;
use VictorAvelar\Fixer\FixerHttpClient;

class LatestRatesEndpointTest extends TestCase
{
    /**
     * @var AbstractEndpoint|LatestRatesEndpoint
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
        $this->endpoint = new LatestRatesEndpoint($this->client);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testExecute()
    {
        $this->assertEquals(200, $this->endpoint->execute()->getStatusCode());
    }
}
