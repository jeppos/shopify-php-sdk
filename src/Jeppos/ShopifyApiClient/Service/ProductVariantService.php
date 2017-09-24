<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\ProductVariant;

/**
 * Class ProductVariantService
 * @package Jeppos\ShopifyApiClient\Service
 */
class ProductVariantService extends AbstractService
{
    /**
     * @param int $variantId
     * @return ProductVariant
     */
    public function getOne(int $variantId): ProductVariant
    {
        $response = $this->client->get(sprintf('variants/%d.json', $variantId));

        return $this->deserialize($response, ProductVariant::class);
    }

    /**
     * @param int $productId
     * @param array $options
     * @return array
     */
    public function getList(int $productId, array $options = []): array
    {
        $response = $this->client->get(sprintf('products/%d/variants.json', $productId), $options);

        return $this->deserializeList($response, ProductVariant::class);
    }

    /**
     * @param int $productId
     * @param array $options
     * @return int
     */
    public function getCount(int $productId, array $options = []): int
    {
        return $this->client->get(sprintf('products/%d/variants/count.json', $productId), $options);
    }
}
