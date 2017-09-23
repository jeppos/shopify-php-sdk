<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use JMS\Serializer\SerializerInterface;

/**
 * Class AbstractCallService
 * @package Jeppos\ShopifyApiClient\Service
 */
abstract class AbstractService
{
    /**
     * @var ShopifyClient
     */
    protected $client;
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * AbstractCallService constructor.
     * @param ShopifyClient $client
     * @param SerializerInterface $serializer
     */
    public function __construct(ShopifyClient $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param string $type
     * @param int|string|null $resource
     * @param array $options
     * @return mixed
     */
    protected function get(string $type, $resource = null, array $options = [])
    {
        $json = $this->client->get($this->getResourceKey(), $resource, $options);

        return $this->serializer->deserialize($json, $type, 'json');
    }

    /**
     * @param string $type
     * @param int|string|null $resource
     * @param array $options
     * @return array
     */
    protected function getList(string $type, $resource = null, array $options = []): array
    {
        $response = $this->client->getList($this->getResourceKey(), $resource, $options);

        return array_map(
            function ($json) use ($type) {
                return $this->serializer->deserialize($json, $type, 'json');
            },
            $response
        );
    }

    /**
     * @return string
     */
    abstract protected function getResourceKey(): string;
}
