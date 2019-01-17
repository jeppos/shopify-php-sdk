<?php

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\ProductImage;

/**
 * @see https://help.shopify.com/en/api/reference/products/product_image
 */
class ProductImageService extends AbstractService
{
    /**
     * @see https://help.shopify.com/en/api/reference/products/product_image#show
     *
     * @param int $productId
     * @param int $imageId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductImage
     */
    public function getOne(int $productId, int $imageId): ProductImage
    {
        $response = $this->client->get(sprintf('products/%d/images/%d.json', $productId, $imageId));

        return $this->serializer->deserialize($response, ProductImage::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/product_image#index
     *
     * @param int $productId
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductImage[]
     */
    public function getList(int $productId, array $options = []): array
    {
        $response = $this->client->get(sprintf('products/%d/images.json', $productId), $options);

        return $this->serializer->deserializeList($response, ProductImage::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/product_image#count
     *
     * @param int $productId
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return int
     */
    public function getCount(int $productId, array $options = []): int
    {
        return $this->client->get(sprintf('products/%d/images/count.json', $productId), $options);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/product_image#create
     *
     * @param ProductImage $productImage
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductImage
     */
    public function createOne(ProductImage $productImage): ProductImage
    {
        $response = $this->client->post(
            sprintf('products/%d/images.json', $productImage->getProductId()),
            $this->serializer->serialize($productImage, 'image', ['post'])
        );

        return $this->serializer->deserialize($response, ProductImage::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/product_image#update
     *
     * @param ProductImage $productImage
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductImage
     */
    public function updateOne(ProductImage $productImage): ProductImage
    {
        $response = $this->client->put(
            sprintf('products/%d/images/%s.json', $productImage->getProductId(), $productImage->getId()),
            $this->serializer->serialize($productImage, 'image', ['put'])
        );

        return $this->serializer->deserialize($response, ProductImage::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/product_image#destroy
     *
     * @param int $productId
     * @param int $imageId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $productId, int $imageId): bool
    {
        return $this->client->delete(sprintf('products/%d/images/%s.json', $productId, $imageId));
    }
}
