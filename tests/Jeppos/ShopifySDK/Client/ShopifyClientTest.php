<?php

namespace Tests\Jeppos\ShopifySDK\Client;

use GuzzleHttp\{
    Client, Exception\RequestException, Handler\MockHandler, HandlerStack, Psr7\Request, Psr7\Response
};
use Jeppos\ShopifySDK\Client\ShopifyClient;
use PHPUnit\Framework\TestCase;

class ShopifyClientTest extends TestCase
{
    /**
     * @param MockHandler $mock
     * @return ShopifyClient
     */
    protected function createClient(MockHandler $mock): ShopifyClient
    {
        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handler]);

        return new ShopifyClient($guzzleClient);
    }

    /**
     * @dataProvider methodProvider
     * @param $callback
     */
    public function testSuccessfulResponse($callback)
    {
        $mock = new MockHandler([
            new Response(200, [], '{"mock":{"field":"value"}}'),
        ]);

        $sut = $this->createClient($mock);

        $this->assertEquals(['field' => 'value'], $callback($sut));
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException
     * @dataProvider methodProvider
     * @param $callback
     */
    public function testInvalidJsonResponse($callback)
    {
        $mock = new MockHandler([
            new Response(200, [], ''),
        ]);

        $sut = $this->createClient($mock);

        $callback($sut);
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyBadResponseException
     * @dataProvider methodProvider
     * @param $callback
     */
    public function testUnsuccessfulResponse($callback)
    {
        $mock = new MockHandler([
            new Response(401, [], 'Unauthorized'),
        ]);

        $sut = $this->createClient($mock);

        $callback($sut);
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyException
     * @dataProvider methodProvider
     * @param $callback
     */
    public function testNonResponse($callback)
    {
        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request('GET', 'mock/resource'))
        ]);

        $sut = $this->createClient($mock);

        $callback($sut);
    }

    public function methodProvider()
    {
        return [
            [
                function (ShopifyClient $sut) {
                    return $sut->get('mock/resource');
                },
            ],
            [
                function (ShopifyClient $sut) {
                    return $sut->post('mock/resource', 'body');
                },
            ],
            [
                function (ShopifyClient $sut) {
                    return $sut->put('mock/resource', 'body');
                },
            ],
        ];
    }

    public function testSuccessfulDeleteResponse()
    {
        $mock = new MockHandler([
            new Response(200),
        ]);

        $sut = $this->createClient($mock);

        $actual = $sut->delete('mock/resource');

        $this->assertTrue($actual);
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyBadResponseException
     */
    public function testUnsuccessfulDeleteResponse()
    {
        $mock = new MockHandler([
            new Response(401, [], 'Unauthorized'),
        ]);

        $sut = $this->createClient($mock);

        $sut->delete('mock/resource');
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyException
     */
    public function testNonDeleteResponse()
    {
        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request('GET', 'mock/resource'))
        ]);

        $sut = $this->createClient($mock);

        $sut->delete('mock/resource');
    }
}
