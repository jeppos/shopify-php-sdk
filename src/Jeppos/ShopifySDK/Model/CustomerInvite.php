<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Model;

/**
 * @see https://help.shopify.com/en/api/reference/customers/customer#send_invite
 */
class CustomerInvite
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post"})
     */
    private $to;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post"})
     */
    private $from;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post"})
     */
    private $subject;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post"})
     */
    private $customMessage;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     * @Serializer\Groups({"get", "post"})
     */
    private $bcc;

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return CustomerInvite
     */
    public function setTo(string $to): CustomerInvite
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return CustomerInvite
     */
    public function setFrom(string $from): CustomerInvite
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return CustomerInvite
     */
    public function setSubject(string $subject): CustomerInvite
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomMessage(): string
    {
        return $this->customMessage;
    }

    /**
     * @param string $customMessage
     * @return CustomerInvite
     */
    public function setCustomMessage(string $customMessage): CustomerInvite
    {
        $this->customMessage = $customMessage;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getBcc(): array
    {
        return $this->bcc;
    }

    /**
     * @param string[] $bcc
     * @return CustomerInvite
     */
    public function setBcc(array $bcc): CustomerInvite
    {
        $this->bcc = $bcc;
        return $this;
    }
}
