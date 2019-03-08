<?php

namespace VictorAvelar\Fixer\Tests\Resources;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use VictorAvelar\Fixer\FixerHttpClient;
use VictorAvelar\Fixer\Resources\AbstractFixerResource;
use VictorAvelar\Fixer\Resources\CurrencySupportResource;

class CurrencySupportResourceTest extends TestCase
{
    /**
     * @var AbstractFixerResource|CurrencySupportResource
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
        $this->resource = new CurrencySupportResource($client);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testExecute()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__."/../_data/symbols.json"))
        );
        $response = json_decode($this->resource->execute()->getBody()->getContents(), true);
        $this->assertEquals("Mexican Peso", $response["symbols"]["MXN"]);
        $this->assertTrue($response['success']);
    }
}
