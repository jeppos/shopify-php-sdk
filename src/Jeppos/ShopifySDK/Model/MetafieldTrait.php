<?php

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;

trait MetafieldTrait
{
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<Jeppos\ShopifySDK\Model\Metafield>")
     * @Serializer\Groups({"post", "put"})
     */
    protected $metafields;

    /**
     * @return ArrayCollection
     */
    public function getMetafields(): ArrayCollection
    {
        return $this->metafields;
    }

    /**
     * Attaches additional information to a shop's resources.
     *
     * @param ArrayCollection $metafields
     * @return $this
     */
    public function setMetafields(ArrayCollection $metafields): self
    {
        $this->metafields = $metafields;

        return $this;
    }

    /**
     * @param Metafield $metaField
     * @return $this
     */
    public function addMetaField(Metafield $metaField): self
    {
        $this->validateThatFieldIsArrayCollection('metafield');

        $this->metafields->add($metaField);

        return $this;
    }

    /**
     * @param Metafield $metaField
     * @return $this
     */
    public function removeMetaField(Metafield $metaField): self
    {
        $this->validateThatFieldIsArrayCollection('metafield');

        $this->metafields->removeElement($metaField);

        return $this;
    }
}
