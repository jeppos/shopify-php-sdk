<?php declare(strict_types=1);

namespace Tests\Integration\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\InventoryItem;
use Jeppos\ShopifySDK\Model\Product;
use Jeppos\ShopifySDK\Model\ProductVariant;

class InventoryItemServiceTest extends AbstractServiceTest
{
    /** @var int */
    private $productId;
    /** @var int */
    private $inventoryItemId;

    protected function setUp()
    {
        parent::setUp();

        $product = new Product();
        $product->setTitle($this->faker->words(3, true));
        $createdProduct = $this->shopifySDK->products->createOne($product);

        $this->productId = $createdProduct->getId();

        $product = $this->shopifySDK->products->getOne($this->productId);
        /** @var ProductVariant $productVariant */
        $productVariant = $product->getVariants()->first();

        $this->inventoryItemId = $productVariant->getInventoryItemId();
    }

    protected function tearDown()
    {
        $this->shopifySDK->products->deleteOne($this->productId);
    }

    public function testDefaultValues(): void
    {
        $inventoryItems = $this->shopifySDK->inventoryItems->getList([
            'ids' => $this->inventoryItemId,
        ]);

        /** @var InventoryItem $firstInventoryItem */
        $firstInventoryItem = array_shift($inventoryItems);

        $this->assertSame($this->inventoryItemId, $firstInventoryItem->getId());
        $this->assertSame('', $firstInventoryItem->getSku());
        $this->assertNull($firstInventoryItem->getCost());
        $this->assertFalse($firstInventoryItem->isTracked());
    }

    public function testSetAndResetCostOfInventoryItem(): void
    {
        $cost = (string)$this->faker->randomFloat(1);

        $inventoryItem = $this->shopifySDK->inventoryItems->getOne($this->inventoryItemId);
        $inventoryItem->setCost($cost);

        $updatedInventoryItem = $this->shopifySDK->inventoryItems->updateOne($inventoryItem);

        $this->assertSame($cost . '0', $updatedInventoryItem->getCost());

        $inventoryItem = $this->shopifySDK->inventoryItems->getOne($this->inventoryItemId);
        $inventoryItem->setCost(null);

        $resetInventoryItem = $this->shopifySDK->inventoryItems->updateOne($inventoryItem);

        $this->assertNull($resetInventoryItem->getCost());
    }
}
