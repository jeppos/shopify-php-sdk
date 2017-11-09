<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\CustomerAddress;

/**
 * A customer address resource instance represents one of the many addresses a customer may have
 *
 * @see https://help.shopify.com/api/reference/customeraddress
 */
class CustomerAddressService extends AbstractService
{
    /**
     * Receive a single CustomerAddress
     *
     * @see https://help.shopify.com/api/reference/customeraddress#show
     * @param int $customerId
     * @param int $addressId
     * @return CustomerAddress
     */
    public function getOne(int $customerId, int $addressId): CustomerAddress
    {
        $response = $this->client->get(sprintf('customers/%d/addresses/%d.json', $customerId, $addressId));

        return $this->serializer->deserialize($response, CustomerAddress::class);
    }

    /**
     * Receive a list of all CustomerAddress
     *
     * @see https://help.shopify.com/api/reference/customeraddress#index
     * @param int $customerId
     * @param array $options
     * @return CustomerAddress[]
     */
    public function getList(int $customerId, array $options = []): array
    {
        $response = $this->client->get(sprintf('customers/%d/addresses.json', $customerId), $options);

        return $this->serializer->deserializeList($response, CustomerAddress::class);
    }

    /**
     * Create a new CustomerAddress
     *
     * @see https://help.shopify.com/api/reference/customeraddress#create
     * @param int $customerId
     * @param CustomerAddress $customerAddress
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
     * Modify an existing CustomerAddress
     *
     * @see https://help.shopify.com/api/reference/customeraddress#update
     * @param int $customerId
     * @param CustomerAddress $customerAddress
     * @return CustomerAddress
     */
    public function updateOne(int $customerId, CustomerAddress $customerAddress): CustomerAddress
    {
        $response = $this->client->put(
            sprintf('customers/%d/addresses/%s.json', $customerId, $customerAddress->getId()),
            $this->serializer->serialize($customerAddress, 'customer_address', ['put'])
        );

        return $this->serializer->deserialize($response, CustomerAddress::class);
    }

    /**
     * Remove a CustomerAddress from the database
     *
     * @see https://help.shopify.com/api/reference/customeraddress#destroy
     * @param int $customerId
     * @param int $addressId
     * @return bool
     */
    public function deleteOne(int $customerId, int $addressId): bool
    {
        return $this->client->delete(sprintf('customers/%d/addresses/%s.json', $customerId, $addressId));
    }
}
