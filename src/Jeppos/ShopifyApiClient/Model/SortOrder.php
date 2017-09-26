<?php

namespace Jeppos\ShopifyApiClient\Model;

use Consistence\Enum\Enum;

/**
 * Class SortOrder
 * @package Jeppos\ShopifyApiClient\Model
 */
class SortOrder extends Enum
{
    const ALPHA_ASC = 'alpha-asc';
    const ALPHA_DESC = 'alpha-desc';
    const BEST_SELLING = 'best-selling';
    const CREATED_ASC = 'created';
    const CREATED_DESC = 'created-desc';
    const MANUAL = 'manual';
    const PRICE_ASC = 'price-asc';
    const PRICE_DESC = 'price-desc';
}
