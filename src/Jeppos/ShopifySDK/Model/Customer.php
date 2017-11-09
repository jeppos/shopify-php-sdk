<?php

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Jeppos\ShopifySDK\Enum\CustomerState;
use JMS\Serializer\Annotation as Serializer;

class Customer
{
    use MetafieldTrait;
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
    protected $email;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $acceptsMarketing;

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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $lastName;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $ordersCount;

    /**
     * @var CustomerState|null
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\CustomerState, string>")
     * @Serializer\Groups({"get"})
     */
    protected $state;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $totalSpent;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $lastOrderId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $note;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $verifiedEmail;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $multipassIdentifier;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $taxExempt;

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
    protected $tags;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    protected $lastOrderName;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\CustomerAddress>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $addresses;

    /**
     * @var CustomerAddress
     * @Serializer\Type("Jeppos\ShopifySDK\Model\CustomerAddress")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $defaultAddress;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post"})
     */
    protected $sendEmailInvite;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post"})
     */
    protected $sendEmailWelcome;

    /**
     * A unique numeric identifier for the customer.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function setId(int $id): Customer
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The unique email address of the customer.
     * Attempting to assign the same email address to multiple customers will return an error.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Indicates whether the customer has consented to be sent marketing material via email.
     *
     * @return bool
     */
    public function isAcceptsMarketing(): bool
    {
        return $this->acceptsMarketing;
    }

    /**
     * @param bool $acceptsMarketing
     * @return Customer
     */
    public function setAcceptsMarketing(bool $acceptsMarketing): Customer
    {
        $this->acceptsMarketing = $acceptsMarketing;

        return $this;
    }

    /**
     * The date and time when the customer was created.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * The date and time when the customer information was updated.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName(string $firstName): Customer
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The customer's last name.
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Customer
     */
    public function setLastName(string $lastName): Customer
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The number of orders associated with this customer.
     *
     * @return int
     */
    public function getOrdersCount(): int
    {
        return $this->ordersCount;
    }

    /**
     * @return CustomerState|null
     */
    public function getState(): ?CustomerState
    {
        return $this->state;
    }

    /**
     * The total amount of money that the customer has spent at the shop.
     *
     * @return int
     */
    public function getTotalSpent(): int
    {
        return $this->totalSpent;
    }

    /**
     * The id of the customer's last order.
     *
     * @return int
     */
    public function getLastOrderId(): int
    {
        return $this->lastOrderId;
    }

    /**
     * A note about the customer.
     *
     * @return null|string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $note
     * @return Customer
     */
    public function setNote(?string $note): Customer
    {
        $this->note = $note;

        return $this;
    }

    /**
     * States whether or not the email address has been verified.
     *
     * @return bool
     */
    public function isVerifiedEmail(): bool
    {
        return $this->verifiedEmail;
    }

    /**
     * @param bool $verifiedEmail
     * @return Customer
     */
    public function setVerifiedEmail(bool $verifiedEmail): Customer
    {
        $this->verifiedEmail = $verifiedEmail;

        return $this;
    }

    /**
     * The customer's identifier used with Multipass login
     *
     * @return null|string
     */
    public function getMultipassIdentifier(): ?string
    {
        return $this->multipassIdentifier;
    }

    /**
     * TODO Due to current serialization configuration it's not possible to set this to null.
     *
     * @param null|string $multipassIdentifier
     * @return Customer
     */
    public function setMultipassIdentifier(?string $multipassIdentifier): Customer
    {
        $this->multipassIdentifier = $multipassIdentifier;

        return $this;
    }

    /**
     * Indicates whether the customer should be charged taxes when placing orders.
     *
     * @return bool
     */
    public function isTaxExempt(): bool
    {
        return $this->taxExempt;
    }

    /**
     * @param bool $taxExempt
     * @return Customer
     */
    public function setTaxExempt(bool $taxExempt): Customer
    {
        $this->taxExempt = $taxExempt;

        return $this;
    }

    /**
     * The unique phone number for this customer.
     * Attempting to assign the same phone number to multiple customers will return an error.
     * Valid formats can be of different types,
     * but must represent a number that can be dialed from anywhere in the world.
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Customer
     */
    public function setPhone(string $phone): Customer
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Tags are additional short descriptors formatted as a string of comma-separated values.
     * For example, if an article has three tags: tag1, tag2, tag3.
     *
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     * @return Customer
     */
    public function setTags(string $tags): Customer
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastOrderName(): ?string
    {
        return $this->lastOrderName;
    }

    /**
     * @param null|string $lastOrderName
     * @return Customer
     */
    public function setLastOrderName(?string $lastOrderName): Customer
    {
        $this->lastOrderName = $lastOrderName;

        return $this;
    }

    /**
     * A list of the ten most recently updated addresses for the customer.
     *
     * @return ArrayCollection
     */
    public function getAddresses(): ArrayCollection
    {
        return $this->addresses;
    }

    /**
     * @param ArrayCollection $addresses
     * @return Customer
     */
    public function setAddresses(ArrayCollection $addresses): Customer
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * The default address for the customer.
     *
     * @return CustomerAddress
     */
    public function getDefaultAddress(): CustomerAddress
    {
        return $this->defaultAddress;
    }

    /**
     * @param CustomerAddress $variant
     * @return Customer
     */
    public function addAddress(CustomerAddress $variant): Customer
    {
        $this->validateThatFieldIsArrayCollection('addresses');

        $this->addresses->add($variant);

        return $this;
    }

    /**
     * @param CustomerAddress $variant
     * @return Customer
     */
    public function removeAddress(CustomerAddress $variant): Customer
    {
        $this->validateThatFieldIsArrayCollection('addresses');

        $this->addresses->removeElement($variant);

        return $this;
    }

    /**
     * @param CustomerAddress $defaultAddress
     * @return Customer
     */
    public function setDefaultAddress(CustomerAddress $defaultAddress): Customer
    {
        $this->defaultAddress = $defaultAddress;

        return $this;
    }

    /**
     * @param bool $sendEmailInvite
     * @return Customer
     */
    public function setSendEmailInvite(bool $sendEmailInvite): Customer
    {
        $this->sendEmailInvite = $sendEmailInvite;

        return $this;
    }

    /**
     * @param bool $sendEmailWelcome
     * @return Customer
     */
    public function setSendEmailWelcome(bool $sendEmailWelcome): Customer
    {
        $this->sendEmailWelcome = $sendEmailWelcome;

        return $this;
    }
}
