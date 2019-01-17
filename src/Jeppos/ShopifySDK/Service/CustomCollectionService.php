<?php

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\CustomCollection;

/**
 * @see https://help.shopify.com/en/api/reference/products/customcollection
 */
class CustomCollectionService extends AbstractService
{
    /**
     * @see https://help.shopify.com/en/api/reference/products/customcollection#show
     *
     * @param int $collectionId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomCollection
     */
    public function getOne(int $collectionId): CustomCollection
    {
        $response = $this->client->get(sprintf('custom_collections/%d.json', $collectionId));

        return $this->serializer->deserialize($response, CustomCollection::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/customcollection#index
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomCollection[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('custom_collections.json', $options);

        return $this->serializer->deserializeList($response, CustomCollection::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/customcollection#count
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('custom_collections/count.json', $options);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/customcollection#create
     *
     * @param CustomCollection $customCollection
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomCollection
     */
    public function createOne(CustomCollection $customCollection): CustomCollection
    {
        $response = $this->client->post(
            'custom_collections.json',
            $this->serializer->serialize($customCollection, 'custom_collection', ['post'])
        );

        return $this->serializer->deserialize($response, CustomCollection::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/customcollection#update
     *
     * @param CustomCollection $customCollection
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomCollection
     */
    public function updateOne(CustomCollection $customCollection): CustomCollection
    {
        $response = $this->client->put(
            sprintf('custom_collections/%d.json', $customCollection->getId()),
            $this->serializer->serialize($customCollection, 'custom_collection', ['put'])
        );

        return $this->serializer->deserialize($response, CustomCollection::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/products/customcollection#destroy
     *
     * @param int $customCollectionId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $customCollectionId): bool
    {
        return $this->client->delete(sprintf('custom_collections/%d.json', $customCollectionId));
    }
}
