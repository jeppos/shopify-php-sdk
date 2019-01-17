<?php

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\CustomCollection;
use Jeppos\ShopifySDK\Service\CustomCollectionService;

/**
 * @property CustomCollectionService $sut
 */
class CustomCollectionServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return CustomCollectionService::class;
    }

    public function testGetOneCustomCollectionById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('custom_collections/123.json', $response);
        $this->expectResponseBeingDeserialized($response, CustomCollection::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfCustomCollections()
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('custom_collections.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, CustomCollection::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(CustomCollection::class, $actual);
    }

    public function testGetCustomCollectionCount()
    {
        $this->expectGetReturnsResponse('custom_collections/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneCustomCollection(): void
    {
        $customCollection = (new CustomCollection())
            ->setTitle('test custom collection');

        $serializedCustomCollection = '{"custom_collection":{"title":"test custom collection"}}';

        $response = ['id' => 123, 'title' => 'test custom collection'];

        $this->expectModelBeingSerializedForPost('custom_collection', $customCollection, $serializedCustomCollection);
        $this->expectPostReturnsResponse('custom_collections.json', $serializedCustomCollection, $response);
        $this->expectResponseBeingDeserialized($response, CustomCollection::class);

        $this->sut->createOne($customCollection);
    }

    public function testUpdateOneCustomCollection(): void
    {
        $customCollection = (new CustomCollection())
            ->setId(123)
            ->setTitle('modified custom collection')
        ;

        $serializedCustomCollection = '{"product":{"id":123,"title":"modified custom collection"}}';

        $response = ['id' => 123, 'title' => 'modified custom collection'];

        $this->expectModelBeingSerializedForPut('custom_collection', $customCollection, $serializedCustomCollection);
        $this->expectPutReturnsResponse('custom_collections/123.json', $serializedCustomCollection, $response);
        $this->expectResponseBeingDeserialized($response, CustomCollection::class);

        $this->sut->updateOne($customCollection);
    }

    public function testDeleteOneCustomCollection(): void
    {
        $this->expectSuccessfulDeletion('custom_collections/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
