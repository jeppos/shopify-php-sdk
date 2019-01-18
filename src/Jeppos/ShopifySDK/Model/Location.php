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
     * @Serializer\Groups({"get", "put"})
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $name;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $address1;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $address2;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $zip;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $city;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $province;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $provinceCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
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
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $countryCode;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $phone;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $active;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
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
     * @param int $id
     * @return Location
     */
    public function setId(int $id): Location
    {
        $this->id = $id;
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
     * @return Location
     */
    public function setName(string $name): Location
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param null|string $address1
     * @return Location
     */
    public function setAddress1(?string $address1): Location
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param null|string $address2
     * @return Location
     */
    public function setAddress2(?string $address2): Location
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param null|string $zip
     * @return Location
     */
    public function setZip(?string $zip): Location
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     * @return Location
     */
    public function setCity(?string $city): Location
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @param null|string $province
     * @return Location
     */
    public function setProvince(?string $province): Location
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProvinceCode(): ?string
    {
        return $this->provinceCode;
    }

    /**
     * @param null|string $provinceCode
     * @return Location
     */
    public function setProvinceCode(?string $provinceCode): Location
    {
        $this->provinceCode = $provinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Location
     */
    public function setCountry(string $country): Location
    {
        $this->country = $country;
        return $this;
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
     * @param string $countryCode
     * @return Location
     */
    public function setCountryCode(string $countryCode): Location
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     * @return Location
     */
    public function setPhone(?string $phone): Location
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Location
     */
    public function setActive(bool $active): Location
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLegacy(): bool
    {
        return $this->legacy;
    }

    /**
     * @param bool $legacy
     * @return Location
     */
    public function setLegacy(bool $legacy): Location
    {
        $this->legacy = $legacy;
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
