<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\ProductImage;
use Jeppos\ShopifySDK\Service\ProductImageService;

class ProductImageServiceTest extends AbstractServiceTest
{
    /**
     * @var ProductImageService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new ProductImageService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneProductImageById()
    {
        $response = ['id' => 123, 'src' => 'http://via.placeholder.com/350x150'];

        $this->expectGetReturnsResponse('products/123/images/987.json', $response);
        $this->expectResponseBeingDeserialized($response, ProductImage::class);

        $actual = $this->sut->getOne(123, 987);

        $this->assertInstanceOf(ProductImage::class, $actual);
    }

    public function testGetListOfProductImages()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('products/123/images.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, ProductImage::class);

        $actual = $this->sut->getList(123);

        $this->assertContainsOnlyInstancesOf(ProductImage::class, $actual);
    }

    public function testGetProductImageCount()
    {
        $this->expectGetReturnsResponse('products/123/images/count.json', 56);

        $actual = $this->sut->getCount(123);

        $this->assertSame(56, $actual);
    }

    public function testCreateOneProductImage()
    {
        $productImage = (new ProductImage())
            ->setProductId(456)
            ->setSrc('http://via.placeholder.com/350x50');

        $serializedProductImage = '{"image":{"src":"http://via.placeholder.com/350x150"}}';

        $response = ['id' => 123, 'src' => 'http://via.placeholder.com/350x150'];

        $this->expectModelBeingSerializedForPost('image', $productImage, $serializedProductImage);
        $this->expectPostReturnsResponse('products/456/images.json', $serializedProductImage, $response);
        $this->expectResponseBeingDeserialized($response, ProductImage::class);

        $actual = $this->sut->createOne($productImage);

        $this->assertInstanceOf(ProductImage::class, $actual);
    }

    public function testUpdateOneProductImage()
    {
        $productImage = (new ProductImage())
            ->setId(123)
            ->setProductId(456)
            ->setSrc('http://via.placeholder.com/350x350');

        $serializedProductImage = '{"image":{"id":123,"src":"http://via.placeholder.com/350x350"}}';

        $response = ['id' => 123, 'src' => 'http://via.placeholder.com/350x350'];

        $this->expectModelBeingSerializedForPut('image', $productImage, $serializedProductImage);
        $this->expectPutReturnsResponse('products/456/images/123.json', $serializedProductImage, $response);
        $this->expectResponseBeingDeserialized($response, ProductImage::class);

        $actual = $this->sut->updateOne($productImage);

        $this->assertInstanceOf(ProductImage::class, $actual);
    }

    public function testDeleteOneProductImage()
    {
        $this->expectSuccessfulDeletion('products/456/images/123.json');

        $actual = $this->sut->deleteOne(456, 123);

        $this->assertTrue($actual);
    }
}
