<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\Customer;
use Jeppos\ShopifySDK\Model\CustomerInvite;

/**
 * @see https://help.shopify.com/en/api/reference/customers/customer
 */
class CustomerService extends AbstractService
{
    /**
     * @api
     *,
     * @see https://help.shopify.com/en/api/reference/customers/customer#show
     *
     * @param int $customerId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Customer
     */
    public function getOne(int $customerId): Customer
    {
        $response = $this->client->get(sprintf('customers/%d.json', $customerId));

        return $this->serializer->deserialize($response, Customer::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#index
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Customer[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('customers.json', $options);

        return $this->serializer->deserializeList($response, Customer::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#search
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Customer[]
     */
    public function search(array $options = []): array
    {
        $response = $this->client->get('customers/search.json', $options);

        return $this->serializer->deserializeList($response, Customer::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#count
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
        return $this->client->get('customers/count.json', $options);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#create
     *
     * @param Customer $customer
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Customer
     */
    public function createOne(Customer $customer): Customer
    {
        $body = $this->serializer->serialize($customer, 'customer', ['post']);

        $response = $this->client->post(
            'customers.json',
            $body
        );

        return $this->serializer->deserialize($response, Customer::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#account_activation_url
     *
     * @param int $customerId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return string
     */
    public function getActivationUrl(int $customerId): string
    {
        $response = $this->client->request('POST', sprintf('customers/%d.json', $customerId));

        return $response['account_activation_url'];
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#send_invite
     *
     * @param int $customerId
     * @param CustomerInvite $customerInvite
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return CustomerInvite
     */
    public function sendInvite(int $customerId, CustomerInvite $customerInvite): CustomerInvite
    {
        $response = $this->client->post(
            sprintf('customers/%d/send_invite.json', $customerId),
            $this->serializer->serialize($customerInvite, 'customer_invite', ['post'])
        );

        return $this->serializer->deserialize($response, CustomerInvite::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#update
     *
     * @param Customer $customer
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Customer
     */
    public function updateOne(Customer $customer): Customer
    {
        $body = $this->serializer->serialize($customer, 'customer', ['put']);

        $response = $this->client->put(
            sprintf('customers/%d.json', $customer->getId()),
            $body
        );

        return $this->serializer->deserialize($response, Customer::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/customers/customer#destroy
     *
     * @param int $customerId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $customerId): bool
    {
        return $this->client->delete(sprintf('customers/%d.json', $customerId));
    }
}
