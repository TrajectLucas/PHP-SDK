<?php

namespace GatherUp\Tests\SDK;

use GatherUp\SDK\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 *
 * @package GatherUp\Tests\SDK
 */
class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = new Request('');
        $this->assertEquals('', $request->getEndpoint());
        $this->assertEquals([], $request->getData());

    }

    public function testNotEmpty(): void
    {
        $request = new Request('/test', ['demo' => 1]);
        $this->assertEquals('/test', $request->getEndpoint());
        $this->assertEquals(['demo' => 1], $request->getData());
    }
}
