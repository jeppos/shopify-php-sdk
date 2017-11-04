<?php

namespace Jeppos\ShopifySDK\Model;

use Jeppos\ShopifySDK\Enum\InventoryManagement;
use Jeppos\ShopifySDK\Enum\InventoryPolicy;
use Jeppos\ShopifySDK\Enum\WeightUnit;
use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/api/reference/product_variant
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
    protected $id;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $productId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $title;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $price;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $sku;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $position;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $grams;

    /**
     * @var InventoryPolicy
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\InventoryPolicy, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $inventoryPolicy;

    /**
     * @var null|float
     * @Serializer\Type("float")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $compareAtPrice;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $fulfillmentService;

    /**
     * @var null|InventoryManagement
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\InventoryManagement, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $inventoryManagement;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $option1;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $option2;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $option3;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $updatedAt;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $taxable;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $barcode;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $imageId;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $inventoryQuantity;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $weight;

    /**
     * @var WeightUnit
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\WeightUnit, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $weightUnit;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $oldInventoryQuantity;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $requiresShipping;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"put"})
     */
    protected $inventoryQuantityAdjustment;

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
     * The unique numeric identifier for the product.
     *
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
     * The title of the product variant.
     *
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
     * The price of the product variant.
     *
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
     * A unique identifier for the product in the shop.
     *
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
     * The order of the product variant in the list of product variants. 1 is the first position.
     * To reorder variants, update the product with the variants in the desired order.
     * The position attribute on the variant will be ignored.
     *
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
     * The weight of the product variant in grams.
     *
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
     * Specifies whether or not customers are allowed to place an order for a product variant when it's out of stock.
     *
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
     * The competitors price for the same item.
     *
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
     * The service which is handling fulfillment. Valid values are: manual, gift_card, or the handle of a FulfillmentService.
     *
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
     * Specifies whether or not Shopify tracks the number of items in stock for this product variant.
     *
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
     * Custom property that a shop owner can use to define product variants.
     *
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
     * Custom property that a shop owner can use to define product variants.
     *
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
     * Custom property that a shop owner can use to define product variants.
     *
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
     * The date and time when the product variant was created.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * The date and time when the product variant was last modified.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Specifies whether or not a tax is charged when the product variant is sold.
     *
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
     * The barcode, UPC or ISBN number for the product.
     *
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
     * The unique numeric identifier for a product's image. Image must be associated to the same product as the variant.
     *
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
     * The number of items in stock for this product variant.
     *
     * @return int
     */
    public function getInventoryQuantity(): int
    {
        return $this->inventoryQuantity;
    }

    /**
     * @param int $inventoryQuantity
     * @return ProductVariant
     */
    public function setInventoryQuantity(int $inventoryQuantity): ProductVariant
    {
        $this->inventoryQuantity = $inventoryQuantity;

        return $this;
    }

    /**
     * The weight of the product variant in the unit system specified with weight_unit.
     *
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
     * The unit system that the product variant's weight is measure in.
     * The weight_unit can be either "g", "kg, "oz", or "lb".
     *
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
     * The original stock level the client believes the product variant has.
     * This should be sent to avoid a race condition when the item being adjusted is simultaneously sold online.
     *
     * @return int
     */
    public function getOldInventoryQuantity(): int
    {
        return $this->oldInventoryQuantity;
    }

    /**
     * @param int $oldInventoryQuantity
     * @return ProductVariant
     */
    public function setOldInventoryQuantity(int $oldInventoryQuantity): ProductVariant
    {
        $this->oldInventoryQuantity = $oldInventoryQuantity;

        return $this;
    }

    /**
     * Specifies whether or not a customer needs to provide a
     * shipping address when placing an order for this product variant.
     *
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
     * Instead of sending a new and old value for inventory an adjustment value can be sent.
     * If an adjustment value is sent it will take priority.
     *
     * @param int $inventoryQuantityAdjustment
     * @return ProductVariant
     */
    public function setInventoryQuantityAdjustment(int $inventoryQuantityAdjustment): ProductVariant
    {
        $this->inventoryQuantityAdjustment = $inventoryQuantityAdjustment;

        return $this;
    }
}
