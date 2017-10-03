<?php

namespace Tests\Jeppos\ShopifySDK\Client;

use GuzzleHttp\{
    Client, Handler\MockHandler, HandlerStack, Psr7\Response
};
use Jeppos\ShopifySDK\Client\ShopifyClient;
use PHPUnit\Framework\TestCase;

class ShopifyClientTest extends TestCase
{
    public function testGetResource()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"mock":{"field":"value"}}'),
        ]);

        $handler = HandlerStack::create($mock);

        $guzzleClient = new Client(['handler' => $handler]);
        $sut = new ShopifyClient($guzzleClient);

        $actual = $sut->get('mock/resource');

        $this->assertEquals(['field' => 'value'], $actual);
    }

    public function testGetListOfResources()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"mocks":[{"field":"value"},{"field":"value"}]}'),
        ]);

        $handler = HandlerStack::create($mock);

        $guzzleClient = new Client(['handler' => $handler]);
        $sut = new ShopifyClient($guzzleClient);

        $actual = $sut->get('mock/resource');

        $this->assertEquals([
            [
                'field' => 'value'
            ],
            [
                'field' => 'value'
            ]
        ], $actual);
    }
}
