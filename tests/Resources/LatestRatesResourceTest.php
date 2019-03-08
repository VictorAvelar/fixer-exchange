<?php

namespace VictorAvelar\Fixer\Tests\Resources;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use VictorAvelar\Fixer\FixerHttpClient;
use VictorAvelar\Fixer\Resources\AbstractFixerResource;
use VictorAvelar\Fixer\Resources\LatestRatesResource;

class LatestRatesResourceTest extends TestCase
{
    /**
     * @var AbstractFixerResource|LatestRatesResource
     */
    private $resource;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockHandler = new MockHandler();

        $client = new FixerHttpClient('123124123', ['handler' => $this->mockHandler]);
        $this->resource = new LatestRatesResource($client);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testExecute()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__."/../_data/latest.json"))
        );
        $response = json_decode($this->resource->execute()->getBody()->getContents(), true);
        $this->assertEquals(21.904429, $response["rates"]["MXN"]);
        $this->assertTrue($response['success']);
    }
}
