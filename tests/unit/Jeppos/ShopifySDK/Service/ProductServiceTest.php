<?php

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Product;
use Jeppos\ShopifySDK\Service\ProductService;

/**
 * @property ProductService $sut
 */
class ProductServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return ProductService::class;
    }

    public function testGetOneProductById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('products/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Product::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfProducts(): void
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('products.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Product::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Product::class, $actual);
    }

    public function testGetProductCount(): void
    {
        $this->expectGetReturnsResponse('products/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneProduct(): void
    {
        $product = (new Product())
            ->setTitle('test product');

        $serializedProduct = '{"product":{"title":"test product"}}';

        $response = ['id' => 123, 'title' => 'test product'];

        $this->expectModelBeingSerializedForPost('product', $product, $serializedProduct);
        $this->expectPostReturnsResponse('products.json', $serializedProduct, $response);
        $this->expectResponseBeingDeserialized($response, Product::class);

        $this->sut->createOne($product);
    }

    public function testUpdateOneProduct(): void
    {
        $product = (new Product())
            ->setId(123)
            ->setTitle('modified product')
        ;

        $serializedProduct = '{"product":{"id":123,"title":"modified product"}}';

        $response = ['id' => 123, 'title' => 'modified product'];

        $this->expectModelBeingSerializedForPut('product', $product, $serializedProduct);
        $this->expectPutReturnsResponse('products/123.json', $serializedProduct, $response);
        $this->expectResponseBeingDeserialized($response, Product::class);

        $this->sut->updateOne($product);
    }

    public function testDeleteOneProduct(): void
    {
        $this->expectSuccessfulDeletion('products/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
