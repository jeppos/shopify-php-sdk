<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use JMS\Serializer\Serializer;

/**
 * Class AbstractService
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
     * AbstractService constructor.
     * @param ShopifyClient $client
     * @param Serializer $serializer
     */
    public function __construct(ShopifyClient $client, Serializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param array $array
     * @param string $className
     * @return mixed
     */
    protected function deserialize(array $array, string $className)
    {
        return $this->serializer->fromArray($array, $className);
    }

    /**
     * @param array $array
     * @param string $className
     * @return array
     */
    protected function deserializeList(array $array, string $className): array
    {
        return array_map(
            function ($response) use ($className) {
                return $this->serializer->fromArray($response, $className);
            },
            $array
        );
    }
}
