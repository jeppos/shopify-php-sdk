<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;

trait MetafieldTrait
{
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\Metafield>")
     * @Serializer\Groups({"post", "put"})
     */
    private $metafields;

    /**
     * @param ArrayCollection $metafields
     * @return $this
     */
    public function setMetafields(ArrayCollection $metafields): self
    {
        $this->metafields = $metafields;

        return $this;
    }
}
