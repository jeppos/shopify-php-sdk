<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\CustomerAddress;

/**
 * @see https://help.shopify.com/en/api/reference/customers/customer_address
 */
class CustomerAddressService extends AbstractService
{
    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#show
     *
     * @param int $customerId
     * @param int $addressId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomerAddress
     */
    public function getOne(int $customerId, int $addressId): CustomerAddress
    {
        $response = $this->client->get(sprintf('customers/%d/addresses/%d.json', $customerId, $addressId));

        return $this->serializer->deserialize($response, CustomerAddress::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#index
     *
     * @param int $customerId
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomerAddress[]
     */
    public function getList(int $customerId, array $options = []): array
    {
        $response = $this->client->get(sprintf('customers/%d/addresses.json', $customerId), $options);

        return $this->serializer->deserializeList($response, CustomerAddress::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#create
     *
     * @param int $customerId
     * @param CustomerAddress $customerAddress
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomerAddress
     */
    public function createOne(int $customerId, CustomerAddress $customerAddress): CustomerAddress
    {
        $response = $this->client->post(
            sprintf('customers/%d/addresses.json', $customerId),
            $this->serializer->serialize($customerAddress, 'customer_address', ['post'])
        );

        return $this->serializer->deserialize($response, CustomerAddress::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#update
     *
     * @param int $customerId
     * @param CustomerAddress $customerAddress
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomerAddress
     */
    public function updateOne(int $customerId, CustomerAddress $customerAddress): CustomerAddress
    {
        $response = $this->client->put(
            sprintf('customers/%d/addresses/%d.json', $customerId, $customerAddress->getId()),
            $this->serializer->serialize($customerAddress, 'customer_address', ['put'])
        );

        return $this->serializer->deserialize($response, CustomerAddress::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#destroy
     *
     * @param int $customerId
     * @param int $addressId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $customerId, int $addressId): bool
    {
        return $this->client->delete(sprintf('customers/%d/addresses/%d.json', $customerId, $addressId));
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#set
     *
     * @param int $customerId
     * @param int[] $addressIds
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteBulk(int $customerId, array $addressIds): bool
    {
        return $this->client->request(
            'PUT',
            sprintf('customers/%d/addresses/set.json', $customerId),
            [
                'operation' => 'destroy',
                'address_ids' => $addressIds,
            ]
        );
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer_address#default
     *
     * @param int $customerId
     * @param int $addressId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function updateDefault(int $customerId, int $addressId): bool
    {
        return $this->client->put(
            'PUT',
            sprintf('customers/%d/addresses/%d/default.json', $customerId, $addressId)
        );
    }
}
