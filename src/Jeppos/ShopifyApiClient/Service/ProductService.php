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
     * @param int $productId
     * @return Product
     */
    public function getOne(int $productId): Product
    {
        $response = $this->client->get(sprintf('products/%d.json', $productId));

        return $this->serializer->fromArray($response, Product::class);
    }

    /**
     * @param array $options
     * @return Product[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('products.json', $options);

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
        return $this->client->get('products/count.json', $options);
    }

    /**
     * @return string
     */
    protected function getResourceKey(): string
    {
        return 'product';
    }
}
