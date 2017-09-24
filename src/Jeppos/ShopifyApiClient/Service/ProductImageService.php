<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\ProductImage;

/**
 * Class ProductImageService
 * @package Jeppos\ShopifyApiClient\Service
 */
class ProductImageService extends AbstractService
{
    /**
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
     * @param int $productId
     * @param array $options
     * @return int
     */
    public function getCount(int $productId, array $options = []): int
    {
        return $this->client->get(sprintf('products/%d/images/count.json', $productId), $options);
    }
}
