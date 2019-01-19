<?php

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/inventory/location
 */
class Location
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $name;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $address1;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $address2;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $zip;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $city;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $province;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $provinceCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $country;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $countryName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $countryCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $phone;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get"})
     */
    private $active;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get"})
     */
    private $legacy;

    /**
     * @var \DateTime
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("string")
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * @return null|string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @return null|string
     */
    public function getProvinceCode(): ?string
    {
        return $this->provinceCode;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isLegacy(): bool
    {
        return $this->legacy;
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
