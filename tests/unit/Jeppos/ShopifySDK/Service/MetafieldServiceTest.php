<?php

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Enum\OwnerResource;
use Jeppos\ShopifySDK\Model\Metafield;
use Jeppos\ShopifySDK\Service\MetafieldService;

/**
 * @property MetafieldService $sut
 */
class MetafieldServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return MetafieldService::class;
    }

    public function testGetOneMetafieldById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('metafields/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Metafield::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfMetafieldsByOwner(): void
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('metafields.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Metafield::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Metafield::class, $actual);
    }

    public function testGetMetafieldsCountByOwner(): void
    {
        $this->expectGetReturnsResponse('metafields/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneMetafield(): void
    {
        $metafield = (new Metafield())
            ->setOwnerId(456)
            ->setOwnerResource(OwnerResource::get(OwnerResource::CUSTOM_COLLECTION))
            ->setKey('my_key')
        ;

        $serializedMetafield = '{"metafield":{"key":"my_key"}}';

        $response = ['id' => 123, 'key' => 'my_key'];

        $this->expectModelBeingSerializedForPost('metafield', $metafield, $serializedMetafield);
        $this->expectPostReturnsResponse('metafields.json', $serializedMetafield, $response);
        $this->expectResponseBeingDeserialized($response, Metafield::class);

        $this->sut->createOne($metafield);
    }

    public function testUpdateOneMetafield(): void
    {
        $metafield = (new Metafield())
            ->setId(123)
            ->setKey('modified_key')
        ;

        $serializedMetafield = '{"metafield":{"id":123,"title":"modified_key"}}';

        $response = ['id' => 123, 'key' => 'modified_key'];

        $this->expectModelBeingSerializedForPut('metafield', $metafield, $serializedMetafield);
        $this->expectPutReturnsResponse('metafields/123.json', $serializedMetafield, $response);
        $this->expectResponseBeingDeserialized($response, Metafield::class);

        $this->sut->updateOne($metafield);
    }

    public function testDeleteOneMetafield(): void
    {
        $this->expectSuccessfulDeletion('metafields/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
