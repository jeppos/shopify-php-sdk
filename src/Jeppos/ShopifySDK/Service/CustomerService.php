<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Customer;

/**
 * A customer resource instance represents a customer account with the shop.
 * Customer accounts store contact information for the customer,
 * saving logged-in customers the trouble of having to provide it at every checkout.
 * For security reasons, the customer resource instance does not store credit card information.
 * Customers will always have to provide this information at checkout.
 *
 * The customer resource instance also stores some additional information about the customer for
 * the benefit of the shop owner, including: the number of orders, the amount of money s/he has spent and number of
 * orders s/he has made throughout his/her history with the shop as well as the shop owner's notes and
 * tags for the customer.
 *
 * @see https://help.shopify.com/api/reference/customer
 */
class CustomerService extends AbstractService
{
    /**
     * Receive a single Customer
     *
     * @see https://help.shopify.com/api/reference/customer#show
     * @param int $customerId
     * @return Customer
     */
    public function getOne(int $customerId): Customer
    {
        $response = $this->client->get(sprintf('customers/%d.json', $customerId));

        return $this->serializer->deserialize($response, Customer::class);
    }

    /**
     * Receive a list of all Customers
     *
     * @see https://help.shopify.com/api/reference/customer#index
     * @param array $options
     * @return Customer[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('customers.json', $options);

        return $this->serializer->deserializeList($response, Customer::class);
    }

    /**
     * Receive a count of all Customers
     *
     * @see https://help.shopify.com/api/reference/customer#count
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('customers/count.json', $options);
    }

    /**
     * Create a new Customer
     *
     * @see https://help.shopify.com/api/reference/customer#create
     * @param Customer $customer
     * @return Customer
     */
    public function createOne(Customer $customer): Customer
    {
        $response = $this->client->post(
            'customers.json',
            $this->serializer->serialize($customer, 'customer', ['post'])
        );

        return $this->serializer->deserialize($response, Customer::class);
    }

    /**
     * Modify an existing Customer
     *
     * @see https://help.shopify.com/api/reference/customer#update
     * @param Customer $customer
     * @return Customer
     */
    public function updateOne(Customer $customer): Customer
    {
        $response = $this->client->put(
            sprintf('customers/%d.json', $customer->getId()),
            $this->serializer->serialize($customer, 'customer', ['put'])
        );

        return $this->serializer->deserialize($response, Customer::class);
    }

    /**
     * Remove a Customer from the database
     *
     * @see https://help.shopify.com/api/reference/customer#destroy
     * @param int $customerId
     * @return bool
     */
    public function deleteOne(int $customerId): bool
    {
        return $this->client->delete(sprintf('customers/%d.json', $customerId));
    }
}
