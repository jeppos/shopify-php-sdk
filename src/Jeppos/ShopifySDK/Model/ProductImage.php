<?php

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/api/reference/product_image
 */
class ProductImage
{
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
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $position;

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
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $width;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $height;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $src;

    /**
     * @var int[]
     * @Serializer\Type("array<integer>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $variantIds;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    protected $attachment;

    /**
     * A unique numeric identifier for the product image.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProductImage
     */
    public function setId(int $id): ProductImage
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The id of the product associated with the image.
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return ProductImage
     */
    public function setProductId(int $productId): ProductImage
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * The order of the product image in the list.
     * The first product image is at position 1 and is the "main" image for the product.
     *
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return ProductImage
     */
    public function setPosition(int $position): ProductImage
    {
        $this->position = $position;

        return $this;
    }

    /**
     * The date and time when the product image was created.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * The date and time when the product image was last modified.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Width dimension of the image which is determined on upload.
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Height dimension of the image which is determined on upload.
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Specifies the location of the product image.
     *
     * @return string
     */
    public function getSrc(): string
    {
        return $this->src;
    }

    /**
     * @param string $src
     * @return ProductImage
     */
    public function setSrc(string $src): ProductImage
    {
        $this->src = $src;

        return $this;
    }

    /**
     * An array of variant ids associated with the image.
     *
     * @return int[]
     */
    public function getVariantIds(): array
    {
        return $this->variantIds;
    }

    /**
     * @param int[] $variantIds
     * @return ProductImage
     */
    public function setVariantIds(array $variantIds): ProductImage
    {
        $this->variantIds = $variantIds;

        return $this;
    }

    /**
     * @param string $attachment
     * @return ProductImage
     */
    public function setAttachment(string $attachment): ProductImage
    {
        $this->attachment = $attachment;

        return $this;
    }
}
