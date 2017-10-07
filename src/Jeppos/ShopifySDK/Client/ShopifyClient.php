<?php

namespace Jeppos\ShopifySDK\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7;

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
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function get(string $uri, array $query = [])
    {
        try {
            $response = $this->client->request('GET', '/admin/' . $uri . '?' . http_build_query($query));

            $object = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        } catch (BadResponseException $e) {
            throw new ShopifyBadResponseException(Psr7\str($e->getResponse()));
        } catch (TransferException $e) {
            throw new ShopifyException();
        } catch (\InvalidArgumentException $e) {
            throw new ShopifyInvalidResponseException();
        }

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
     * @param string $uri
     * @param string $body
     * @return mixed
     */
    public function post(string $uri, string $body)
    {
        return $this->putOrPost('POST', $uri, $body);
    }

    /**
     * @param string $uri
     * @param string $body
     * @return mixed
     */
    public function put(string $uri, string $body)
    {
        return $this->putOrPost('PUT', $uri, $body);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param string $body
     * @return mixed
     */
    public function putOrPost(string $method, string $uri, string $body)
    {
        $response = $this->client->request($method, '/admin/' . $uri, [
            'body' => $body
        ]);

        // TODO Error handling
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return array_pop($object);
    }
}
