<?php

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\Page;

/**
 * @see https://help.shopify.com/en/api/reference/online_store/page
 */
class PageService extends AbstractService
{
    /**
     * @see https://help.shopify.com/en/api/reference/online_store/page#show
     *
     * @param int $pageId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Page
     */
    public function getOne(int $pageId): Page
    {
        $response = $this->client->get(sprintf('pages/%d.json', $pageId));

        return $this->serializer->deserialize($response, Page::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/page#index
     *
     * @param array $options
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Page[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('pages.json', $options);

        return $this->serializer->deserializeList($response, Page::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/page#count
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
        return $this->client->get('pages/count.json', $options);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/page#create
     *
     * @param Page $page
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Page
     */
    public function createOne(Page $page): Page
    {
        $response = $this->client->post(
            'pages.json',
            $this->serializer->serialize($page, 'page', ['post'])
        );

        return $this->serializer->deserialize($response, Page::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/page#update
     *
     * @param Page $page
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     *
     * @return Page
     */
    public function updateOne(Page $page): Page
    {
        $response = $this->client->put(
            sprintf('pages/%d.json', $page->getId()),
            $this->serializer->serialize($page, 'page', ['put'])
        );

        return $this->serializer->deserialize($response, Page::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/online_store/page#destroy
     *
     * @param int $pageId
     *
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     *
     * @return bool
     */
    public function deleteOne(int $pageId): bool
    {
        return $this->client->delete(sprintf('pages/%d.json', $pageId));
    }
}
