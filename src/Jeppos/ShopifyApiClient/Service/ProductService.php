<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\Product;

/**
 * Class ProductService
 * @package Jeppos\ShopifyApiClient\Service
 */
class ProductService extends AbstractService
{
    /**
     * @param int $id
     * @return Product
     */
    public function getOneById(int $id): Product
    {
        $response = $this->client->get($this->buildUri($id));

        return $this->serializer->fromArray($response, Product::class);
    }

    /**
     * @param array $options
     * @return array
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get($this->buildUri(), $options);

        return array_map(
            function ($response) {
                return $this->serializer->fromArray($response, Product::class);
            },
            $response
        );
    }

    /**
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get($this->buildUri('count'), $options);
    }

    /**
     * @return string
     */
    protected function getResourceKey(): string
    {
        return 'product';
    }
}
