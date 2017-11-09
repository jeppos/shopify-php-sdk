<?php

namespace Jeppos\ShopifySDK\Enum;

use Consistence\Enum\Enum;

/**
 * The state of the customer's account in a shop.
 * The state can be changed in the shop admin or by the customer, but not through the API.
 */
class CustomerState extends Enum
{
    /**
     * Customers are disabled by default until they are invited.
     * Staff accounts can disable a customer's account at any time.
     */
    const DISABLED = 'disabled';
    /**
     * The customer has been emailed an invite to create an account that saves their customer settings.
     */
    const INVITED = 'invited';
    /**
     * The customer accepted the email invite and created an account.
     */
    const ENABLED = 'enabled';
    /**
     * The customer declined the email invite to create an account.
     */
    const DECLINED = 'declined';
}
