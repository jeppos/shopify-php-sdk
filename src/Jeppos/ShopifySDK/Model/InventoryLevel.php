<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/inventory/inventorylevel
 */
class InventoryLevel
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "set", "connect", "adjust"})
     */
    private $inventoryItemId;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "set", "connect", "adjust"})
     */
    private $locationId;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "set"})
     */
    private $available;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"adjust"})
     */
    private $availableAdjustment;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"set"})
     */
    private $disconnectIfNecessary;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"connect"})
     */
    private $relocateIfNecessary;

    /**
     * @var \DateTime
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getInventoryItemId(): int
    {
        return $this->inventoryItemId;
    }

    /**
     * @param int $inventoryItemId
     * @return InventoryLevel
     */
    public function setInventoryItemId(int $inventoryItemId): InventoryLevel
    {
        $this->inventoryItemId = $inventoryItemId;
        return $this;
    }

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     * @return InventoryLevel
     */
    public function setLocationId(int $locationId): InventoryLevel
    {
        $this->locationId = $locationId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAvailable(): int
    {
        return $this->available;
    }

    /**
     * @param int $available
     * @return InventoryLevel
     */
    public function setAvailable(int $available): InventoryLevel
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @param int $availableAdjustment
     * @return InventoryLevel
     */
    public function setAvailableAdjustment(int $availableAdjustment): InventoryLevel
    {
        $this->availableAdjustment = $availableAdjustment;
        return $this;
    }

    /**
     * @param bool $disconnectIfNecessary
     * @return InventoryLevel
     */
    public function setDisconnectIfNecessary(bool $disconnectIfNecessary): InventoryLevel
    {
        $this->disconnectIfNecessary = $disconnectIfNecessary;
        return $this;
    }

    /**
     * @param bool $relocateIfNecessary
     * @return InventoryLevel
     */
    public function setRelocateIfNecessary(bool $relocateIfNecessary): InventoryLevel
    {
        $this->relocateIfNecessary = $relocateIfNecessary;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}
