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

## Configure

Create a private app using the instructions found on [Shopify's own documentation](https://help.shopify.com/manual/apps/private-apps), to generate the required credentials.

```php
<?php

include __DIR__ . '/vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

$shopifySDK = new \Jeppos\ShopifySDK\ShopifySDK('your-store-name.myshopify.com', 'api-key', 'api-secret');
```

## Properties

The **ShopifySDK** class has the following properties,

* **products** - Returns an instance of [ProductService](../blob/master/src/Jeppos/ShopifySDK/Service/ProductService)
* **collects** -  Returns an instance of [CollectService](../blob/master/src/Jeppos/ShopifySDK/Service/CollectService)
* **customCollections** - Returns an instance of [CustomCollectionService](../blob/master/src/Jeppos/ShopifySDK/Service/CustomCollectionService)
* **productImages** - Returns an instance of [ProductImageService](../blob/master/src/Jeppos/ShopifySDK/Service/ProductImageService)
* **productVariants** - Returns an instance of [ProductVariantService](../blob/master/src/Jeppos/ShopifySDK/Service/ProductVariantService)

## Examples

### Fetch single product

```php
// Get a Product class
$product = $shopifySDK->products->getOne(123);

// Display the product title
echo $product->getTitle();
```

### Fetch a list of custom collections

```php
// Get an array of CustomCollection classes
$customCollections = $shopifySDK->customCollections->getList(); 

// Display the title of each custom collection on a new line
foreach ($customCollections as $customCollection) {
    echo $customCollection->getTitle() . PHP_EOL;
}
```

### Create a product

```php
$product = new Product();
$product->setTitle('My new product');

$shopifySDK->products->createOne($product);
```
