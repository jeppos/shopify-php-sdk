<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Client\ShopifyClient;
use Jeppos\ShopifySDK\Serializer\ConfiguredSerializer;
use PHPUnit\Framework\TestCase;

abstract class AbstractServiceTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ShopifyClient
     */
    protected $clientMock;
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ConfiguredSerializer
     */
    protected $serializerMock;

    protected function setUp()
    {
        $this->clientMock = $this->createMock(ShopifyClient::class);
        $this->serializerMock = $this->createMock(ConfiguredSerializer::class);
    }

    /**
     * @param string $uri
     */
    protected function expectSuccessfulDeletion(string $uri): void
    {
        $this->clientMock
            ->expects($this->once())
            ->method('delete')
            ->with($uri)
            ->willReturn(true);
    }

    /**
     * @param string $uri
     * @param $response
     * @param array $options
     */
    protected function expectGetReturnsResponse(string $uri, $response, array $options = []): void
    {
        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with($uri, $options)
            ->willReturn($response);
    }

    /**
     * @param $response
     * @param string $className
     */
    protected function expectResponseBeingDeserialized($response, string $className): void
    {
        $this->serializerMock
            ->expects($this->once())
            ->method('deserialize')
            ->with($response, $className)
            ->willReturn(new $className());
    }

    /**
     * @param $response
     * @param string $className
     */
    protected function expectResponseBeingDeserializedAsList($response, string $className): void
    {
        $this->serializerMock
            ->expects($this->once())
            ->method('deserializeList')
            ->with($response, $className)
            ->willReturn([new $className(), new $className()]);
    }

    /**
     * @param string $key
     * @param $object
     * @param string $serializedObject
     */
    protected function expectModelBeingSerializedForPost(string $key, $object, string $serializedObject): void
    {
        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($object, $key, ['post'])
            ->willReturn($serializedObject);
    }

    /**
     * @param string $key
     * @param $object
     * @param string $serializedObject
     */
    protected function expectModelBeingSerializedForPut(string $key, $object, string $serializedObject): void
    {
        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($object, $key, ['put'])
            ->willReturn($serializedObject);
    }

    /**
     * @param string $uri
     * @param string $body
     * @param $response
     */
    protected function expectPostReturnsResponse(string $uri, string $body, $response): void
    {
        $this->clientMock
            ->expects($this->once())
            ->method('post')
            ->with($uri, $body)
            ->willReturn($response);
    }

    /**
     * @param string $uri
     * @param string $body
     * @param $response
     */
    protected function expectPutReturnsResponse(string $uri, string $body, $response): void
    {
        $this->clientMock
            ->expects($this->once())
            ->method('put')
            ->with($uri, $body)
            ->willReturn($response);
    }
}
