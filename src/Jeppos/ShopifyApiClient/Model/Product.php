<?php

namespace Jeppos\ShopifyApiClient\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Product
 * @package Jeppos\ShopifyApiClient\Model
 *
 * @see https://help.shopify.com/api/reference/product
 */
class Product
{
    use ArrayCollectionValidatorTrait;

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
    protected $title;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $bodyHtml;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $vendor;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $productType;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $handle;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $updatedAt;

    /**
     * @var null|\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $publishedAt;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $templateSuffix;

    /**
     * @var PublishedScope
     * @Serializer\Type("enum<Jeppos\ShopifyApiClient\Model\PublishedScope, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $publishedScope;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $tags;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\ProductVariant>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $variants;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\ProductOption>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $options;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifyApiClient\Model\ProductImage>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $images;

    /**
     * @var ProductImage
     * @Serializer\Type("Jeppos\ShopifyApiClient\Model\ProductImage")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $image;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post", "put"})
     */
    protected $published;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    protected $metafieldsGlobalTitleTag;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    protected $metafieldsGlobalDescriptionTag;

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
     * @return null|string
     */
    public function getBodyHtml(): ?string
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
     * @return ArrayCollection|ProductVariant[]
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
     * @param ProductVariant $variant
     * @return Product
     */
    public function addVariant(ProductVariant $variant): Product
    {
        $this->validateThatFieldIsArrayCollection('variants');

        $this->variants->add($variant);

        return $this;
    }

    /**
     * @param ProductVariant $variant
     * @return Product
     */
    public function removeVariant(ProductVariant $variant): Product
    {
        $this->validateThatFieldIsArrayCollection('variants');

        $this->variants->removeElement($variant);

        return $this;
    }

    /**
     * Custom product property names like "Size", "Color", and "Material".
     * Products are based on permutations of these options.
     * A product may have a maximum of 3 options. 255 characters limit each.
     *
     * @return ArrayCollection|ProductOption[]
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
     * @param ProductOption $option
     * @return Product
     */
    public function addOption(ProductOption $option): Product
    {
        $this->validateThatFieldIsArrayCollection('option');

        $this->options->add($option);

        return $this;
    }

    /**
     * @param ProductOption $option
     * @return Product
     */
    public function removeOption(ProductOption $option): Product
    {
        $this->validateThatFieldIsArrayCollection('option');

        $this->options->removeElement($option);

        return $this;
    }

    /**
     * A list of image objects, each one representing an image associated with the product.
     *
     * @return ArrayCollection|ProductImage[]
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
     * @param ProductImage $image
     * @return Product
     * @throws ArrayCollectionException
     */
    public function addImage(ProductImage $image): Product
    {
        $this->validateThatFieldIsArrayCollection('images');

        $this->images->add($image);

        return $this;
    }

    /**
     * @param ProductImage $image
     * @return Product
     * @throws ArrayCollectionException
     */
    public function removeImage(ProductImage $image): Product
    {
        $this->validateThatFieldIsArrayCollection('images');

        $this->images->removeElement($image);

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
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->getPublishedAt() !== null;
    }

    /**
     * @param bool $published
     * @return Product
     */
    public function setPublished(bool $published): Product
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Name of the product used for SEO purposes. Generally added to the <meta name='title'> tag.
     *
     * @param string $metafieldsGlobalTitleTag
     * @return Product
     */
    public function setMetafieldsGlobalTitleTag(string $metafieldsGlobalTitleTag): Product
    {
        $this->metafieldsGlobalTitleTag = $metafieldsGlobalTitleTag;

        return $this;
    }

    /**
     * Description of the product used for SEO purposes. Generally added to the <meta name='description'> tag.
     *
     * @param string $metafieldsGlobalDescriptionTag
     * @return Product
     */
    public function setMetafieldsGlobalDescriptionTag(string $metafieldsGlobalDescriptionTag): Product
    {
        $this->metafieldsGlobalDescriptionTag = $metafieldsGlobalDescriptionTag;

        return $this;
    }
}
