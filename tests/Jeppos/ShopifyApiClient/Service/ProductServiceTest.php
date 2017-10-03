<?php

namespace Tests\Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use Jeppos\ShopifyApiClient\Model\Product;
use Jeppos\ShopifyApiClient\Service\ProductService;
use JMS\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductServiceTest
 * @package Tests\Jeppos\ShopifyApiClient\Service
 */
class ProductServiceTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ShopifyClient
     */
    private $clientMock;
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Serializer
     */
    private $serializerMock;
    /**
     * @var ProductService
     */
    private $sut;

    protected function setUp()
    {
        $this->clientMock = $this->createMock(ShopifyClient::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->sut = new ProductService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneProductById()
    {
        $product = ['id' => 123];

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/123.json')
            ->willReturn($product);

        $this->serializerMock
            ->expects($this->once())
            ->method('fromArray')
            ->with($product, Product::class)
            ->willReturn(new Product());

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(Product::class, $actual);
    }

    public function testGetListOfProducts()
    {
        $product1 = [
            'id' => 123
        ];
        $product2 = [
            'id' => 456
        ];

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products.json', [])
            ->willReturn([$product1, $product2]);

        $this->serializerMock
            ->expects($this->at(0))
            ->method('fromArray')
            ->with($product1, Product::class)
            ->willReturn(new Product());

        $this->serializerMock
            ->expects($this->at(1))
            ->method('fromArray')
            ->with($product2, Product::class)
            ->willReturn(new Product());

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Product::class, $actual);
    }

    public function testGetProductCount()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/count.json', [])
            ->willReturn(56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOne()
    {
        $newProduct = (new Product())
            ->setTitle('test product');

        $createdProduct = ['id' => 123, 'title' => 'test product'];
        $serializedProduct = '{"title":"test product"}';

        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($newProduct)
            ->willReturn($serializedProduct);

        $this->clientMock
            ->expects($this->once())
            ->method('post')
            ->with('products.json', '{"product":' . $serializedProduct . '}')
            ->willReturn($createdProduct);

        $this->serializerMock
            ->expects($this->once())
            ->method('fromArray')
            ->with($createdProduct, Product::class)
            ->willReturn(new Product());

        $actual = $this->sut->createOne($newProduct);

        $this->assertInstanceOf(Product::class, $actual);
    }
}
