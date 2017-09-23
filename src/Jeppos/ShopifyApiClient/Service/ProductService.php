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
        $json = $this->client->get($this->getResourceKey(), $id);

        return $this->serializer->deserialize($json, $this->getResourceModel(), 'json');
    }

    /**
     * @param array $options
     * @return array
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->getList($this->getResourceKey(), null, $options);

        return array_map(
            function ($json) {
                return $this->serializer->deserialize($json, $this->getResourceModel(), 'json');
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
        return $this->client->getField($this->getResourceKey(), 'count', 'count', $options);
    }

    /**
     * @return string
     */
    protected function getResourceKey(): string
    {
        return 'product';
    }

    /**
     * @return string
     */
    protected function getResourceModel(): string
    {
        return Product::class;
    }
}
