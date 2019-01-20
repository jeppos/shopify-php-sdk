<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Jeppos\ShopifySDK\Client\ShopifyBadResponseException;
use Jeppos\ShopifySDK\Client\ShopifyException;
use Jeppos\ShopifySDK\Client\ShopifyInvalidResponseException;
use Jeppos\ShopifySDK\Model\InventoryLevel;

/**
 * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel
 */
class InventoryLevelService extends AbstractService
{
    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel#index
     *
     * @param array $options
     * @return InventoryLevel[]
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function getList(array $options): array
    {
        $response = $this->client->get('inventory_levels.json', $options);

        return $this->serializer->deserializeList($response, InventoryLevel::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel#set
     *
     * @param InventoryLevel $inventoryLevel
     * @return InventoryLevel
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function setOne(InventoryLevel $inventoryLevel): InventoryLevel
    {
        $body = $this->serializer->serialize($inventoryLevel, null, ['set']);

        $response = $this->client->post('inventory_levels/set.json', $body);

        return $this->serializer->deserialize($response, InventoryLevel::class);
    }

    /**
     * @api
     *
     * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel#adjust
     *
     * @param InventoryLevel $inventoryLevel
     * @return InventoryLevel
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function adjustOne(InventoryLevel $inventoryLevel): InventoryLevel
    {
        $body = $this->serializer->serialize($inventoryLevel, null, ['adjust']);

        $response = $this->client->post('inventory_levels/adjust.json', $body);

        return $this->serializer->deserialize($response, InventoryLevel::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel#connect
     *
     * @param InventoryLevel $inventoryLevel
     * @return InventoryLevel
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     * @throws ShopifyInvalidResponseException
     */
    public function connectOne(InventoryLevel $inventoryLevel): InventoryLevel
    {
        $body = $this->serializer->serialize($inventoryLevel, null, ['connect']);

        $response = $this->client->post('inventory_levels/connect.json', $body);

        return $this->serializer->deserialize($response, InventoryLevel::class);
    }

    /**
     * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel#destroy
     *
     * @param InventoryLevel $inventoryLevel
     * @return bool
     * @throws GuzzleException
     * @throws ShopifyBadResponseException
     * @throws ShopifyException
     */
    public function disconnectOne(InventoryLevel $inventoryLevel): bool
    {
        return $this->client->delete(
            'inventory_levels.json',
            [
                'inventory_item_id' => $inventoryLevel->getInventoryItemId(),
                'location_id' => $inventoryLevel->getLocationId(),
            ]
        );
    }
}
