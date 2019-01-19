<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

class InventoryPolicy extends Enum
{
    public const DENY = 'deny';
    public const CONTINUE = 'continue';
}
