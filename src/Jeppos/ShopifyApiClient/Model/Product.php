<?php

namespace Jeppos\ShopifyApiClient\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Product
 * @package Jeppos\ShopifyApiClient\Model
 */
class Product
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;

        return $this;
    }
}
