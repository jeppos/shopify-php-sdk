<?php declare(strict_types=1);

namespace Tests\Unit\Jeppos\ShopifySDK\Serializer;

use Jeppos\ShopifySDK\Serializer\ConfiguredSerializer;
use JMS\Serializer\Serializer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ConfiguredSerializerTest extends TestCase
{
    /**
     * @var MockObject|Serializer
     */
    private $serializerMock;

    /**
     * @var ConfiguredSerializer
     */
    private $sut;

    protected function setUp()
    {
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->sut = new ConfiguredSerializer($this->serializerMock);
    }

    public function testDeserialization(): void
    {
        $array = [
            'foo' => 'bar',
        ];

        $object = new class
        {
            protected $foo = 'bar';
        };

        $this->serializerMock
            ->expects($this->once())
            ->method('fromArray')
            ->with($array, 'Namespace\Class')
            ->willReturn($object)
        ;

        $actual = $this->sut->deserialize($array, 'Namespace\Class');

        $this->assertEquals($object, $actual);
    }

    public function testListDeserialization(): void
    {
        $listArray = [
            ['foo' => 'lorem'],
            ['foo' => 'ipsum'],
        ];

        $objects = [
            new class
            {
                protected $foo = 'lorem';
            },
            new class
            {
                protected $foo = 'ipsum';
            },
        ];

        $this->serializerMock
            ->expects($this->exactly(2))
            ->method('fromArray')
            ->withConsecutive([$listArray[0], 'Namespace\Class'], [$listArray[1], 'Namespace\Class'])
            ->willReturnOnConsecutiveCalls($objects[0], $objects[1])
        ;

        $actual = $this->sut->deserializeList($listArray, 'Namespace\Class');

        $this->assertEquals($objects, $actual);

    }

    public function testSerialization(): void
    {
        $object = new class
        {
            protected $field = 'value';
        };

        $json = '{"field":"value"}';

        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($object, 'json')
            ->willReturn($json)
        ;

        $actual = $this->sut->serialize($object, 'foo', ['bar']);

        $this->assertEquals('{"foo":' . $json . '}', $actual);
    }

    public function testSerializationWithoutKey(): void
    {
        $object = new class
        {
            protected $field = 'value';
        };

        $json = '{"field":"value"}';

        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($object, 'json')
            ->willReturn($json)
        ;

        $actual = $this->sut->serialize($object, null, ['bar']);

        $this->assertEquals($json, $actual);
    }
}
