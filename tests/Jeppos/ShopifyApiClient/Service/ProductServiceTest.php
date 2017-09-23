<?php
/**
 * Created by PhpStorm.
 * User: patrik
 * Date: 2017-09-24
 * Time: 00:14
 */

namespace Tests\Jeppos\ShopifyApiClient\Service;

use Jeppos\ShopifyApiClient\Client\ShopifyClient;
use Jeppos\ShopifyApiClient\Model\Product;
use Jeppos\ShopifyApiClient\Service\ProductService;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductServiceTest
 * @package Tests\Jeppos\ShopifyApiClient\Service
 */
class ProductServiceTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ShopifyClient
     */
    private $clientMock;
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|SerializerInterface
     */
    private $serializerMock;
    /**
     * @var ProductService
     */
    private $sut;

    protected function setUp()
    {
        $this->clientMock = $this->createMock(ShopifyClient::class);
        $this->serializerMock = $this->createMock(SerializerInterface::class);
        $this->sut = new ProductService($this->clientMock, $this->serializerMock);
    }

    public function testGetOneProductById()
    {
        $json = '{"id":123}';

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with('product', 123)
            ->willReturn($json);

        $this->serializerMock
            ->expects($this->once())
            ->method('deserialize')
            ->with($json, Product::class, 'json')
            ->willReturn(new Product());

        $actual = $this->sut->getOneById(123);

        $this->assertInstanceOf(Product::class, $actual);
    }

    public function testGetListOfProducts()
    {
        $json = '{"id":123}';

        $this->clientMock
            ->expects($this->once())
            ->method('getList')
            ->with('product', null, [])
            ->willReturn([$json, $json]);

        $this->serializerMock
            ->expects($this->exactly(2))
            ->method('deserialize')
            ->with($json, Product::class, 'json')
            ->willReturn(new Product());

        $actual = $this->sut->getList();

        $this->assertContainsOnlyInstancesOf(Product::class, $actual);
    }

    public function testGetProductCount()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('getField')
            ->with('product', 'count', 'count', [])
            ->willReturn(56);

        $actual = $this->sut->getCount();

        $this->assertSame(56, $actual);
    }
}
