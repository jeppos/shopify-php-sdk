<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use JMS\Serializer\Serializer;

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
     * @var Serializer
     */
    protected $serializer;

    /**
     * AbstractCallService constructor.
     * @param ShopifyClient $client
     * @param Serializer $serializer
     */
    public function __construct(ShopifyClient $client, Serializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    abstract protected function getResourceKey(): string;

    /**
     * @return string
     */
    protected function getPluralizedResourceKey(): string
    {
        return $this->getResourceKey() . 's';
    }

    /**
     * @param string $key
     * @param mixed $resource
     * @param string $prefix
     * @return string
     */
    protected function buildUri($resource = null, string $prefix = null, string $key = null): string
    {
        return implode('/', array_filter([$key ?: $this->getPluralizedResourceKey(), $prefix, $resource])) . '.json';
    }
}
