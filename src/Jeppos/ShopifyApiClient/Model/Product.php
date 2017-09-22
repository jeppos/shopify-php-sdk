<?php

namespace Jeppos\ShopifyApiClient\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

/**
 * A Product is an individual item for sale in a Shopify store. Products are often physical, but they don't have to be.
 * For example, a digital download (such as a movie, music or ebook file) also qualifies as a product,
 * as do services (such as equipment rental, work for hire, customization of another product or an extended warranty).
 * Simply put: if it's something for sale in a store, then it's a product.
 *
 * A product may have up to 100 product variants and from 0 to 250 product images.
 * A product may also be a part of a custom collection and/or a smart collection.
 *
 * @package Jeppos\ShopifyApiClient\Model
 *
 * TODO Add metafields_global_title_tag and metafields_global_description_tag?
 */
class Product
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $bodyHtml;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $vendor;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $productType;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $handle;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $updatedAt;

    /**
     * @var null|\DateTime
     * @Serializer\Type("DateTime")
     */
    protected $publishedAt;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    protected $templateSuffix;

    /**
     * @var PublishedScope
     * @Serializer\Type("enum<Jeppos\ShopifyApiClient\Model\PublishedScope, string>")
     */
    protected $publishedScope;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $tags;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\ProductVariant>")
     */
    protected $variants;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\ProductOption>")
     */
    protected $options;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\ProductImage>")
     */
    protected $images;

    /**
     * @var ProductImage
     * @Serializer\Type("Jeppos\ShopifyApiClient\Model\ProductImage")
     */
    protected $image;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->variants = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    /**
     * The unique numeric identifier for the product.
     * Product ids are unique across the entire Shopify system;
     * no two products will have the same id, even if they're from different shops.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the product.
     * In a shop's catalog, clicking on a product's title takes you to that product's page.
     * On a product's page, the product's title typically appears in a large font.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;

        return $this;
    }

    /**
     * The description of the product, complete with HTML formatting.
     *
     * @return string
     */
    public function getBodyHtml(): string
    {
        return $this->bodyHtml;
    }

    /**
     * @param string $bodyHtml
     * @return Product
     */
    public function setBodyHtml(string $bodyHtml): Product
    {
        $this->bodyHtml = $bodyHtml;

        return $this;
    }

    /**
     * The name of the vendor of the product.
     *
     * @return string
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @param string $vendor
     * @return Product
     */
    public function setVendor(string $vendor): Product
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * A categorization that a product can be tagged with, commonly used for filtering and searching.
     *
     * @return string
     */
    public function getProductType(): string
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     * @return Product
     */
    public function setProductType(string $productType): Product
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * The date and time when the product was created.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt(\DateTime $createdAt): Product
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * A human-friendly unique string for the Product automatically generated from its title.
     * They are used by the Liquid templating language to refer to objects.
     *
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     * @return Product
     */
    public function setHandle(string $handle): Product
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * The date and time when the product was last modified.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Product
     */
    public function setUpdatedAt(\DateTime $updatedAt): Product
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * The date and time when the product was published to the Online Store channel.
     * A value of null indicates that the product is not published to Online Store.
     *
     * @return null|\DateTime
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @param null|\DateTime $publishedAt
     * @return Product
     */
    public function setPublishedAt(?\DateTime $publishedAt): Product
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * The suffix of the liquid template being used. By default, the original template is called product.liquid,
     * without any suffix. Any additional templates will be: product.suffix.liquid.
     *
     * @return null|string
     */
    public function getTemplateSuffix(): ?string
    {
        return $this->templateSuffix;
    }

    /**
     * @param null|string $templateSuffix
     * @return Product
     */
    public function setTemplateSuffix(?string $templateSuffix): Product
    {
        $this->templateSuffix = $templateSuffix;

        return $this;
    }

    /**
     * Indicates whether the product is published to the Point of Sale channel.
     *
     * @return PublishedScope
     */
    public function getPublishedScope(): PublishedScope
    {
        return $this->publishedScope;
    }

    /**
     * @param PublishedScope $publishedScope
     * @return Product
     */
    public function setPublishedScope(PublishedScope $publishedScope): Product
    {
        $this->publishedScope = $publishedScope;

        return $this;
    }

    /**
     * A categorization that a product can be tagged with, commonly used for filtering and searching.
     * Each comma-separated tag has a character limit of 255.
     *
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     * @return Product
     */
    public function setTags(string $tags): Product
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * A list of variant objects, each one representing a slightly different version of the product.
     * For example, if a product comes in different sizes and colors, each size and color permutation
     * (such as "small black", "medium black", "large blue"), would be a variant.
     *
     * To reorder variants, update the product with the variants in the desired order.
     * The position attribute on the variant will be ignored.
     *
     * @return ArrayCollection
     */
    public function getVariants(): ArrayCollection
    {
        return $this->variants;
    }

    /**
     * @param ArrayCollection $variants
     * @return Product
     */
    public function setVariants(ArrayCollection $variants): Product
    {
        $this->variants = $variants;

        return $this;
    }

    /**
     * Custom product property names like "Size", "Color", and "Material".
     * Products are based on permutations of these options.
     * A product may have a maximum of 3 options. 255 characters limit each.
     *
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     * @return Product
     */
    public function setOptions(ArrayCollection $options): Product
    {
        $this->options = $options;

        return $this;
    }

    /**
     * A list of image objects, each one representing an image associated with the product.
     *
     * @return ArrayCollection
     */
    public function getImages(): ArrayCollection
    {
        return $this->images;
    }

    /**
     * @param ArrayCollection $images
     * @return Product
     */
    public function setImages(ArrayCollection $images): Product
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return ProductImage
     */
    public function getImage(): ProductImage
    {
        return $this->image;
    }

    /**
     * @param ProductImage $image
     * @return Product
     */
    public function setImage(ProductImage $image): Product
    {
        $this->image = $image;

        return $this;
    }
}
