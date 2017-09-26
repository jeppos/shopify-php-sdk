<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\Product;

/**
 * A Product is an individual item for sale in a Shopify store. Products are often physical, but they don't have to be.
 * For example, a digital download (such as a movie, music or ebook file) also qualifies as a product,
 * as do services (such as equipment rental, work for hire, customization of another product or an extended warranty).
 * Simply put: if it's something for sale in a store, then it's a product.
 *
 * A product may have up to 100 product variants and from 0 to 250 product images.
 * A product may also be a part of a custom collection and/or a smart collection.
 *
 * @see https://help.shopify.com/api/reference/product
 */
class ProductService extends AbstractService
{
    /**
     * Receive a single Product
     *
     * @see https://help.shopify.com/api/reference/product#show
     * @param int $productId
     * @return Product
     */
    public function getOne(int $productId): Product
    {
        $response = $this->client->get(sprintf('products/%d.json', $productId));

        return $this->deserialize($response, Product::class);
    }

    /**
     * Receive a list of all Products
     *
     * @see https://help.shopify.com/api/reference/product#index
     * @param array $options
     * @return Product[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('products.json', $options);

        return $this->deserializeList($response, Product::class);
    }

    /**
     * Receive a count of all Products
     *
     * @see https://help.shopify.com/api/reference/product#count
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('products/count.json', $options);
    }
}
