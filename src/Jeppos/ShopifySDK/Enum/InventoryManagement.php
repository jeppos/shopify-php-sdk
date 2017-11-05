<?php

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

/**
 * Specifies whether or not Shopify tracks the number of items in stock for this product variant.
 */
class InventoryManagement extends Enum
{
    /**
     * Shopify does track the number of items in stock for this product variant.
     */
    const SHOPIFY = 'shopify';
}
