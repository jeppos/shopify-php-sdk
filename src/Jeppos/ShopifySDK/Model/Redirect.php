<?php

namespace Jeppos\ShopifySDK\Model;

use JMS\Serializer\Annotation as Serializer;

class Redirect
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
    protected $path;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"get", "post", "put"})
     */
    protected $target;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Redirect
     */
    public function setId(int $id): Redirect
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Redirect
     */
    public function setPath(string $path): Redirect
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     * @return Redirect
     */
    public function setTarget(string $target): Redirect
    {
        $this->target = $target;

        return $this;
    }
}
