<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Collect;
use Jeppos\ShopifySDK\Service\CollectService;

class CollectServiceTest extends AbstractServiceTest
{
    /**
     * @var CollectService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new CollectService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneCollectById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('collects/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Collect::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(Collect::class, $actual);
    }

    public function testGetListOfCollects()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('collects.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Collect::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Collect::class, $actual);
    }

    public function testGetCollectCount()
    {
        $this->expectGetReturnsResponse('collects/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneCollect()
    {
        $collect = (new Collect())
            ->setProductId(123)
            ->setCollectionId(456);

        $serializedCollect = '{"collect":{"product_id":123,"collection_id":456}}';

        $response = ['id' => 123, 'product_id' => 123, 'collection_id' => 456];

        $this->expectModelBeingSerializedForPost('collect', $collect, $serializedCollect);
        $this->expectPostReturnsResponse('collects.json', $serializedCollect, $response);
        $this->expectResponseBeingDeserialized($response, Collect::class);

        $actual = $this->sut->createOne($collect);

        $this->assertInstanceOf(Collect::class, $actual);
    }

    public function testDeleteOneCollect()
    {
        $this->expectSuccessfulDeletion('collects/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
