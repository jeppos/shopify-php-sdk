<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

class OwnerResource extends Enum
{
    public const ARTICLE = 'article';
    public const BLOG = 'blog';
    public const CUSTOM_COLLECTION = 'custom_collection';
    public const CUSTOMER = 'customer';
    public const DRAFT_ORDER = 'draft_order';
    public const ORDER = 'order';
    public const PAGE = 'page';
    public const PRODUCT = 'product';
    public const PRODUCT_VARIANT = 'product_variant';
    public const VARIANT = 'variant';
    public const SHOP = 'shop';
    public const SMART_COLLECTION = 'smart_collection';
}
