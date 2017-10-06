<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Product;
use Jeppos\ShopifySDK\Service\ProductService;

class ProductServiceTest extends AbstractServiceTest
{
    /**
     * @var ProductService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new ProductService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneProductById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('products/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Product::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(Product::class, $actual);
    }

    public function testGetListOfProducts()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('products.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Product::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Product::class, $actual);
    }

    public function testGetProductCount()
    {
        $this->expectGetReturnsResponse('products/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneProduct()
    {
        $product = (new Product())
            ->setTitle('test product');

        $serializedProduct = '{"product":{"title":"test product"}}';

        $response = ['id' => 123, 'title' => 'test product'];

        $this->expectModelBeingSerializedForPost('product', $product, $serializedProduct);
        $this->expectPostReturnsResponse('products.json', $serializedProduct, $response);
        $this->expectResponseBeingDeserialized($response, Product::class);

        $actual = $this->sut->createOne($product);

        $this->assertInstanceOf(Product::class, $actual);
    }

    public function testUpdateOneProduct()
    {
        $product = (new Product())
            ->setId(123)
            ->setTitle('modified product');

        $serializedProduct = '{"product":{"id":123,"title":"modified product"}}';

        $response = ['id' => 123, 'title' => 'modified product'];

        $this->expectModelBeingSerializedForPut('product', $product, $serializedProduct);
        $this->expectPutReturnsResponse('products/123.json', $serializedProduct, $response);
        $this->expectResponseBeingDeserialized($response, Product::class);

        $actual = $this->sut->updateOne($product);

        $this->assertInstanceOf(Product::class, $actual);
    }

    public function testDeleteOneProduct()
    {
        $this->expectSuccessfulDeletion('products/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
