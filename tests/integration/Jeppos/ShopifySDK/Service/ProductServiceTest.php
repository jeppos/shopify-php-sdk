<?php declare(strict_types=1);

namespace Tests\Integration\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Enum\InventoryPolicy;
use Jeppos\ShopifySDK\Enum\PublishedScope;
use Jeppos\ShopifySDK\Enum\WeightUnit;
use Jeppos\ShopifySDK\Model\Product;
use Jeppos\ShopifySDK\Model\ProductOption;
use Jeppos\ShopifySDK\Model\ProductVariant;

class ProductServiceTest extends AbstractServiceTest
{
    /** @var int */
    private $productId;

    protected function setUp()
    {
        parent::setUp();

        $product = new Product();
        $product->setTitle($this->faker->words(3, true));
        $createdProduct = $this->shopifySDK->products->createOne($product);

        $this->productId = $createdProduct->getId();
    }

    protected function tearDown()
    {
        $this->shopifySDK->products->deleteOne($this->productId);
    }

    public function testDefaultValues(): void
    {
        $product = $this->shopifySDK->products->getOne($this->productId);

        $this->assertNull($product->getBodyHtml());
        $this->assertSame('php-sdk-test', $product->getVendor());
        $this->assertSame('', $product->getProductType());
        $this->assertNull($product->getTemplateSuffix());
        $this->assertSame('', $product->getTags());
        $this->assertSame(PublishedScope::get(PublishedScope::WEB), $product->getPublishedScope());
        $this->assertCount(0, $product->getImages());
        $this->assertNull($product->getImage());

        /** @var ProductOption $option */
        $option = $product->getOptions()->first();
        $this->assertSame('Title', $option->getName());
        $this->assertSame(1, $option->getPosition());

        /** @var string $value */
        $value = $option->getValues()->first();
        $this->assertSame('Default Title', $value);

        /** @var ProductVariant $variant */
        $variant = $product->getVariants()->first();
        $this->assertSame('Default Title', $variant->getTitle());
        $this->assertSame(0.0, $variant->getPrice());
        $this->assertSame('', $variant->getSku());
        $this->assertSame(1, $variant->getPosition());
        $this->assertSame(0, $variant->getGrams());
        $this->assertSame(InventoryPolicy::get(InventoryPolicy::DENY), $variant->getInventoryPolicy());
        $this->assertNull($variant->getCompareAtPrice());
        $this->assertSame('manual', $variant->getFulfillmentService());
        $this->assertNull($variant->getInventoryManagement());
        $this->assertSame('Default Title', $variant->getOption1());
        $this->assertNull($variant->getOption2());
        $this->assertNull($variant->getOption3());
        $this->assertTrue($variant->isTaxable());
        $this->assertNull($variant->getBarcode());
        $this->assertNull($variant->getImageId());
        $this->assertSame(0.0, $variant->getWeight());
        $this->assertSame(WeightUnit::get(WeightUnit::KG), $variant->getWeightUnit());
        $this->assertTrue($variant->isRequiresShipping());
    }
}
