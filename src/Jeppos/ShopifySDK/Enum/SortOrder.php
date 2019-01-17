<?php

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

class SortOrder extends Enum
{
    public const ALPHA_ASC = 'alpha-asc';
    public const ALPHA_DESC = 'alpha-desc';
    public const BEST_SELLING = 'best-selling';
    public const CREATED_ASC = 'created';
    public const CREATED_DESC = 'created-desc';
    public const MANUAL = 'manual';
    public const PRICE_ASC = 'price-asc';
    public const PRICE_DESC = 'price-desc';
}
