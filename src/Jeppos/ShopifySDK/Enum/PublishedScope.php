<?php

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

class PublishedScope extends Enum
{
    /**
     * The product is not published to Point of Sale.
     */
    const WEB = 'web';
    /**
     * The product is published to Point of Sale.
     */
    const GLOBAL = 'global';
}
