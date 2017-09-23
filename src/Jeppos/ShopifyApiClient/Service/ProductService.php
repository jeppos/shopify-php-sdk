<?php

namespace Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Model\Product;

/**
 * Class ProductService
 * @package Jeppos\ShopifyApiClient\Service
 */
class ProductService extends AbstractService
{
    /**
     * @param int $id
     * @return Product
     */
    public function getOneById(int $id): Product
    {
        return $this->get(Product::class, $id);
    }

    /**
     * @return Product[]
     */
    public function getAll(): array
    {
        return $this->getList(Product::class);
    }

    /**
     * @return string
     */
    protected function getResourceKey(): string
    {
        return 'product';
    }
}
