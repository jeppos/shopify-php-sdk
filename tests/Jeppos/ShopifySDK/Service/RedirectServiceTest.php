<?php

namespace Tests\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Redirect;
use Jeppos\ShopifySDK\Service\RedirectService;

class RedirectServiceTest extends AbstractServiceTest
{
    /**
     * @var RedirectService
     */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new RedirectService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneRedirectById()
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('redirects/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Redirect::class);

        $actual = $this->sut->getOne(123);

        $this->assertInstanceOf(Redirect::class, $actual);
    }

    public function testGetListOfRedirects()
    {
        $response = [
            ['id' => 123],
            ['id' => 456]
        ];

        $this->expectGetReturnsResponse('redirects.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Redirect::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Redirect::class, $actual);
    }

    public function testGetRedirectCount()
    {
        $this->expectGetReturnsResponse('redirects/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneRedirect()
    {
        $redirect = (new Redirect())
            ->setPath('/old')
            ->setTarget('/new');

        $serializedRedirect = '{"redirect":{"path":"/old","target":"/new"}}';

        $response = ['id' => 123, 'path' => '/old', 'target' => '/new'];

        $this->expectModelBeingSerializedForPost('redirect', $redirect, $serializedRedirect);
        $this->expectPostReturnsResponse('redirects.json', $serializedRedirect, $response);
        $this->expectResponseBeingDeserialized($response, Redirect::class);

        $actual = $this->sut->createOne($redirect);

        $this->assertInstanceOf(Redirect::class, $actual);
    }

    public function testUpdateOneRedirect()
    {
        $redirect = (new Redirect())
            ->setId(123)
            ->setPath('/old')
            ->setTarget('/new-new');

        $serializedRedirect = '{"redirect":{"id":123,"path":"/old","target":"/new-new"}}';

        $response = ['id' => 123, 'path' => '/old', 'target' => '/new-new'];

        $this->expectModelBeingSerializedForPut('redirect', $redirect, $serializedRedirect);
        $this->expectPutReturnsResponse('redirects/123.json', $serializedRedirect, $response);
        $this->expectResponseBeingDeserialized($response, Redirect::class);

        $actual = $this->sut->updateOne($redirect);

        $this->assertInstanceOf(Redirect::class, $actual);
    }

    public function testDeleteOneRedirect()
    {
        $this->expectSuccessfulDeletion('redirects/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
