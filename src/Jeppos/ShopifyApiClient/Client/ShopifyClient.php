<?php

namespace Jeppos\ShopifyApiClient\Client;

use GuzzleHttp\ClientInterface;

/**
 * Class ShopifyClient
 * @package Jeppos\ShopifyApiClient\Client
 */
class ShopifyClient
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * ShopifyClient constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $key
     * @param mixed $resource
     * @param array $options
     * @return string
     */
    public function get(string $key, $resource = null, array $options = []): string
    {
        $response = $this->client->request('GET', $this->buildUri($key, $resource, $options));

        // TODO Error handling
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents());
        return \GuzzleHttp\json_encode($object->{$key});
    }

    /**
     * @param string $key
     * @param mixed $resource
     * @param array $options
     * @return array
     */
    public function getList(string $key, $resource = null, array $options = []): array
    {
        $response = $this->client->request('GET', $this->buildUri($key, $resource, $options));

        // TODO Error handling
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents());

        return array_map(
            function ($resource) use ($key) {
                return \GuzzleHttp\json_encode($resource);
            },
            $object->{$this->pluralizeKey($key)}
        );
    }

    /**
     * @param string $key
     * @return string
     */
    private function pluralizeKey(string $key): string
    {
        return $key . 's';
    }

    /**
     * @param string $key
     * @param mixed $resource
     * @param array $options
     * @return string
     */
    private function buildUri(string $key, $resource, array $options): string
    {
        $uri = implode('/', array_filter(['admin', $this->pluralizeKey($key), $resource]));

        return $uri . '.json?' . http_build_query($options);
    }
}
