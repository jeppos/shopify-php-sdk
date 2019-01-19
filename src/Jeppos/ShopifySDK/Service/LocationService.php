<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\Location;

/**
 * @see https://help.shopify.com/en/api/reference/inventory/location
 */
class LocationService extends AbstractService
{
    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/location#show
     *
     * @param int $locationId
     * @return Location
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function getOne(int $locationId): Location
    {
        $response = $this->client->get(sprintf('locations/%d.json', $locationId));

        return $this->serializer->deserialize($response, Location::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/location#index
     *
     * @return Location[]
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function getList(): array
    {
        $response = $this->client->get('locations.json');

        return $this->serializer->deserializeList($response, Location::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/location#count
     *
     * @param array $options
     * @return int
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('locations/count.json', $options);
    }
}
