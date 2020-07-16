<?php

namespace GatherUp\Tests\SDK;

use GatherUp\SDK\Client;
use GatherUp\SDK\CredentialsInterface;
use GatherUp\SDK\RequestInterface;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

/**
 * Class ClientTest
 *
 * @package GatherUp\Tests\SDK
 */
class ClientTest extends TestCase
{
    function test(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $request->method('getData')
            ->willReturn(
                [
                    'demo' => 1,
                ]
            );
        $request->method('getEndpoint')->willReturn('/test');

        $credentials = $this->createMock(CredentialsInterface::class);
        $credentials->method('getClientId')->willReturn('123');
        $credentials->method('getBearer')->willReturn('abc');

        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')->willReturn('{"demo":1}');

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($stream);

        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('request')
            ->with(
                $this->equalTo('POST'),
                $this->equalTo('https://app.gatherup.com/api/test'),
                $this->callback(
                    function ($arr) {
                        if (!isset($arr['headers'])) {
                            return false;
                        }
                        if (!isset($arr['headers']['Authorization'])) {
                            return false;
                        }
                        if ($arr['headers']['Authorization']
                            !== 'Bearer 123_abc'
                        ) {
                            return false;
                        }

                        if (!isset($arr['json'])) {
                            return false;
                        }
                        if (!isset($arr['json']['demo'])) {
                            return false;
                        }
                        if ($arr['json']['demo'] !== 1) {
                            return false;
                        }
                        if (!isset($arr['json']['aggregateResponse'])) {
                            return false;
                        }
                        if ($arr['json']['aggregateResponse'] !== 1) {
                            return false;
                        }

                        return true;
                    }
                )
            )
            ->willReturn($response);

        /**
         * @var RequestInterface     $request
         * @var CredentialsInterface $credentials
         * @var HttpClientInterface  $httpClient
         */
        $client = new Client($credentials, $httpClient);
        $this->assertEquals(1, $client->request($request)->get('demo'));
    }
}
