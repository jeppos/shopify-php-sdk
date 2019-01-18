<?php

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/inventory/inventoryitem
 */
class InventoryItem
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "put"})
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $sku;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $cost;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $tracked;

    /**
     * @var \DateTime
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return InventoryItem
     */
    public function setId(int $id): InventoryItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return InventoryItem
     */
    public function setSku(string $sku): InventoryItem
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getCost(): string
    {
        return $this->cost;
    }

    /**
     * @param string $cost
     * @return InventoryItem
     */
    public function setCost(string $cost): InventoryItem
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTracked(): bool
    {
        return $this->tracked;
    }

    /**
     * @param bool $tracked
     * @return InventoryItem
     */
    public function setTracked(bool $tracked): InventoryItem
    {
        $this->tracked = $tracked;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}
