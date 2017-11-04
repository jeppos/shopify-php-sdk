<?php

namespace Jeppos\ShopifySDK\Model;

use Jeppos\ShopifySDK\Enum\OwnerResource;
use Jeppos\ShopifySDK\Enum\ValueType;
use JMS\Serializer\Annotation as Serializer;

class Metafield
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
    protected $description;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $key;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $namespace;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $ownerId;

    /**
     * @var OwnerResource
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\OwnerResource, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $ownerResource;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $value;

    /**
     * @var ValueType
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\ValueType, string>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $valueType;

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
    public function setOwnerResource($ownerResource)
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
