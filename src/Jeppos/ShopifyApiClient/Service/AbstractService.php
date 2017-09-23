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
     * @return string
     */
    abstract protected function getResourceKey(): string;

    /**
     * @return string
     */
    abstract protected function getResourceModel(): string;
}
