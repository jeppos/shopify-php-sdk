<?php

namespace Tests\Jeppos\ShopifyApiClient\Client;

use GuzzleHttp\{
    Client, Handler\MockHandler, HandlerStack, Psr7\Response
};
use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopifyClientTest
 * @package Tests\Jeppos\ShopifyApiClient\Client
 */
class ShopifyClientTest extends TestCase
{
    public function testGetResource()
    {
        $expectedJson = '{"field":"value"}';

        $mock = new MockHandler([
            new Response(200, [], '{"mock":' . $expectedJson . '}'),
        ]);

        $handler = HandlerStack::create($mock);

        $guzzleClient = new Client(['handler' => $handler]);
        $sut = new ShopifyClient($guzzleClient);

        $actual = $sut->get('mock', 'any-resource');

        $this->assertEquals($expectedJson, $actual);
    }

    public function testGetListOfResources()
    {
        $expectedJson = ['{"field":"value"}', '{"field":"value"}'];

        $mock = new MockHandler([
            new Response(200, [], '{"mocks":[' . implode(',', $expectedJson) . ']}'),
        ]);

        $handler = HandlerStack::create($mock);

        $guzzleClient = new Client(['handler' => $handler]);
        $sut = new ShopifyClient($guzzleClient);

        $actual = $sut->getList('mock', 'any-resource');

        $this->assertEquals($expectedJson, $actual);
    }
}
