shopify-php-sdk
==
An easy to use Shopify PHP SDK.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/413a799a1ec944ab84e1050216591b5b)](https://www.codacy.com/app/jeppos/shopify-php-sdk?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jeppos/shopify-php-sdk&amp;utm_campaign=Badge_Grade)
[![Build Status](https://travis-ci.org/jeppos/shopify-php-sdk.svg?branch=master)](https://travis-ci.org/jeppos/shopify-php-sdk)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/413a799a1ec944ab84e1050216591b5b)](https://www.codacy.com/app/jeppos/shopify-php-sdk?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jeppos/shopify-php-sdk&amp;utm_campaign=Badge_Coverage)

# Installation
## Composer

```
composer require jeppos/shopify-php-sdk
```

# Usage

Following example shows how to get the title of a single product.

```php
<?php

include __DIR__ . '/vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

$shopifySDK = new \Jeppos\ShopifySDK\ShopifySDK('your-store-name.myshopify.com', 'api-key', 'api-secret');

$product = $shopifySDK->products->getOneById(123456789);

echo $product->getTitle();
```
