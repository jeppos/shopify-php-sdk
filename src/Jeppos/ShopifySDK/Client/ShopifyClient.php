<?php

namespace Jeppos\ShopifySDK\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7;

class ShopifyClient
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $uri
     * @param array $query
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return mixed
     */
    public function get(string $uri, array $query = [])
    {
        return $this->request('GET', $uri, $query);
    }

    /**
     * @param string $uri
     * @param array $query
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function delete(string $uri, array $query = []): bool
    {
        try {
            $this->client->request('DELETE', '/admin/' . $uri . '?' . http_build_query($query));
        } catch (BadResponseException $e) {
            throw new ShopifyBadResponseException(Psr7\str($e->getResponse()));
        } catch (TransferException $e) {
            throw new ShopifyException();
        }

        return true;
    }

    /**
     * @param string $uri
     * @param string $body
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return mixed
     */
    public function post(string $uri, string $body)
    {
        return $this->request('POST', $uri, [], $body);
    }

    /**
     * @param string $uri
     * @param string $body
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return mixed
     */
    public function put(string $uri, string $body)
    {
        return $this->request('PUT', $uri, [], $body);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $query
     * @param string $body
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return mixed
     */
    public function request(string $method, string $uri, array $query = [], string $body = null)
    {
        try {
            $options = [];
            if ($body !== null) {
                $options['body'] = $body;
            }

            $response = $this->client->request($method, '/admin/' . $uri . '?' . http_build_query($query), $options);

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
}
