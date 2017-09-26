<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\ProductVariant;

/**
 * A ProductVariant is a different version of a product, such as differing sizes or differing colors.
 *
 * Without product variants, you would have to treat the small, medium and large versions of a t-shirt as
 * three separate products; product variants let you treat the small, medium and large versions of a
 * t-shirt as variations of the same product.
 *
 * Each product can have a maximum of 100 variants.
 *
 * @see https://help.shopify.com/api/reference/product_variant
 */
class ProductVariantService extends AbstractService
{
    /**
     * Receive a single Product Variant
     *
     * @see https://help.shopify.com/api/reference/product_variant#show
     * @param int $variantId
     * @return ProductVariant
     */
    public function getOne(int $variantId): ProductVariant
    {
        $response = $this->client->get(sprintf('variants/%d.json', $variantId));

        return $this->deserialize($response, ProductVariant::class);
    }

    /**
     * Receive a list of all Product Variants
     *
     * @see https://help.shopify.com/api/reference/product_variant#index
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
     * Receive a count of all Product Variants
     *
     * @see https://help.shopify.com/api/reference/product_variant#count
     * @param int $productId
     * @param array $options
     * @return int
     */
    public function getCount(int $productId, array $options = []): int
    {
        return $this->client->get(sprintf('products/%d/variants/count.json', $productId), $options);
    }
}