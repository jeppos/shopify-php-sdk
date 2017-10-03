<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\ProductImage;

/**
 * Products are easier to sell if customers can see pictures of them, which is why there are product images.
 *
 * Any product may have up to 250 images, and images can be in .png, .gif or .jpg format.
 *
 * @see https://help.shopify.com/api/reference/product_image
 */
class ProductImageService extends AbstractService
{
    /**
     * Receive a single Product Image
     *
     * @see https://help.shopify.com/api/reference/product_image#show
     * @param int $productId
     * @param int $imageId
     * @return ProductImage
     */
    public function getOne(int $productId, int $imageId): ProductImage
    {
        $response = $this->client->get(sprintf('products/%d/images/%d.json', $productId, $imageId));

        return $this->deserialize($response, ProductImage::class);
    }

    /**
     * Receive a list of all Product Images
     *
     * @see https://help.shopify.com/api/reference/product_image#index
     * @param int $productId
     * @param array $options
     * @return ProductImage[]
     */
    public function getList(int $productId, array $options = []): array
    {
        $response = $this->client->get(sprintf('products/%d/images.json', $productId), $options);

        return $this->deserializeList($response, ProductImage::class);
    }

    /**
     * Receive a count of all Product Images
     *
     * @see https://help.shopify.com/api/reference/product_image#count
     * @param int $productId
     * @param array $options
     * @return int
     */
    public function getCount(int $productId, array $options = []): int
    {
        return $this->client->get(sprintf('products/%d/images/count.json', $productId), $options);
    }

    /**
     * Create a new Product Image
     *
     * @see https://help.shopify.com/api/reference/product_image#create
     * @param ProductImage $productImage
     * @return ProductImage
     */
    public function createOne(ProductImage $productImage): ProductImage
    {
        $response = $this->client->post(
            'image',
            sprintf('products/%d/images.json', $productImage->getProductId()),
            $this->serializePost($productImage)
        );

        return $this->deserialize($response, ProductImage::class);
    }

    /**
     * Modify an existing Product Image
     *
     * @see https://help.shopify.com/api/reference/product_image#update
     * @param ProductImage $productImage
     * @return ProductImage
     */
    public function updateOne(ProductImage $productImage): ProductImage
    {
        $response = $this->client->put(
            'image',
            sprintf('products/%d/images/%s.json', $productImage->getId(), $productImage->getProductId()),
            $this->serializePut($productImage)
        );

        return $this->deserialize($response, ProductImage::class);
    }

    /**
     * Remove a Product Image from the database
     *
     * @see https://help.shopify.com/api/reference/product_image#destroy
     * @param int $productId
     * @param int $imageId
     * @return bool
     */
    public function deleteOne(int $productId, int $imageId): bool
    {
        return $this->client->delete(sprintf('products/%d/images/%s.json', $productId, $imageId));
    }
}
