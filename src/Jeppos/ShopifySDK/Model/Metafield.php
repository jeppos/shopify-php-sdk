<?php

namespace Jeppos\ShopifySDK\Model;

use Jeppos\ShopifySDK\Enum\OwnerResource;
use Jeppos\ShopifySDK\Enum\ValueType;
use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/metafield
 */
class Metafield
{
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
    private $description;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $key;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $namespace;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $ownerId;

    /**
     * @var OwnerResource
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\OwnerResource, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $ownerResource;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $value;

    /**
     * @var ValueType
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\ValueType, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $valueType;

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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Metafield
     */
    public function setId(int $id): Metafield
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Metafield
     */
    public function setDescription(string $description): Metafield
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Metafield
     */
    public function setKey(string $key): Metafield
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     * @return Metafield
     */
    public function setNamespace(string $namespace): Metafield
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * @param int $ownerId
     * @return Metafield
     */
    public function setOwnerId(int $ownerId): Metafield
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerResource()
    {
        return $this->ownerResource;
    }

    /**
     * @param mixed $ownerResource
     * @return Metafield
     */
    public function setOwnerResource($ownerResource): Metafield
    {
        $this->ownerResource = $ownerResource;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Metafield
     */
    public function setValue(string $value): Metafield
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return ValueType
     */
    public function getValueType(): ValueType
    {
        return $this->valueType;
    }

    /**
     * @param ValueType $valueType
     * @return Metafield
     */
    public function setValueType(ValueType $valueType): Metafield
    {
        $this->valueType = $valueType;

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
}
