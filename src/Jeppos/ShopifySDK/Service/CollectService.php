<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\Collect;

/**
 * @see https://help.shopify.com/en/api/reference/products/collect
 */
class CollectService extends AbstractService
{
    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/products/collect#show
     *
     * @param int $collectId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Collect
     */
    public function getOne(int $collectId): Collect
    {
        $response = $this->client->get(sprintf('collects/%d.json', $collectId));

        return $this->serializer->deserialize($response, Collect::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/products/collect#index
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Collect[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('collects.json', $options);

        return $this->serializer->deserializeList($response, Collect::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/products/collect#count
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
        return $this->client->get('collects/count.json', $options);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/products/collect#create
     *
     * @param Collect $collect
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Collect
     */
    public function createOne(Collect $collect): Collect
    {
        $response = $this->client->post(
            'collects.json',
            $this->serializer->serialize($collect, 'collect', ['post'])
        );

        return $this->serializer->deserialize($response, Collect::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/products/collect#destroy
     *
     * @param int $collectId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $collectId): bool
    {
        return $this->client->delete(sprintf('collects/%d.json', $collectId));
    }
}
