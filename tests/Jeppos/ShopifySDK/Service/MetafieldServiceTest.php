<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Enum\OwnerResource;
use Jeppos\ShopifySDK\Model\Metafield;
use Jeppos\ShopifySDK\Service\MetafieldService;

class MetafieldServiceTest extends AbstractServiceTest
{
    /**
     * @var MetafieldService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new MetafieldService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneMetafieldById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('metafields/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Metafield::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(Metafield::class, $actual);
    }

    public function testGetListOfMetafieldsByOwner()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('metafields.json', $response, [
            'metafield' => [
                'owner_resource' => 'custom_collection',
                'owner_id' => 111,
            ],
        ]);
        $this->expectResponseBeingDeserializedAsList($response, Metafield::class);

        $actual = $this->sut->getList(OwnerResource::get(OwnerResource::CUSTOM_COLLECTION), 111);

        $this->assertContainsOnlyInstancesOf(Metafield::class, $actual);
    }

    public function testGetMetafieldsCountByOwner()
    {
        $this->expectGetReturnsResponse('metafields/count.json', 56, [
            'metafield' => [
                'owner_resource' => 'custom_collection',
                'owner_id' => 111,
            ],
        ]);

        $actual = $this->sut->getCount(OwnerResource::get(OwnerResource::CUSTOM_COLLECTION), 111);

        $this->assertSame(56, $actual);
    }

    public function testCreateOneMetafield()
    {
        $metafield = (new Metafield())
            ->setOwnerId(456)
            ->setOwnerResource(OwnerResource::get(OwnerResource::CUSTOM_COLLECTION))
            ->setKey('my_key');

        $serializedMetafield = '{"metafield":{"key":"my_key"}}';

        $response = ['id' => 123, 'key' => 'my_key'];

        $this->expectModelBeingSerializedForPost('metafield', $metafield, $serializedMetafield);
        $this->expectPostReturnsResponse('metafields.json', $serializedMetafield, $response);
        $this->expectResponseBeingDeserialized($response, Metafield::class);

        $actual = $this->sut->createOne($metafield);

        $this->assertInstanceOf(Metafield::class, $actual);
    }

    public function testUpdateOneMetafield()
    {
        $metafield = (new Metafield())
            ->setId(123)
            ->setKey('modified_key');

        $serializedMetafield = '{"metafield":{"id":123,"title":"modified_key"}}';

        $response = ['id' => 123, 'key' => 'modified_key'];

        $this->expectModelBeingSerializedForPut('metafield', $metafield, $serializedMetafield);
        $this->expectPutReturnsResponse('metafields/123.json', $serializedMetafield, $response);
        $this->expectResponseBeingDeserialized($response, Metafield::class);

        $actual = $this->sut->updateOne($metafield);

        $this->assertInstanceOf(Metafield::class, $actual);
    }

    public function testDeleteOneMetafield()
    {
        $this->expectSuccessfulDeletion('metafields/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
