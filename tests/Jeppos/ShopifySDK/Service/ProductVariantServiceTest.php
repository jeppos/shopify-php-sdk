<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\ProductVariant;
use Jeppos\ShopifySDK\Service\ProductVariantService;

class ProductVariantServiceTest extends AbstractServiceTest
{
    /**
     * @var ProductVariantService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new ProductVariantService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneVariantById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('variants/123.json', $response);
        $this->expectResponseBeingDeserialized($response, ProductVariant::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(ProductVariant::class, $actual);
    }

    public function testGetListOfProductVariants()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('products/123/variants.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, ProductVariant::class);

        $actual = $this->sut->getList(123);

        $this->assertContainsOnlyInstancesOf(ProductVariant::class, $actual);
    }

    public function testGetProductVariantCount()
    {
        $this->expectGetReturnsResponse('products/123/variants/count.json', 56);

        $actual = $this->sut->getCount(123);

        $this->assertSame(56, $actual);
    }

    public function testCreateOneProductVariant()
    {
        $productVariant = (new ProductVariant())
            ->setProductId(456)
            ->setTitle('test variant');

        $serializedProductVariant = '{"variant":{"src":"http://via.placeholder.com/350x150"}}';

        $response = ['id' => 123, 'src' => 'http://via.placeholder.com/350x150'];

        $this->expectModelBeingSerializedForPost('variant', $productVariant, $serializedProductVariant);
        $this->expectPostReturnsResponse('products/456/variants.json', $serializedProductVariant, $response);
        $this->expectResponseBeingDeserialized($response, ProductVariant::class);

        $actual = $this->sut->createOne($productVariant);

        $this->assertInstanceOf(ProductVariant::class, $actual);
    }

    public function testUpdateOneProductVariant()
    {
        $productVariant = (new ProductVariant())
            ->setId(123)
            ->setTitle('modified variant');

        $serializedProductVariant = '{"variant":{"id":123,"title":"modified variant"}}';

        $response = ['id' => 123, 'title' => 'modified variant'];

        $this->expectModelBeingSerializedForPut('variant', $productVariant, $serializedProductVariant);
        $this->expectPutReturnsResponse('variants/123.json', $serializedProductVariant, $response);
        $this->expectResponseBeingDeserialized($response, ProductVariant::class);

        $actual = $this->sut->updateOne($productVariant);

        $this->assertInstanceOf(ProductVariant::class, $actual);
    }

    public function testDeleteOneProductVariant()
    {
        $this->expectSuccessfulDeletion('products/456/variants/123.json');

        $actual = $this->sut->deleteOne(456, 123);

        $this->assertTrue($actual);
    }
}
