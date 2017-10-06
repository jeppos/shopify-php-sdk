<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Client\ShopifyClient;
use Jeppos\ShopifySDK\Serializer\ConfiguredSerializer;

abstract class AbstractService
{
    /**
     * @var ShopifyClient
     */
    protected $client;
    /**
     * @var ConfiguredSerializer
     */
    protected $serializer;

    /**
     * AbstractService constructor.
     * @param ShopifyClient $client
     * @param ConfiguredSerializer $serializer
     */
    public function __construct(ShopifyClient $client, ConfiguredSerializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }
}
