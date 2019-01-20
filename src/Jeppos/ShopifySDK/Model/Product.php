<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Jeppos\ShopifySDK\Enum\PublishedScope;
use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/products/product
 */
class Product
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
    private $title;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $bodyHtml;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $vendor;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $productType;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $handle;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $updatedAt;

    /**
     * @var null|\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    private $publishedAt;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $templateSuffix;

    /**
     * @var PublishedScope
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\PublishedScope, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $publishedScope;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $tags;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\ProductVariant>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $variants;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\ProductOption>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $options;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\ProductImage>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $images;

    /**
     * @var null|ProductImage
     * @Serializer\Type("Jeppos\ShopifySDK\Model\ProductImage")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $image;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post", "put"})
     */
    private $published;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    private $metafieldsGlobalTitleTag;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    private $metafieldsGlobalDescriptionTag;

    /**
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
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
     * @return Product
     */
    public function setHandle(string $handle): Product
    {
        $this->handle = $handle;

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
     * @return null|\DateTime
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }

    /**
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
     * @throws ArrayCollectionException
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
     * @throws ArrayCollectionException
     */
    public function removeVariant(ProductVariant $variant): Product
    {
        $this->validateThatFieldIsArrayCollection('variants');

        $this->variants->removeElement($variant);

        return $this;
    }

    /**
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
     * @throws ArrayCollectionException
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
     * @throws ArrayCollectionException
     */
    public function removeOption(ProductOption $option): Product
    {
        $this->validateThatFieldIsArrayCollection('option');

        $this->options->removeElement($option);

        return $this;
    }

    /**
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
     * @return null|ProductImage
     */
    public function getImage(): ?ProductImage
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
     * @param string $metafieldsGlobalTitleTag
     * @return Product
     */
    public function setMetafieldsGlobalTitleTag(string $metafieldsGlobalTitleTag): Product
    {
        $this->metafieldsGlobalTitleTag = $metafieldsGlobalTitleTag;

        return $this;
    }

    /**
     * @param string $metafieldsGlobalDescriptionTag
     * @return Product
     */
    public function setMetafieldsGlobalDescriptionTag(string $metafieldsGlobalDescriptionTag): Product
    {
        $this->metafieldsGlobalDescriptionTag = $metafieldsGlobalDescriptionTag;

        return $this;
    }
}
