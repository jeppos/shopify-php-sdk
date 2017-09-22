<?php

namespace Jeppos\ShopifyApiClient\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Products are easier to sell if customers can see pictures of them, which is why there are product images.
 *
 * Any product may have up to 250 images, and images can be in .png, .gif or .jpg format.
 *
 * @package Jeppos\ShopifyApiClient\Model
 */
class ProductImage
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $productId;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $position;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $updatedAt;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $width;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $height;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $src;

    /**
     * @var int[]
     * @Serializer\Type("array<integer>")
     */
    protected $variantIds;

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
     * @param \DateTime $createdAt
     * @return ProductImage
     */
    public function setCreatedAt(\DateTime $createdAt): ProductImage
    {
        $this->createdAt = $createdAt;

        return $this;
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
     * @param \DateTime $updatedAt
     * @return ProductImage
     */
    public function setUpdatedAt(\DateTime $updatedAt): ProductImage
    {
        $this->updatedAt = $updatedAt;

        return $this;
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
     * @param int $width
     * @return ProductImage
     */
    public function setWidth(int $width): ProductImage
    {
        $this->width = $width;

        return $this;
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
     * @param int $height
     * @return ProductImage
     */
    public function setHeight(int $height): ProductImage
    {
        $this->height = $height;

        return $this;
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
}
