<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Page;
use Jeppos\ShopifySDK\Service\PageService;

class PageServiceTest extends AbstractServiceTest
{
    /**
     * @var PageService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new PageService($this->clientMock, $this->serializerMock);
    }

    public function testGetOnePageById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('pages/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Page::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(Page::class, $actual);
    }

    public function testGetListOfPages()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('pages.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Page::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Page::class, $actual);
    }

    public function testGetPageCount()
    {
        $this->expectGetReturnsResponse('pages/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOnePage()
    {
        $page = (new Page())
            ->setTitle('test page');

        $serializedPage = '{"page":{"title":"test page"}}';

        $response = ['id' => 123, 'title' => 'test page'];

        $this->expectModelBeingSerializedForPost('page', $page, $serializedPage);
        $this->expectPostReturnsResponse('pages.json', $serializedPage, $response);
        $this->expectResponseBeingDeserialized($response, Page::class);

        $actual = $this->sut->createOne($page);

        $this->assertInstanceOf(Page::class, $actual);
    }

    public function testUpdateOnePage()
    {
        $page = (new Page())
            ->setId(123)
            ->setTitle('modified page');

        $serializedPage = '{"page":{"id":123,"title":"modified page"}}';

        $response = ['id' => 123, 'title' => 'modified page'];

        $this->expectModelBeingSerializedForPut('page', $page, $serializedPage);
        $this->expectPutReturnsResponse('pages/123.json', $serializedPage, $response);
        $this->expectResponseBeingDeserialized($response, Page::class);

        $actual = $this->sut->updateOne($page);

        $this->assertInstanceOf(Page::class, $actual);
    }

    public function testDeleteOnePage()
    {
        $this->expectSuccessfulDeletion('pages/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
