<?php

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

class CustomerState extends Enum
{
    public const DISABLED = 'disabled';
    public const INVITED = 'invited';
    public const ENABLED = 'enabled';
    public const DECLINED = 'declined';
}
