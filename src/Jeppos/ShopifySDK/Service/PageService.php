<?php

namespace Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Page;

class PageService extends AbstractService
{
    /**
     * Receive a single Page
     *
     * @see https://help.shopify.com/api/reference/page#show
     * @param int $pageId
     * @return Page
     */
    public function getOne(int $pageId): Page
    {
        $response = $this->client->get(sprintf('pages/%d.json', $pageId));

        return $this->serializer->deserialize($response, Page::class);
    }

    /**
     * Receive a list of all Pages
     *
     * @see https://help.shopify.com/api/reference/page#index
     * @param array $options
     * @return Page[]
     */
    public function getList(array $options = []): array
    {
        $response = $this->client->get('pages.json', $options);

        return $this->serializer->deserializeList($response, Page::class);
    }

    /**
     * Receive a count of all Pages
     *
     * @see https://help.shopify.com/api/reference/page#count
     * @param array $options
     * @return int
     */
    public function getCount(array $options = []): int
    {
        return $this->client->get('pages/count.json', $options);
    }

    /**
     * Create a new Page
     *
     * @see https://help.shopify.com/api/reference/page#create
     * @param Page $page
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
     * Modify an existing Page
     *
     * @see https://help.shopify.com/api/reference/page#update
     * @param Page $page
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
     * Remove a Page from the database
     *
     * @see https://help.shopify.com/api/reference/page#destroy
     * @param int $pageId
     * @return bool
     */
    public function deleteOne(int $pageId): bool
    {
        return $this->client->delete(sprintf('pages/%d.json', $pageId));
    }
}
