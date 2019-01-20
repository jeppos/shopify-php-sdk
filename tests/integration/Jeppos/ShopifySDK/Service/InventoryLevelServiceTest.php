<?php declare(strict_types=1);

namespace Tests\Integration\Jeppos\ShopifySDK\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Jeppos\ShopifySDK\Enum\InventoryManagement;
use Jeppos\ShopifySDK\Model\InventoryLevel;
use Jeppos\ShopifySDK\Model\Product;
use Jeppos\ShopifySDK\Model\ProductVariant;

class InventoryLevelServiceTest extends AbstractServiceTest
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

        $product->setVariants(new ArrayCollection([
            (new ProductVariant())
                ->setInventoryManagement(InventoryManagement::get(InventoryManagement::SHOPIFY)),
        ]));
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
        $inventoryLevels = $this->shopifySDK->inventoryLevels->getList([
            'inventory_item_ids' => $this->inventoryItemId,
        ]);

        /** @var InventoryLevel $firstInventoryLevel */
        $firstInventoryLevel = array_shift($inventoryLevels);

        $this->assertSame(0, $firstInventoryLevel->getAvailable());
    }

    public function testSetAndResetAvailabilityOfInventoryItemAtLocation(): void
    {
        $inventoryLevel = new InventoryLevel();
        $inventoryLevel->setAvailable(42);
        $inventoryLevel->setLocationId(LocationServiceTest::DEFAULT_LOCATION_ID);
        $inventoryLevel->setInventoryItemId($this->inventoryItemId);

        $updatedInventoryLevel = $this->shopifySDK->inventoryLevels->setOne($inventoryLevel);

        $this->assertSame(42, $updatedInventoryLevel->getAvailable());

        $inventoryLevel->setAvailable(0);

        $updatedInventoryLevel = $this->shopifySDK->inventoryLevels->setOne($inventoryLevel);

        $this->assertSame(0, $updatedInventoryLevel->getAvailable());
    }

    public function testConnectAndDisconnectInventoryItemAndLocation(): void
    {
        $inventoryLevel = new InventoryLevel();
        $inventoryLevel->setLocationId(LocationServiceTest::SECONDARY_LOCATION_ID);
        $inventoryLevel->setInventoryItemId($this->inventoryItemId);

        $connectedInventoryLevel = $this->shopifySDK->inventoryLevels->connectOne($inventoryLevel);

        $this->assertSame(0, $connectedInventoryLevel->getAvailable());

        $this->shopifySDK->inventoryLevels->disconnectOne($inventoryLevel);

        $inventoryLevels = $this->shopifySDK->inventoryLevels->getList([
            'inventory_item_ids' => $this->inventoryItemId,
            'location_ids' => LocationServiceTest::SECONDARY_LOCATION_ID,
        ]);

        $this->assertCount(0, $inventoryLevels);
    }

    public function testAdjustAvailabilityOfInventoryItemAtLocation(): void
    {
        $inventoryLevel = new InventoryLevel();
        $inventoryLevel->setAvailableAdjustment(3);
        $inventoryLevel->setLocationId(LocationServiceTest::DEFAULT_LOCATION_ID);
        $inventoryLevel->setInventoryItemId($this->inventoryItemId);

        $adjustedInventoryLevel = $this->shopifySDK->inventoryLevels->adjustOne($inventoryLevel);

        $this->assertSame(3, $adjustedInventoryLevel->getAvailable());

        $inventoryLevel->setAvailableAdjustment(12);

        $adjustedInventoryLevel = $this->shopifySDK->inventoryLevels->adjustOne($inventoryLevel);

        $this->assertSame(15, $adjustedInventoryLevel->getAvailable());
    }
}
