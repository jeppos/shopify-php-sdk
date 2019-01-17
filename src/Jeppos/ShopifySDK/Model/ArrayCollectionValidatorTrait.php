<?php

namespace Jeppos\ShopifySDK\Model;

use Doctrine\Common\Collections\ArrayCollection;

trait ArrayCollectionValidatorTrait
{
    /**
     * @param string $field
     *
     * @throws ArrayCollectionException
     */
    private function validateThatFieldIsArrayCollection(string $field): void
    {
        if ($this->isInstanceOfArrayCollection($field) === false) {
            throw new ArrayCollectionException(
                sprintf('The field %s is not an instance of %s', $field, ArrayCollection::class)
            );
        }
    }

    /**
     * @param string $field
     * @return bool
     */
    private function isInstanceOfArrayCollection(string $field): bool
    {
        return $this->{$field} instanceof ArrayCollection;
    }
}
