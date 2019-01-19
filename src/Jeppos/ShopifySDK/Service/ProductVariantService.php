<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\ProductVariant;

/**
 * @see https://help.shopify.com/api/reference/product_variant
 */
class ProductVariantService extends AbstractService
{
    /**
     * @see https://help.shopify.com/api/reference/product_variant#show
     *
     * @param int $variantId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductVariant
     */
    public function getOne(int $variantId): ProductVariant
    {
        $response = $this->client->get(sprintf('variants/%d.json', $variantId));

        return $this->serializer->deserialize($response, ProductVariant::class);
    }

    /**
     * @see https://help.shopify.com/api/reference/product_variant#index
     *
     * @param int $productId
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return array
     */
    public function getList(int $productId, array $options = []): array
    {
        $response = $this->client->get(sprintf('products/%d/variants.json', $productId), $options);

        return $this->serializer->deserializeList($response, ProductVariant::class);
    }

    /**
     * @see https://help.shopify.com/api/reference/product_variant#count
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
        return $this->client->get(sprintf('products/%d/variants/count.json', $productId), $options);
    }

    /**
     * @see https://help.shopify.com/api/reference/product_variant#create
     *
     * @param ProductVariant $productVariant
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductVariant
     */
    public function createOne(ProductVariant $productVariant): ProductVariant
    {
        $response = $this->client->post(
            sprintf('products/%d/variants.json', $productVariant->getProductId()),
            $this->serializer->serialize($productVariant, 'variant', ['post'])
        );

        return $this->serializer->deserialize($response, ProductVariant::class);
    }

    /**
     * @see https://help.shopify.com/api/reference/product_variant#update
     *
     * @param ProductVariant $productVariant
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return ProductVariant
     */
    public function updateOne(ProductVariant $productVariant): ProductVariant
    {
        $response = $this->client->put(
            sprintf('variants/%d.json', $productVariant->getId()),
            $this->serializer->serialize($productVariant, 'variant', ['put'])
        );

        return $this->serializer->deserialize($response, ProductVariant::class);
    }

    /**
     * @see https://help.shopify.com/api/reference/product_variant#destroy
     *
     * @param int $productId
     * @param int $variantId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $productId, int $variantId): bool
    {
        return $this->client->delete(sprintf('products/%d/variants/%s.json', $productId, $variantId));
    }
}
