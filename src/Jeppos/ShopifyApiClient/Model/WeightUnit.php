<?php

namespace Jeppos\ShopifyApiClient\Model;

use Consistence\Enum\Enum;

/**
 * Class WeightUnit
 * @package Jeppos\ShopifyApiClient\Model
 */
class WeightUnit extends Enum
{
    const KG = 'kg';
    const G = 'g';
    const OZ = 'oz';
    const LB = 'lb';
}
