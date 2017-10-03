<?php

namespace Tests\Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use Jeppos\ShopifyApiClient\Model\ProductVariant;
use Jeppos\ShopifyApiClient\Service\ProductVariantService;
use JMS\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductVariantServiceTest
 * @package Tests\Jeppos\ShopifyApiClient\Service
 */
class ProductVariantServiceTest extends TestCase
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
     * @var ProductVariantService
     */
    private $sut;

    protected function setUp()
    {
        $this->clientMock = $this->createMock(ShopifyClient::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->sut = new ProductVariantService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneVariantById()
    {
        $variant = ['id' => 123];

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('variants/123.json')
            ->willReturn($variant);

        $this->serializerMock
            ->expects($this->once())
            ->method('fromArray')
            ->with($variant, ProductVariant::class)
            ->willReturn(new ProductVariant());

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(ProductVariant::class, $actual);
    }

    public function testGetListOfProductVariants()
    {
        $variant1 = [
            'id' => 123
        ];
        $variant2 = [
            'id' => 456
        ];

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/123/variants.json', [])
            ->willReturn([$variant1, $variant2]);

        $this->serializerMock
            ->expects($this->at(0))
            ->method('fromArray')
            ->with($variant1, ProductVariant::class)
            ->willReturn(new ProductVariant());

        $this->serializerMock
            ->expects($this->at(1))
            ->method('fromArray')
            ->with($variant2, ProductVariant::class)
            ->willReturn(new ProductVariant());

        $actual = $this->sut->getList(123);

        $this->assertContainsOnlyInstancesOf(ProductVariant::class, $actual);
    }

    public function testGetProductVariantCount()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/123/variants/count.json', [])
            ->willReturn(56);

        $actual = $this->sut->getCount(123);

        $this->assertSame(56, $actual);
    }
}
