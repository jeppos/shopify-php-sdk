<?php

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\Metafield;

/***
 * @see https://help.shopify.com/en/api/reference/metafield
 */
class MetafieldService extends AbstractService
{
    /**
     * @see https://help.shopify.com/en/api/reference/metafield#show
     *
     * @param int $metafieldId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
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
     * @see https://help.shopify.com/en/api/reference/metafield#index
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Metafield[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('metafields.json', $options);

        return $this->serializer->deserializeList($response, Metafield::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/metafield#count
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
        return $this->client->get('metafields/count.json', $options);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/metafield#create
     *
     * @param Metafield $metaField
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Metafield
     */
    public function createOne(Metafield $metaField): Metafield
    {
        $response = $this->client->post(
            'metafields.json',
            $this->serializer->serialize($metaField, 'metafield', ['post'])
        );

        return $this->serializer->deserialize($response, Metafield::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/metafield#update
     *
     * @param Metafield $metaField
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
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
     * @see https://help.shopify.com/en/api/reference/metafield#destroy
     *
     * @param int $metafieldId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $metafieldId): bool
    {
        return $this->client->delete(sprintf('metafields/%s.json', $metafieldId));
    }
}
