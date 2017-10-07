<?php

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

/**
 * Specifies whether or not customers are allowed to place an order for a product variant when it's out of stock.
 */
class InventoryPolicy extends Enum
{
    /**
     * Customers are not allowed to place orders for a product variant when it's out of stock. (default)
     */
    const DENY = 'deny';
    /**
     * Customers are allowed to place orders for a product variant when it's out of stock.
     */
    const CONTINUE = 'continue';
}
