<?php

namespace GatherUp\Tests\SDK;

use GatherUp\SDK\JsonRequest;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * Class JsonRequestTest
 *
 * @package GatherUp\Tests\SDK
 */
class JsonRequestTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new JsonRequest('/test', '{demo');
    }

    public function testSuccess(): void
    {
        $request = new JsonRequest('/test', '{"demo":1}');
        $this->assertEquals('/test', $request->getEndpoint());
        $this->assertEquals(['demo' => 1], $request->getData());
    }
}
