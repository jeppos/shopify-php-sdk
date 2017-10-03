<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Collect;

/**
 * A collect is an object that connects a product to a custom collection.
 *
 * For every product in a custom collection there exists a collect that tracks the ids of both the product and
 * the custom collection it's a member of. A product can be a member of more than one collection, and will have more
 * than one collect connecting the product to each collection. Unlike many Shopify resources, collects aren't apparent
 * to shop owners; they're objects for managing the relationship between products and custom collections.
 *
 * @see https://help.shopify.com/api/reference/collect
 */
class CollectService extends AbstractService
{
    /**
     * Receive a single Collect
     *
     * @see https://help.shopify.com/api/reference/collect#show
     * @param int $collectId
     * @return Collect
     */
    public function getOne(int $collectId): Collect
    {
        $response = $this->client->get(sprintf('collects/%d.json', $collectId));

        return $this->deserialize($response, Collect::class);
    }

    /**
     * Receive a list of all Collects
     *
     * @see https://help.shopify.com/api/reference/collect#index
     * @param array $options
     * @return Collect[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('collects.json', $options);

        return $this->deserializeList($response, Collect::class);
    }

    /**
     * Receive a count of all Collects
     *
     * @see https://help.shopify.com/api/reference/collect#count
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('collects/count.json', $options);
    }
}
