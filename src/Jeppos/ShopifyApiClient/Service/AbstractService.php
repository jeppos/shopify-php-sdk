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
}
