<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\Redirect;

/**
 * @see https://help.shopify.com/en/api/reference/online_store/redirect
 */
class RedirectService extends AbstractService
{
    /**
     * @see https://help.shopify.com/en/api/reference/online_store/redirect#show
     *
     * @param int $redirectId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Redirect
     */
    public function getOne(int $redirectId): Redirect
    {
        $response = $this->client->get(sprintf('redirects/%d.json', $redirectId));

        return $this->serializer->deserialize($response, Redirect::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/redirect#index
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Redirect[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('redirects.json', $options);

        return $this->serializer->deserializeList($response, Redirect::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/redirect#count
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
        return $this->client->get('redirects/count.json', $options);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/redirect#create
     *
     * @param Redirect $redirect
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Redirect
     */
    public function createOne(Redirect $redirect): Redirect
    {
        $response = $this->client->post('redirects.json', $this->serializer->serialize($redirect, 'redirect', ['post']));

        return $this->serializer->deserialize($response, Redirect::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/redirect#update
     *
     * @param Redirect $redirect
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Redirect
     */
    public function updateOne(Redirect $redirect): Redirect
    {
        $response = $this->client->put(
            sprintf('redirects/%d.json', $redirect->getId()),
            $this->serializer->serialize($redirect, 'redirect', ['put'])
        );

        return $this->serializer->deserialize($response, Redirect::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/redirect#destroy
     *
     * @param int $redirectId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $redirectId): bool
    {
        return $this->client->delete(sprintf('redirects/%d.json', $redirectId));
    }
}
