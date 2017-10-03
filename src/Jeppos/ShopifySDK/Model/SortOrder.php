<?php

namespace Jeppos\ShopifySDK\Model;

use Consistence\Enum\Enum;

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
