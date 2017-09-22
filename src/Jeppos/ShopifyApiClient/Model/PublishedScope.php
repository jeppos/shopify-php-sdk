<?php

namespace Jeppos\ShopifyApiClient\Model;

use Consistence\Enum\Enum;

/**
 * Class PublishedScope
 * @package Jeppos\ShopifyApiClient\Model
 */
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
