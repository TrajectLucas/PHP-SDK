<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 10.10.18
 * Time: 20:16
 */

namespace GatherUp\Tests\SDK;

use GatherUp\SDK\JsonRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class JsonRequestTest
 *
 * @package GatherUp\Tests\SDK
 */
class JsonRequestTest extends TestCase
{
    public function testException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new JsonRequest('/test', '{demo');
    }

    public function testSuccess()
    {
        $request = new JsonRequest('/test', '{"demo":1}');
        $this->assertEquals('/test', $request->getEndpoint());
        $this->assertEquals(['demo' => 1], $request->getData());
    }
}
