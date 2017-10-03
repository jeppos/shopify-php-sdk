<?php

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class CustomCollection
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "put"})
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $handle;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $title;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $updatedAt;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $bodyHtml;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post", "put"})
     */
    protected $published;

    /**
     * @var null|\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $publishedAt;

    /**
     * @var SortOrder
     * @Serializer\Type("enum<Jeppos\ShopifyApiClient\Model\SortOrder, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $sortOrder;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $templateSuffix;

    /**
     * TODO Only when receiving single product
     *
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $productsCount;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $publishedScope;

    /**
     * @var null|CustomCollectionImage
     * @Serializer\Type("Jeppos\ShopifyApiClient\Model\CustomCollectionImage")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $image;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\Collect>")
     * @Serializer\Groups({"post", "put"})
     */
    protected $collects;

    /**
     * The unique numeric identifier for the custom collection.
     *
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
     * A human-friendly unique string for the custom collection automatically generated from its title.
     * This is used in shop themes by the Liquid templating language to refer to the custom collection.
     * Limit of 255 characters.
     *
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
     * The name of the custom collection. Limit of 255 characters.
     *
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
     * The date and time when the custom collection was last modified.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * The description of the custom collection, complete with HTML markup.
     * Many templates display this on their custom collection pages.
     *
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
     * The suffix of the liquid template being used.
     * By default, the original template is called product.liquid, without any suffix.
     * Any additional templates will be: product.suffix.liquid.
     *
     * @return null|string
     */
    public function getTemplateSuffix(): ?string
    {
        return $this->templateSuffix;
    }

    /**
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
     * The sales channels in which the custom collection is available.
     *
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
     * Image associated with the custom collection.
     *
     * @return null|CustomCollectionImage
     */
    public function getImage(): ?CustomCollectionImage
    {
        return $this->image;
    }

    /**
     * @param CustomCollectionImage $image
     * @return CustomCollection
     */
    public function setImage(CustomCollectionImage $image): CustomCollection
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
     * @return CustomCollection
     */
    public function addCollect(Collect $collect): CustomCollection
    {
        $this->collects->add($collect);

        return $this;
    }

    /**
     * @param Collect $collect
     * @return CustomCollection
     */
    public function removeCollect(Collect $collect): CustomCollection
    {
        $this->collects->removeElement($collect);

        return $this;
    }
}
