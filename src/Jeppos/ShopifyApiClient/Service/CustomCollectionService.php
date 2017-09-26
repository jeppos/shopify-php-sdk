<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\CustomCollection;

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

        return $this->deserialize($response, CustomCollection::class);
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

        return $this->deserializeList($response, CustomCollection::class);
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
}
