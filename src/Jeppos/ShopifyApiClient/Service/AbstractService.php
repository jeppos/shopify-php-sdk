<?php

namespace Jeppos\ShopifyApiClient\Service;

use GuzzleHttp\ClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * Class AbstractCallService
 * @package Jeppos\ShopifyApiClient\Service
 */
abstract class AbstractService
{
    /**
     * @var ClientInterface
     */
    protected $client;
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * AbstractCallService constructor.
     * @param ClientInterface $client
     * @param SerializerInterface $serializer
     */
    public function __construct(ClientInterface $client, SerializerInterface $serializer)
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
        $response = $this->client->request('GET', $this->buildUri($resource, $options));

        $object = \GuzzleHttp\json_decode($response->getBody()->getContents());
        $json = \GuzzleHttp\json_encode($object->{$this->getResourceKey()});

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
        $response = $this->client->request('GET', $this->buildUri($resource, $options));

        $object = \GuzzleHttp\json_decode($response->getBody()->getContents());

        return array_map(
            function ($resource) use ($type) {
                $json = \GuzzleHttp\json_encode($resource);

                return $this->serializer->deserialize($json, $type, 'json');
            },
            $object->{$this->getResourceKeyPluralized()}
        );
    }

    /**
     * @return string
     */
    abstract protected function getResourceKey(): string;

    /**
     * @return string
     */
    protected function getResourceKeyPluralized(): string
    {
        return $this->getResourceKey() . 's';
    }

    /**
     * @param int|string|null $resource
     * @param array $options
     * @return string
     */
    private function buildUri($resource, array $options): string
    {
        $uri = implode('/', array_filter(['admin', $this->getResourceKeyPluralized(), $resource]));

        return $uri . '.json?' . http_build_query($options);
    }
}
