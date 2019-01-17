<?php

namespace Tests\Unit\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Redirect;
use Jeppos\ShopifySDK\Service\RedirectService;

/**
 * @property RedirectService $sut
 */
class RedirectServiceTest extends AbstractServiceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceClass(): string
    {
        return RedirectService::class;
    }

    public function testGetOneRedirectById(): void
    {
        $response = ['id' => 123];

        $this->expectGetReturnsResponse('redirects/123.json', $response);
        $this->expectResponseBeingDeserialized($response, Redirect::class);

        $this->sut->getOne(123);
    }

    public function testGetListOfRedirects(): void
    {
        $response = [
            ['id' => 123],
            ['id' => 456],
        ];

        $this->expectGetReturnsResponse('redirects.json', $response);
        $this->expectResponseBeingDeserializedAsList($response, Redirect::class);

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Redirect::class, $actual);
    }

    public function testGetRedirectCount(): void
    {
        $this->expectGetReturnsResponse('redirects/count.json', 56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }

    public function testCreateOneRedirect(): void
    {
        $redirect = (new Redirect())
            ->setPath('/old')
            ->setTarget('/new')
        ;

        $serializedRedirect = '{"redirect":{"path":"/old","target":"/new"}}';

        $response = ['id' => 123, 'path' => '/old', 'target' => '/new'];

        $this->expectModelBeingSerializedForPost('redirect', $redirect, $serializedRedirect);
        $this->expectPostReturnsResponse('redirects.json', $serializedRedirect, $response);
        $this->expectResponseBeingDeserialized($response, Redirect::class);

        $this->sut->createOne($redirect);
    }

    public function testUpdateOneRedirect(): void
    {
        $redirect = (new Redirect())
            ->setId(123)
            ->setPath('/old')
            ->setTarget('/new-new')
        ;

        $serializedRedirect = '{"redirect":{"id":123,"path":"/old","target":"/new-new"}}';

        $response = ['id' => 123, 'path' => '/old', 'target' => '/new-new'];

        $this->expectModelBeingSerializedForPut('redirect', $redirect, $serializedRedirect);
        $this->expectPutReturnsResponse('redirects/123.json', $serializedRedirect, $response);
        $this->expectResponseBeingDeserialized($response, Redirect::class);

        $this->sut->updateOne($redirect);
    }

    public function testDeleteOneRedirect(): void
    {
        $this->expectSuccessfulDeletion('redirects/123.json');

        $actual = $this->sut->deleteOne(123);

        $this->assertTrue($actual);
    }
}
