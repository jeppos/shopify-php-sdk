<?php

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;

trait ArrayCollectionValidatorTrait
{
    /**
     * @param string $field
     * @throws ArrayCollectionException
     */
    protected function validateThatFieldIsArrayCollection(string $field)
    {
        if (!$this->{$field} instanceof ArrayCollection) {
            throw new ArrayCollectionException(
                sprintf('The field %s is not an instance of %s', $field, ArrayCollection::class)
            );
        }
    }
}
