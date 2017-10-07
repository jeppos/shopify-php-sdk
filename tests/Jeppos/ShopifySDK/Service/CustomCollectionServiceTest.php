<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\CustomCollection;
use Jeppos\ShopifySDK\Service\CustomCollectionService;

class CustomCollectionServiceTest extends AbstractServiceTest
{
    /**
     * @var CustomCollectionService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new CustomCollectionService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneCustomCollectionById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('custom_collections/123.json', $response);
        $this->expectResponseBeingDeserialized($response, CustomCollection::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(CustomCollection::class, $actual);
    }

    public function testGetListOfCustomCollections()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
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

    public function testCreateOneCustomCollection()
    {
        $customCollection = (new CustomCollection())
            ->setTitle('test custom collection');

        $serializedCustomCollection = '{"custom_collection":{"title":"test custom collection"}}';

        $response = ['id' => 123, 'title' => 'test custom collection'];

        $this->expectModelBeingSerializedForPost('custom_collection', $customCollection, $serializedCustomCollection);
        $this->expectPostReturnsResponse('custom_collections.json', $serializedCustomCollection, $response);
        $this->expectResponseBeingDeserialized($response, CustomCollection::class);

        $actual = $this->sut->createOne($customCollection);

        $this->assertInstanceOf(CustomCollection::class, $actual);
    }

    public function testUpdateOneCustomCollection()
    {
        $customCollection = (new CustomCollection())
            ->setId(123)
            ->setTitle('modified custom collection');

        $serializedCustomCollection = '{"product":{"id":123,"title":"modified custom collection"}}';

        $response = ['id' => 123, 'title' => 'modified custom collection'];

        $this->expectModelBeingSerializedForPut('custom_collection', $customCollection, $serializedCustomCollection);
        $this->expectPutReturnsResponse('custom_collections/123.json', $serializedCustomCollection, $response);
        $this->expectResponseBeingDeserialized($response, CustomCollection::class);

        $actual = $this->sut->updateOne($customCollection);

        $this->assertInstanceOf(CustomCollection::class, $actual);
    }

    public function testDeleteOneCustomCollection()
    {
        $this->expectSuccessfulDeletion('custom_collections/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
