<?php
/**
 * Created by PhpStorm.
 * User: victoravelar
 * Date: 2019-03-08
 * Time: 20:41
 */

namespace VictorAvelar\Fixer\Tests\Resources;

use VictorAvelar\Fixer\Contracts\QueryableInterface;
use VictorAvelar\Fixer\FixerHttpClient;
use VictorAvelar\Fixer\Resources\AbstractFixerResource;
use PHPUnit\Framework\TestCase;

class AbstractFixerResourceTest extends TestCase
{
    /**
     * @var AbstractFixerResource
     */
    protected $dummy;

    /**
     * Test setup
     */
    public function setUp(): void
    {
        $client = new FixerHttpClient("dummy-key");
        $this->dummy = new class($client) extends AbstractFixerResource {
        };
    }

    public function testAddQueryParams()
    {
        $this->assertInstanceOf(AbstractFixerResource::class, $this->dummy);
        $this->assertInstanceOf(QueryableInterface::class, $this->dummy->addQueryParams([]));
    }

    public function testAddQueryParam()
    {
        $this->assertInstanceOf(AbstractFixerResource::class, $this->dummy);
        $this->assertInstanceOf(QueryableInterface::class, $this->dummy->addQueryParam('some', 'value'));
    }
}
