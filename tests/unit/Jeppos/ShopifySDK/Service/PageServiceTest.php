<?php declare(strict_types=1);

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Page;
use Jeppos\ShopifySDK\Service\PageService;

/**
 * @property PageService $sut
 */
class PageServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return PageService::class;
    }

    public function testGetOnePageById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('pages/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Page::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfPages(): void
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('pages.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Page::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Page::class, $actual);
    }

    public function testGetPageCount(): void
    {
        $this->expectGetReturnsResponse('pages/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOnePage(): void
    {
        $page = (new Page())
            ->setTitle('test page');

        $serializedPage = '{"page":{"title":"test page"}}';

        $response = ['id' => 123, 'title' => 'test page'];

        $this->expectModelBeingSerializedForPost('page', $page, $serializedPage);
        $this->expectPostReturnsResponse('pages.json', $serializedPage, $response);
        $this->expectResponseBeingDeserialized($response, Page::class);

        $this->sut->createOne($page);
    }

    public function testUpdateOnePage(): void
    {
        $page = (new Page())
            ->setId(123)
            ->setTitle('modified page')
        ;

        $serializedPage = '{"page":{"id":123,"title":"modified page"}}';

        $response = ['id' => 123, 'title' => 'modified page'];

        $this->expectModelBeingSerializedForPut('page', $page, $serializedPage);
        $this->expectPutReturnsResponse('pages/123.json', $serializedPage, $response);
        $this->expectResponseBeingDeserialized($response, Page::class);

        $this->sut->updateOne($page);
    }

    public function testDeleteOnePage(): void
    {
        $this->expectSuccessfulDeletion('pages/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
