<?php

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

class CustomerAddress
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get", "put"})
     */
    protected $id;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $firstName;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $lastName;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $company;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $address1;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $address2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $city;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $province;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $country;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $zip;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $phone;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $name;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $provinceCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $countryCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $countryName;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $default;

    /**
     * A unique numeric identifier for the address.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CustomerAddress
     */
    public function setId(int $id): CustomerAddress
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The customer's first name.
     *
     * @return null|string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $firstName
     * @return CustomerAddress
     */
    public function setFirstName(?string $firstName): CustomerAddress
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The customer's last name.
     *
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $lastName
     * @return CustomerAddress
     */
    public function setLastName(?string $lastName): CustomerAddress
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The customer's company.
     *
     * @return null|string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $company
     * @return CustomerAddress
     */
    public function setCompany(?string $company): CustomerAddress
    {
        $this->company = $company;

        return $this;
    }

    /**
     * The customer's mailing address.
     *
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return CustomerAddress
     */
    public function setAddress1(string $address1): CustomerAddress
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * An additional field for the customer's mailing address.
     *
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     * @return CustomerAddress
     */
    public function setAddress2(string $address2): CustomerAddress
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * The customer's city.
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return CustomerAddress
     */
    public function setCity(string $city): CustomerAddress
    {
        $this->city = $city;

        return $this;
    }

    /**
     * The customer's province or state name.
     *
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @param string $province
     * @return CustomerAddress
     */
    public function setProvince(string $province): CustomerAddress
    {
        $this->province = $province;

        return $this;
    }

    /**
     * The customer's country.
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return CustomerAddress
     */
    public function setCountry(string $country): CustomerAddress
    {
        $this->country = $country;

        return $this;
    }

    /**
     * The customer's zip or postal code.
     *
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return CustomerAddress
     */
    public function setZip(string $zip): CustomerAddress
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * The customer's phone number for this mailing address.
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return CustomerAddress
     */
    public function setPhone(string $phone): CustomerAddress
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * The customer's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CustomerAddress
     */
    public function setName(string $name): CustomerAddress
    {
        $this->name = $name;

        return $this;
    }

    /**
     * The two-letter pcode for the customer's province or state.
     *
     * @return string
     */
    public function getProvinceCode(): string
    {
        return $this->provinceCode;
    }

    /**
     * @param string $provinceCode
     * @return CustomerAddress
     */
    public function setProvinceCode(string $provinceCode): CustomerAddress
    {
        $this->provinceCode = $provinceCode;

        return $this;
    }

    /**
     * The two-letter country code corresponding to the customer's country.
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return CustomerAddress
     */
    public function setCountryCode(string $countryCode): CustomerAddress
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * The customer's normalized country name.
     *
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     * @return CustomerAddress
     */
    public function setCountryName(string $countryName): CustomerAddress
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * Indicates whether this address is the default address for the customer.
     *
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return CustomerAddress
     */
    public function setDefault(bool $default): CustomerAddress
    {
        $this->default = $default;

        return $this;
    }
}
