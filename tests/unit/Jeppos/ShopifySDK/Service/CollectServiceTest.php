<?php declare(strict_types=1);

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Collect;
use Jeppos\ShopifySDK\Service\CollectService;

/**
 * @property CollectService $sut
 */
class CollectServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return CollectService::class;
    }

    public function testGetOneCollectById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('collects/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Collect::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfCollects(): void
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('collects.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Collect::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Collect::class, $actual);
    }

    public function testGetCollectCount(): void
    {
        $this->expectGetReturnsResponse('collects/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneCollect(): void
    {
        $collect = (new Collect())
            ->setProductId(123)
            ->setCollectionId(456)
        ;

        $serializedCollect = '{"collect":{"product_id":123,"collection_id":456}}';

        $response = ['id' => 123, 'product_id' => 123, 'collection_id' => 456];

        $this->expectModelBeingSerializedForPost('collect', $collect, $serializedCollect);
        $this->expectPostReturnsResponse('collects.json', $serializedCollect, $response);
        $this->expectResponseBeingDeserialized($response, Collect::class);

        $this->sut->createOne($collect);
    }

    public function testDeleteOneCollect(): void
    {
        $this->expectSuccessfulDeletion('collects/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
