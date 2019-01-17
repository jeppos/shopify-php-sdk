<?php

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\ProductVariant;
use Jeppos\ShopifySDK\Service\ProductVariantService;

/**
 * @property ProductVariantService $sut
 */
class ProductVariantServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return ProductVariantService::class;
    }

    public function testGetOneProductVariantById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('variants/123.json', $response);
        $this->expectResponseBeingDeserialized($response, ProductVariant::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfProductVariants(): void
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('products/123/variants.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, ProductVariant::class);

        $actual = $this->sut->getList(123);

        $this->assertContainsOnlyInstancesOf(ProductVariant::class, $actual);
    }

    public function testGetProductVariantCount(): void
    {
        $this->expectGetReturnsResponse('products/123/variants/count.json', 56);

        $actual = $this->sut->getCount(123);

        $this->assertSame(56, $actual);
    }

    public function testCreateOneProductVariant(): void
    {
        $productVariant = (new ProductVariant())
            ->setProductId(456)
            ->setTitle('test variant')
        ;

        $serializedProductVariant = '{"variant":{"src":"http://via.placeholder.com/350x150"}}';

        $response = ['id' => 123, 'src' => 'http://via.placeholder.com/350x150'];

        $this->expectModelBeingSerializedForPost('variant', $productVariant, $serializedProductVariant);
        $this->expectPostReturnsResponse('products/456/variants.json', $serializedProductVariant, $response);
        $this->expectResponseBeingDeserialized($response, ProductVariant::class);

        $this->sut->createOne($productVariant);
    }

    public function testUpdateOneProductVariant(): void
    {
        $productVariant = (new ProductVariant())
            ->setId(123)
            ->setTitle('modified variant')
        ;

        $serializedProductVariant = '{"variant":{"id":123,"title":"modified variant"}}';

        $response = ['id' => 123, 'title' => 'modified variant'];

        $this->expectModelBeingSerializedForPut('variant', $productVariant, $serializedProductVariant);
        $this->expectPutReturnsResponse('variants/123.json', $serializedProductVariant, $response);
        $this->expectResponseBeingDeserialized($response, ProductVariant::class);

        $this->sut->updateOne($productVariant);
    }

    public function testDeleteOneProductVariant(): void
    {
        $this->expectSuccessfulDeletion('products/456/variants/123.json');

        $actual = $this->sut->deleteOne(456, 123);

        $this->assertTrue($actual);
    }
}
