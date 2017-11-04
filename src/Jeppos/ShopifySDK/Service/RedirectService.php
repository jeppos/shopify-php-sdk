<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Redirect;

class RedirectService extends AbstractService
{
    /**
     * Receive a single Redirect
     *
     * @see https://help.shopify.com/api/reference/redirect#show
     * @param int $redirectId
     * @return Redirect
     */
    public function getOne(int $redirectId): Redirect
    {
        $response = $this->client->get(sprintf('redirects/%d.json', $redirectId));

        return $this->serializer->deserialize($response, Redirect::class);
    }

    /**
     * Receive a list of all Redirects
     *
     * @see https://help.shopify.com/api/reference/redirect#index
     * @param array $options
     * @return Redirect[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('redirects.json', $options);

        return $this->serializer->deserializeList($response, Redirect::class);
    }

    /**
     * Receive a count of all Redirects
     *
     * @see https://help.shopify.com/api/reference/redirect#count
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('redirects/count.json', $options);
    }

    /**
     * Create a new Redirect
     *
     * @see https://help.shopify.com/api/reference/redirect#create
     * @param Redirect $redirect
     * @return Redirect
     */
    public function createOne(Redirect $redirect): Redirect
    {
        $response = $this->client->post('redirects.json', $this->serializer->serialize($redirect, 'redirect', ['post']));

        return $this->serializer->deserialize($response, Redirect::class);
    }

    /**
     * Modify an existing Redirect
     *
     * @see https://help.shopify.com/api/reference/redirect#update
     * @param Redirect $redirect
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
     * Remove a Redirect from the database
     *
     * @see https://help.shopify.com/api/reference/redirect#destroy
     * @param int $redirectId
     * @return bool
     */
    public function deleteOne(int $redirectId): bool
    {
        return $this->client->delete(sprintf('redirects/%d.json', $redirectId));
    }
}
