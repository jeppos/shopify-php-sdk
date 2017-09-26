<?php

namespace Jeppos\ShopifyApiClient\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Collect
 * @package Jeppos\ShopifyApiClient\Model
 */
class Collect
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
    protected $collectionId;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $productId;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $featured;

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
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $position;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $sortValue;

    /**
     * A unique numeric identifier for the collect.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Collect
     */
    public function setId(int $id): Collect
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The id of the custom collection containing the product.
     *
     * @return int
     */
    public function getCollectionId(): int
    {
        return $this->collectionId;
    }

    /**
     * @param int $collectionId
     * @return Collect
     */
    public function setCollectionId(int $collectionId): Collect
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    /**
     * The unique numeric identifier for the product in the custom collection.
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return Collect
     */
    public function setProductId(int $productId): Collect
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * States whether or not the collect is featured.
     *
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->featured;
    }

    /**
     * @param bool $featured
     * @return Collect
     */
    public function setFeatured(bool $featured): Collect
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * The date and time when the collect was created.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * The date and time when the collect was last updated.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * A number specifying the manually sorted position of this product in a custom collection.
     * The first position is 1.
     * This value only applies when the custom collection is viewed using the Manual sort order.
     *
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return Collect
     */
    public function setPosition(int $position): Collect
    {
        $this->position = $position;

        return $this;
    }

    /**
     * This is the same value as position but padded with leading zeroes to make it alphanumeric-sortable.
     *
     * @return string
     */
    public function getSortValue(): string
    {
        return $this->sortValue;
    }

    /**
     * @param string $sortValue
     * @return Collect
     */
    public function setSortValue(string $sortValue): Collect
    {
        $this->sortValue = $sortValue;

        return $this;
    }
}
