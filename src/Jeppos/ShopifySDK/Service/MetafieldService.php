<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Enum\OwnerResource;
use Jeppos\ShopifySDK\Model\Metafield;

/**
 * Metafields allow you to attach metadata, which is additional information, to a store's resources.
 *
 * @see https://help.shopify.com/api/reference/metafield
 */
class MetafieldService extends AbstractService
{
    /**
     * Get a single resource metafield by its ID
     *
     * @see https://help.shopify.com/api/reference/metafield#show
     * @param int $metafieldId
     * @return Metafield
     */
    public function getOne(int $metafieldId): Metafield
    {
        $response = $this->client->get(sprintf(
            'metafields/%d.json',
            $metafieldId
        ));

        return $this->serializer->deserialize($response, Metafield::class);
    }

    /**
     * Get metafields that belong to a resource
     *
     * @see https://help.shopify.com/api/reference/metafield#index
     * @param OwnerResource $ownerResource
     * @param int $ownerId
     * @param array $options
     * @return Metafield[]
     */
    public function getList(OwnerResource $ownerResource, int $ownerId, array $options = []): array
    {
        $options['metafield'] = [
            'owner_resource' => $ownerResource->getValue(),
            'owner_id' => $ownerId,
        ];
        $response = $this->client->get(sprintf('metafields.json', $ownerId), $options);

        return $this->serializer->deserializeList($response, Metafield::class);
    }

    /**
     * Get a count of metafields that belong to a CustomCollection
     *
     * @see https://help.shopify.com/api/reference/metafield#count
     * @param OwnerResource $ownerResource
     * @param int $ownerId
     * @param array $options
     * @return int
     */
    public function getCount(OwnerResource $ownerResource, int $ownerId, array $options = []): int
    {
        $options['metafield'] = [
            'owner_resource' => $ownerResource->getValue(),
            'owner_id' => $ownerId,
        ];

        return $this->client->get(sprintf('metafields/count.json', $ownerId), $options);
    }

    /**
     * Create a new metafield for a CustomCollection
     *
     * @see https://help.shopify.com/api/reference/metafield#create
     * @param Metafield $metaField
     * @return Metafield
     */
    public function createOne(Metafield $metaField): Metafield
    {
        $response = $this->client->post(
            sprintf('metafields.json', $metaField->getOwnerId()),
            $this->serializer->serialize($metaField, 'metafield', ['post'])
        );

        return $this->serializer->deserialize($response, Metafield::class);
    }

    /**
     * Update a CustomCollection metafield
     *
     * @see https://help.shopify.com/api/reference/metafield#update
     * @param Metafield $metaField
     * @return Metafield
     */
    public function updateOne(Metafield $metaField): Metafield
    {
        $response = $this->client->put(
            sprintf('metafields/%s.json', $metaField->getId()),
            $this->serializer->serialize($metaField, 'metafield', ['put'])
        );

        return $this->serializer->deserialize($response, Metafield::class);
    }

    /**
     * Delete a CustomCollection metafield
     *
     * @see https://help.shopify.com/api/reference/metafield#destroy
     * @param int $metafieldId
     * @return bool
     */
    public function deleteOne(int $metafieldId): bool
    {
        return $this->client->delete(sprintf('metafields/%s.json', $metafieldId));
    }
}
