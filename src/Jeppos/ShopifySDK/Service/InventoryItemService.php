<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\InventoryItem;

/**
 * @see https://help.shopify.com/en/api/reference/inventory/inventoryitem
 */
class InventoryItemService extends AbstractService
{
    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/inventoryitem#show
     *
     * @param int $locationId
     * @return InventoryItem
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function getOne(int $locationId): InventoryItem
    {
        $response = $this->client->get(sprintf('inventory_items/%d.json', $locationId));

        return $this->serializer->deserialize($response, InventoryItem::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/inventoryitem#index
     *
     * @param array $options
     * @return InventoryItem[]
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function getList(array $options): array
    {
        $response = $this->client->get('inventory_items.json', $options);

        return $this->serializer->deserializeList($response, InventoryItem::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/inventoryitem#update
     *
     * @param InventoryItem $inventoryItem
     * @return InventoryItem
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function updateOne(InventoryItem $inventoryItem): InventoryItem
    {
        $body = $this->serializer->serialize($inventoryItem, 'inventory_item', ['put']);

        $response = $this->client->put(
            sprintf('inventory_items/%d.json', $inventoryItem->getId()),
            $body
        );

        return $this->serializer->deserialize($response, InventoryItem::class);
    }
}
