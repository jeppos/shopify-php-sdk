<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Jeppos\ShopifySDK\Enum\CustomerState;
use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://help.shopify.com/en/api/reference/customers/customer
 */
class Customer
{
    use MetafieldTrait;
    use ArrayCollectionValidatorTrait;

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
    private $email;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $acceptsMarketing;

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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $lastName;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    private $ordersCount;

    /**
     * @var CustomerState|null
     * @Serializer\Type("enum<Jeppos\ShopifySDK\Enum\CustomerState, string>")
     * @Serializer\Groups({"get"})
     */
    private $state;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $totalSpent;

    /**
     * @var int|null
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    private $lastOrderId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $note;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $verifiedEmail;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $multipassIdentifier;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $taxExempt;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $phone;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $tags;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"get"})
     */
    private $lastOrderName;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\CustomerAddress>")
     * @Serializer\Groups({"get", "post", "put"})
     */
    private $addresses;

    /**
     * @var CustomerAddress|null
     * @Serializer\Type("Jeppos\ShopifySDK\Model\CustomerAddress")
     * @Serializer\Groups({"get"})
     */
    private $defaultAddress;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post"})
     */
    private $sendEmailInvite;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"post"})
     */
    private $sendEmailWelcome;

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
     * @return string
     */
    public function getTotalSpent(): string
    {
        return $this->totalSpent;
    }

    /**
     * @return int|null
     */
    public function getLastOrderId(): ?int
    {
        return $this->lastOrderId;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return Customer
     */
    public function setNote(?string $note): Customer
    {
        $this->note = $note;

        return $this;
    }

    /**
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
     * @return string|null
     */
    public function getMultipassIdentifier(): ?string
    {
        return $this->multipassIdentifier;
    }

    /**
     * @param string|null $multipassIdentifier
     * @return Customer
     */
    public function setMultipassIdentifier(?string $multipassIdentifier): Customer
    {
        $this->multipassIdentifier = $multipassIdentifier;

        return $this;
    }

    /**
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
     * @param CustomerAddress $variant
     * @throws ArrayCollectionException
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
     * @throws ArrayCollectionException
     * @return Customer
     */
    public function removeAddress(CustomerAddress $variant): Customer
    {
        $this->validateThatFieldIsArrayCollection('addresses');

        $this->addresses->removeElement($variant);

        return $this;
    }

    /**
     * @return CustomerAddress|null
     */
    public function getDefaultAddress(): ?CustomerAddress
    {
        return $this->defaultAddress;
    }

    /**
     * @param CustomerAddress|null $defaultAddress
     * @return Customer
     */
    public function setDefaultAddress(?CustomerAddress $defaultAddress): Customer
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
