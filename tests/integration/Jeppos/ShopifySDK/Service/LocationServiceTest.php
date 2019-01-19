<?php

namespace Tests\Integration\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Model\Location;

class LocationServiceTest extends AbstractServiceTest
{
    public function testGetListOfLocations(): void
    {
        $locations = $this->shopifySDK->locations->getList();

        $firstLocation = array_shift($locations);
        $this->assertDefaultLocation($firstLocation);
    }

    public function testGetOneLocation(): void
    {
        $location = $this->shopifySDK->locations->getOne(16406315075);

        $this->assertDefaultLocation($location);
    }

    public function testGetLocationCount(): void
    {
        $locationCount = $this->shopifySDK->locations->getCount();

        $this->assertSame(1, $locationCount);
    }

    /**
     * @param Location $location
     */
    private function assertDefaultLocation(Location $location): void
    {
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
}
