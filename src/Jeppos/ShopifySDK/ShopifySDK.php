<?php

namespace Jeppos\ShopifySDK;

use GuzzleHttp\Client as GuzzleClient;
use Jeppos\ShopifySDK\Client\ShopifyClient;
use Jeppos\ShopifySDK\Serializer\ConfiguredSerializer;
use Jeppos\ShopifySDK\Service\{
    AbstractService, CollectService, CustomCollectionService, CustomCollectionMetafieldService, MetafieldService, ProductImageMetafieldService, ProductImageService, ProductMetafieldService, ProductService, ProductVariantService, RedirectService
};

/**
 * @property ProductService $products
 * @property ProductImageService $productImages
 * @property CollectService $collects
 * @property ProductVariantService $productVariants
 * @property CustomCollectionService $customCollections
 * @property MetafieldService $metafields
 * @property RedirectService $redirects
 */
class ShopifySDK
{
    /**
     * @var string
     */
    private $storeUrl;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;

    /**
     * ShopifySDK constructor.
     * @param string $storeUrl
     * @param string $username
     * @param string $password
     */
    public function __construct(string $storeUrl, string $username, string $password)
    {
        $this->storeUrl = $storeUrl;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param string $name
     * @return AbstractService
     */
    public function __get($name)
    {
        $serviceClass = __NAMESPACE__ . '\\Service\\' . ucfirst(substr($name, 0, -1)) . 'Service';

        if (class_exists($serviceClass)) {
            return new $serviceClass($this->createClient(), new ConfiguredSerializer());
        }

        throw new \InvalidArgumentException(sprintf('Class "%s" does not exists.', $serviceClass));
    }

    /**
     * @return ShopifyClient
     */
    public function createClient()
    {
        $guzzleClient = new GuzzleClient([
            'base_uri' => 'https://' . $this->storeUrl . '/',
            'auth' => [$this->username, $this->password],
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        return new ShopifyClient($guzzleClient);
    }
}
