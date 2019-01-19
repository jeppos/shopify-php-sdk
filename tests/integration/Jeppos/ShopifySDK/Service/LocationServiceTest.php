<?php declare(strict_types=1);

namespace Tests\Integration\Jeppos\ShopifySDK\Service;

class LocationServiceTest extends AbstractServiceTest
{
    public function testDefaultValues(): void
    {
        $location = $this->shopifySDK->locations->getOne(16406315075);

        $this->assertSame('Jeppos AB', $location->getName());
        $this->assertSame('Box 259', $location->getAddress1());
        $this->assertSame('', $location->getAddress2());
        $this->assertSame('Malmö', $location->getCity());
        $this->assertSame('20122', $location->getZip());
        $this->assertSame('SE', $location->getCountryCode());
        $this->assertSame('SE', $location->getCountry());
        $this->assertSame('Sweden', $location->getCountryName());
        $this->assertSame('', $location->getPhone());
        $this->assertSame('', $location->getProvince());
        $this->assertNull($location->getProvinceCode());
        $this->assertTrue($location->isActive());
        $this->assertFalse($location->isLegacy());
    }

    public function testCount(): void
    {
        $locationCount = $this->shopifySDK->locations->getCount();

        $this->assertSame(1, $locationCount);
    }
}
