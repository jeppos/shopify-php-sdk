<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\CustomCollection;

/**
 * A custom collection is a grouping of products that a shop owner can create to make their shops easier to browse.
 * A shop owner creates a custom collection and then selects the products that will go into it.
 *
 * Custom collections are typically displayed to customers so that customers can select them to view only the products
 * in the collection they've selected. They're typically used to break down a catalog of products into categories to
 * make the shop easier to browse. Shopify shops start with a single custom collection called frontpage —
 * the collection of products shown on the shop's front page.
 *
 * @see https://help.shopify.com/api/reference/customcollection
 */
class CustomCollectionService extends AbstractService
{
    /**
     * Receive a single CustomCollection
     *
     * @see https://help.shopify.com/api/reference/customcollection#show
     * @param int $collectionId
     * @return CustomCollection
     */
    public function getOne(int $collectionId): CustomCollection
    {
        $response = $this->client->get(sprintf('custom_collections/%d.json', $collectionId));

        return $this->serializer->deserialize($response, CustomCollection::class);
    }

    /**
     * Receive a list of all CustomCollections
     *
     * @see https://help.shopify.com/api/reference/customcollection#index
     * @param array $options
     * @return CustomCollection[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('custom_collections.json', $options);

        return $this->serializer->deserializeList($response, CustomCollection::class);
    }

    /**
     * Receive a count of all CustomCollections
     *
     * @see https://help.shopify.com/api/reference/customcollection#count
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('custom_collections/count.json', $options);
    }

    /**
     * Create a new CustomCollection
     *
     * @see https://help.shopify.com/api/reference/customcollection#create
     * @param CustomCollection $customCollection
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
     * Modify an existing CustomCollection
     *
     * @see https://help.shopify.com/api/reference/customcollection#update
     * @param CustomCollection $customCollection
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
     * Remove a CustomCollection from the database
     *
     * @see https://help.shopify.com/api/reference/customcollection#destroy
     * @param int $customCollectionId
     * @return bool
     */
    public function deleteOne(int $customCollectionId): bool
    {
        return $this->client->delete(sprintf('custom_collections/%d.json', $customCollectionId));
    }
}
