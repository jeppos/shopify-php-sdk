<?php declare(strict_types=1);

namespace Tests\Integration\Jeppos\ShopifySDK\Service;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Faker\Factory as FakerFactory;
use Faker\Generator;
use Jeppos\ShopifySDK\ShopifySDK;
use PHPUnit\Framework\TestCase;

AnnotationRegistry::registerLoader('class_exists');

abstract class AbstractServiceTest extends TestCase
{
    /** @var ShopifySDK */
    protected $shopifySDK;

    /** @var Generator */
    protected $faker;

    protected function setUp()
    {
        $this->shopifySDK = new ShopifySDK();
        $this->shopifySDK
            ->setStoreUrl('php-sdk-test.myshopify.com')
            ->setUsername(getenv('SHOPIFY_API_KEY'))
            ->setPassword(getenv('SHOPIFY_PASS'))
        ;

        $this->faker = FakerFactory::create('sv_SE');
    }
}
