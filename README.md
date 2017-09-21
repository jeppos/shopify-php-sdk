shopify-php-api-client
==
A simple Shopify PHP API client.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/413a799a1ec944ab84e1050216591b5b)](https://www.codacy.com/app/jeppos/shopify-php-api-client?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jeppos/shopify-php-api-client&amp;utm_campaign=Badge_Grade)
[![Build Status](https://travis-ci.org/jeppos/shopify-php-api-client.svg?branch=master)](https://travis-ci.org/jeppos/shopify-php-api-client)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/413a799a1ec944ab84e1050216591b5b)](https://www.codacy.com/app/jeppos/shopify-php-api-client?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jeppos/shopify-php-api-client&amp;utm_campaign=Badge_Coverage)

# Installation
## Composer

```
composer require jeppos/shopify-php-api-client
```

# Usage

Following example shows how to get a single product.

```php
<?php

use Jeppos\ShopifyApiClient\SerializerFactory;
use Jeppos\ShopifyApiClient\Service\ProductService;

$guzzleClient = new \GuzzleHttp\Client([
    'base_uri' => 'https://your-store-name.myshopify.com/',
    'auth' => ['username', 'password'],
    'headers' => [
        'Content-Type' => 'application/json'
    ]
]);

$productService = new ProductService($guzzleClient, SerializerFactory::create());

$product = $productService->getOneById(123456789);

echo $product->getTitle();
```
