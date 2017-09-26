<?php

namespace Jeppos\ShopifyApiClient\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class CustomCollectionImage
 * @package Jeppos\ShopifyApiClient\Model
 */
class CustomCollectionImage
{
    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"get"})
     */
    protected $createdAt;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $width;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\Groups({"get"})
     */
    protected $height;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $src;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"post", "put"})
     */
    protected $attachment;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getSrc(): string
    {
        return $this->src;
    }

    /**
     * @param string $src
     * @return CustomCollectionImage
     */
    public function setSrc(string $src): CustomCollectionImage
    {
        $this->src = $src;

        return $this;
    }

    /**
     * @param string $attachment
     * @return CustomCollectionImage
     */
    public function setAttachment(string $attachment): CustomCollectionImage
    {
        $this->attachment = $attachment;

        return $this;
    }
}
