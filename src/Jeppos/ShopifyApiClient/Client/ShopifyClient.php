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
}
