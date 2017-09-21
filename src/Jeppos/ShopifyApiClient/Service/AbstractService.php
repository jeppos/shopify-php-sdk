<?php

namespace Jeppos\ShopifyApiClient\Service;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;

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
     * @param int|null $id
     * @param array $options
     * @return mixed
     */
    protected function get(string $type, ?int $id = null, array $options = [])
    {
        $response = $this->client->request('GET', $this->buildUri($id, $options));

        return $this->deserialize($type, $response);
    }

    /**
     * @return string
     */
    abstract protected function getSingular(): string;

    /**
     * @return string
     */
    abstract protected function getPlural(): string;

    /**
     * @param string $type
     * @param ResponseInterface $response
     * @return mixed
     */
    private function deserialize(string $type, ResponseInterface $response)
    {
        $object = \GuzzleHttp\json_decode($response->getBody()->getContents());

        return $this->serializer->deserialize(\GuzzleHttp\json_encode($object->{$this->getSingular()}), $type, 'json');
    }

    /**
     * @param int[null $id
     * @param array $options
     * @return string
     */
    private function buildUri(?int $id, array $options): string
    {
        $uri = implode('/', array_filter(['admin', $this->getPlural(), $id]));

        return $uri . '.json?' . http_build_query($options);
    }
}
