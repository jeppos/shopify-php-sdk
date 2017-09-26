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
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public function get(string $uri, array $query = [])
    {
        $response = $this->client->request('GET', '/admin/' . $uri . '?' . http_build_query($query));

        // TODO Error handling
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return array_pop($object);
    }

    /**
     * @param string $uri
     * @param array $query
     * @return bool
     */
    public function delete(string $uri, array $query = []): bool
    {
        // TODO Error handling
        $this->client->request('DELETE', '/admin/' . $uri . '?' . http_build_query($query));

        return true;
    }

    /**
     * @param string $key
     * @param string $uri
     * @param string $body
     * @return mixed
     */
    public function post(string $key, string $uri, string $body)
    {
        $body = '{"' . $key . '":' . $body . '}';

        $response = $this->client->request('POST', '/admin/' . $uri, [
            'body' => $body
        ]);

        // TODO Error handling
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return array_pop($object);
    }

    /**
     * @param string $key
     * @param string $uri
     * @param string $body
     * @return mixed
     */
    public function put(string $key, string $uri, string $body)
    {
        $body = '{"' . $key . '":' . $body . '}';

        $response = $this->client->request('PUT', '/admin/' . $uri, [
            'body' => $body
        ]);

        // TODO Error handling
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return array_pop($object);
    }
}
