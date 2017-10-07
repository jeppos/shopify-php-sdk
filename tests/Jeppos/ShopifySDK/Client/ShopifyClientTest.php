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

    public function testSuccessfulGetResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"mock":{"field":"value"}}'),
        ]);

        $sut = $this->createClient($mock);

        $actual = $sut->get('mock/resource');

        $this->assertEquals(['field' => 'value'], $actual);
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException
     */
    public function testGetResponseWithInvalidJson()
    {
        $mock = new MockHandler([
            new Response(200, [], ''),
        ]);

        $sut = $this->createClient($mock);

        $sut->get('mock/resource');
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyBadResponseException
     */
    public function testUnsuccessfulGetResponse()
    {
        $mock = new MockHandler([
            new Response(401, [], 'Unauthorized'),
        ]);

        $sut = $this->createClient($mock);

        $sut->get('mock/resource');
    }

    /**
     * @expectedException Jeppos\ShopifySDK\Client\ShopifyException
     */
    public function testNonGetResponse()
    {
        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request('GET', 'mock/resource'))
        ]);

        $sut = $this->createClient($mock);

        $sut->get('mock/resource');
    }
}
