<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class ProductOption
{
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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $name;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $position;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $values;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProductOption
     */
    public function setId(int $id): ProductOption
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
     * @return ProductOption
     */
    public function setProductId(int $productId): ProductOption
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProductOption
     */
    public function setName(string $name): ProductOption
    {
        $this->name = $name;

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
     * @return ProductOption
     */
    public function setPosition(int $position): ProductOption
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return ArrayCollection|string[]
     */
    public function getValues(): ArrayCollection
    {
        return $this->values;
    }

    /**
     * @param ArrayCollection $values
     * @return ProductOption
     */
    public function setValues(ArrayCollection $values): ProductOption
    {
        $this->values = $values;

        return $this;
    }
}
