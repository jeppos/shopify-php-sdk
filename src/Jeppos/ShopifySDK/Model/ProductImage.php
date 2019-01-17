<?php

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/api/reference/product_image
 */
class ProductImage
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
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $position;

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
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    private $width;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    private $height;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $src;

    /**
     * @var int[]
     * @Serializer\Type("array<integer>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $variantIds;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    private $attachment;

    /**
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
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
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
