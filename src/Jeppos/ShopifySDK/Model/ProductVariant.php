<?php

namespace Jeppos\ShopifySDK\Model;

use Jeppos\ShopifySDK\Enum\InventoryManagement;
use Jeppos\ShopifySDK\Enum\InventoryPolicy;
use Jeppos\ShopifySDK\Enum\WeightUnit;
use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/products/product_variant
 */
class ProductVariant
{
    use ArrayCollectionValidatorTrait;
    use MetafieldTrait;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "put"})
     */
    private $id;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $productId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $title;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $price;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $sku;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $position;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $grams;

    /**
     * @var InventoryPolicy
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\InventoryPolicy, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $inventoryPolicy;

    /**
     * @var null|float
     * @Serializer\Type("float")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $compareAtPrice;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $fulfillmentService;

    /**
     * @var null|InventoryManagement
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\InventoryManagement, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $inventoryManagement;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $inventoryItemId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $option1;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $option2;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $option3;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $updatedAt;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $taxable;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $barcode;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $imageId;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $weight;

    /**
     * @var WeightUnit
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\WeightUnit, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $weightUnit;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $requiresShipping;

    /**
     * The unique numeric identifier for the product variant.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProductVariant
     */
    public function setId(int $id): ProductVariant
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return ProductVariant
     */
    public function setProductId(int $productId): ProductVariant
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ProductVariant
     */
    public function setTitle(string $title): ProductVariant
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return ProductVariant
     */
    public function setPrice(float $price): ProductVariant
    {
        $this->price = $price;

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
     * @return ProductVariant
     */
    public function setSku(string $sku): ProductVariant
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return ProductVariant
     */
    public function setPosition(int $position): ProductVariant
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getGrams(): int
    {
        return $this->grams;
    }

    /**
     * @param int $grams
     * @return ProductVariant
     */
    public function setGrams(int $grams): ProductVariant
    {
        $this->grams = $grams;

        return $this;
    }

    /**
     * @return InventoryPolicy
     */
    public function getInventoryPolicy(): InventoryPolicy
    {
        return $this->inventoryPolicy;
    }

    /**
     * @param InventoryPolicy $inventoryPolicy
     * @return ProductVariant
     */
    public function setInventoryPolicy(InventoryPolicy $inventoryPolicy): ProductVariant
    {
        $this->inventoryPolicy = $inventoryPolicy;

        return $this;
    }

    /**
     * @return null|float
     */
    public function getCompareAtPrice(): ?float
    {
        return $this->compareAtPrice;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|float $compareAtPrice
     * @return ProductVariant
     */
    public function setCompareAtPrice(?float $compareAtPrice): ProductVariant
    {
        $this->compareAtPrice = $compareAtPrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getFulfillmentService(): string
    {
        return $this->fulfillmentService;
    }

    /**
     * @param string $fulfillmentService
     * @return ProductVariant
     */
    public function setFulfillmentService(string $fulfillmentService): ProductVariant
    {
        $this->fulfillmentService = $fulfillmentService;

        return $this;
    }

    /**
     * @return null|InventoryManagement
     */
    public function getInventoryManagement(): ?InventoryManagement
    {
        return $this->inventoryManagement;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param InventoryManagement $inventoryManagement
     * @return ProductVariant
     */
    public function setInventoryManagement(?InventoryManagement $inventoryManagement): ProductVariant
    {
        $this->inventoryManagement = $inventoryManagement;

        return $this;
    }

    /**
     * @return int
     */
    public function getInventoryItemId(): int
    {
        return $this->inventoryItemId;
    }

    /**
     * @param int $inventoryItemId
     * @return ProductVariant
     */
    public function setInventoryItemId(int $inventoryItemId): ProductVariant
    {
        $this->inventoryItemId = $inventoryItemId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOption1(): ?string
    {
        return $this->option1;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $option1
     * @return ProductVariant
     */
    public function setOption1(?string $option1): ProductVariant
    {
        $this->option1 = $option1;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOption2(): ?string
    {
        return $this->option2;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $option2
     * @return ProductVariant
     */
    public function setOption2(?string $option2): ProductVariant
    {
        $this->option2 = $option2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOption3(): ?string
    {
        return $this->option3;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $option3
     * @return ProductVariant
     */
    public function setOption3(?string $option3): ProductVariant
    {
        $this->option3 = $option3;

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

    /**
     * @return bool
     */
    public function isTaxable(): bool
    {
        return $this->taxable;
    }

    /**
     * @param bool $taxable
     * @return ProductVariant
     */
    public function setTaxable(bool $taxable): ProductVariant
    {
        $this->taxable = $taxable;

        return $this;
    }

    /**
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     * @return ProductVariant
     */
    public function setBarcode(string $barcode): ProductVariant
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->imageId;
    }

    /**
     * @param int $imageId
     * @return ProductVariant
     */
    public function setImageId(int $imageId): ProductVariant
    {
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return ProductVariant
     */
    public function setWeight(float $weight): ProductVariant
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return WeightUnit
     */
    public function getWeightUnit(): WeightUnit
    {
        return $this->weightUnit;
    }

    /**
     * @param WeightUnit $weightUnit
     * @return ProductVariant
     */
    public function setWeightUnit(WeightUnit $weightUnit): ProductVariant
    {
        $this->weightUnit = $weightUnit;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequiresShipping(): bool
    {
        return $this->requiresShipping;
    }

    /**
     * @param bool $requiresShipping
     * @return ProductVariant
     */
    public function setRequiresShipping(bool $requiresShipping): ProductVariant
    {
        $this->requiresShipping = $requiresShipping;

        return $this;
    }

    /**
     * @param int $inventoryQuantityAdjustment
     * @return ProductVariant
     */
    public function setInventoryQuantityAdjustment(int $inventoryQuantityAdjustment): ProductVariant
    {
        $this->inventoryQuantityAdjustment = $inventoryQuantityAdjustment;

        return $this;
    }
}
