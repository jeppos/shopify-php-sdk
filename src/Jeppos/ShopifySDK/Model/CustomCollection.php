<?php

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Jeppos\ShopifySDK\Enum\SortOrder;
use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/products/customcollection
 */
class CustomCollection
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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $handle;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $title;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $updatedAt;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $bodyHtml;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post", "put"})
     */
    private $published;

    /**
     * @var null|\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $publishedAt;

    /**
     * @var SortOrder
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\SortOrder, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $sortOrder;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $templateSuffix;

    /**
     * TODO Only when retrieving single collection
     *
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    private $productsCount;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $publishedScope;

    /**
     * @var null|CustomCollectionImage
     * @Serializer\Type("Jeppos\ShopifySDK\Model\CustomCollectionImage")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $image;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\Collect>")
     * @Serializer\Groups({"post", "put"})
     */
    private $collects;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CustomCollection
     */
    public function setId(int $id): CustomCollection
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     * @return CustomCollection
     */
    public function setHandle(string $handle): CustomCollection
    {
        $this->handle = $handle;

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
     * @return CustomCollection
     */
    public function setTitle(string $title): CustomCollection
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getBodyHtml(): string
    {
        return $this->bodyHtml;
    }

    /**
     * @param string $bodyHtml
     * @return CustomCollection
     */
    public function setBodyHtml(string $bodyHtml): CustomCollection
    {
        $this->bodyHtml = $bodyHtml;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->getPublishedAt() !== null;
    }

    /**
     * @param bool $published
     * @return CustomCollection
     */
    public function setPublished(bool $published): CustomCollection
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @return null|\DateTime
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @return SortOrder
     */
    public function getSortOrder(): SortOrder
    {
        return $this->sortOrder;
    }

    /**
     * @param SortOrder $sortOrder
     * @return CustomCollection
     */
    public function setSortOrder(SortOrder $sortOrder): CustomCollection
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTemplateSuffix(): ?string
    {
        return $this->templateSuffix;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $templateSuffix
     * @return CustomCollection
     */
    public function setTemplateSuffix(?string $templateSuffix): CustomCollection
    {
        $this->templateSuffix = $templateSuffix;

        return $this;
    }

    /**
     * @return int
     */
    public function getProductsCount(): int
    {
        return $this->productsCount;
    }

    /**
     * @return string
     */
    public function getPublishedScope(): string
    {
        return $this->publishedScope;
    }

    /**
     * @param string $publishedScope
     * @return CustomCollection
     */
    public function setPublishedScope(string $publishedScope): CustomCollection
    {
        $this->publishedScope = $publishedScope;

        return $this;
    }

    /**
     * @return null|CustomCollectionImage
     */
    public function getImage(): ?CustomCollectionImage
    {
        return $this->image;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|CustomCollectionImage $image
     * @return CustomCollection
     */
    public function setImage(?CustomCollectionImage $image): CustomCollection
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param ArrayCollection $collects
     * @return CustomCollection
     */
    public function setCollects(ArrayCollection $collects): CustomCollection
    {
        $this->collects = $collects;

        return $this;
    }

    /**
     * @param Collect $collect
     * @throws ArrayCollectionException
     * @return CustomCollection
     */
    public function addCollect(Collect $collect): CustomCollection
    {
        $this->validateThatFieldIsArrayCollection('collect');

        $this->collects->add($collect);

        return $this;
    }

    /**
     * @param Collect $collect
     * @throws ArrayCollectionException
     * @return CustomCollection
     */
    public function removeCollect(Collect $collect): CustomCollection
    {
        $this->validateThatFieldIsArrayCollection('collect');

        $this->collects->removeElement($collect);

        return $this;
    }
}
