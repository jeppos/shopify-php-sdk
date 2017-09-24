<?php
/**
 * Created by PhpStorm.
 * User: patrik
 * Date: 2017-09-24
 * Time: 00:14
 */

namespace Tests\Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use Jeppos\ShopifyApiClient\Model\ProductImage;
use Jeppos\ShopifyApiClient\Service\ProductImageService;
use JMS\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductImageServiceTest
 * @package Tests\Jeppos\ShopifyApiClient\Service
 */
class ProductImageServiceTest extends TestCase
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
     * @var ProductImageService
     */
    private $sut;

    protected function setUp()
    {
        $this->clientMock = $this->createMock(ShopifyClient::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->sut = new ProductImageService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneProductImageById()
    {
        $variant = ['id' => 123];

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/123/images/987.json')
            ->willReturn($variant);

        $this->serializerMock
            ->expects($this->once())
            ->method('fromArray')
            ->with($variant, ProductImage::class)
            ->willReturn(new ProductImage());

        $actual = $this->sut->getOne(123, 987);

        $this->assertInstanceOf(ProductImage::class, $actual);
    }

    public function testGetListOfProductImages()
    {
        $image1 = [
            'id' => 123
        ];
        $image2 = [
            'id' => 456
        ];

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/123/images.json', [])
            ->willReturn([$image1, $image2]);

        $this->serializerMock
            ->expects($this->at(0))
            ->method('fromArray')
            ->with($image1, ProductImage::class)
            ->willReturn(new ProductImage());

        $this->serializerMock
            ->expects($this->at(1))
            ->method('fromArray')
            ->with($image2, ProductImage::class)
            ->willReturn(new ProductImage());

        $actual = $this->sut->getList(123);

        $this->assertContainsOnlyInstancesOf(ProductImage::class, $actual);
    }

    public function testGetProductImageCount()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('products/123/images/count.json', [])
            ->willReturn(56);

        $actual = $this->sut->getCount(123);

        $this->assertSame(56, $actual);
    }
}
