<?php

namespace Jeppos\ShopifySDK;

use GuzzleHttp\Client as GuzzleClient;
use Jeppos\ShopifySDK\Client\ShopifyClient;
use Jeppos\ShopifySDK\Serializer\ConfiguredSerializer;
use Jeppos\ShopifySDK\Service\{
    AbstractService, CollectService, CustomCollectionService, CustomerAddressService, CustomerService, MetafieldService,
    PageService, ProductImageService, ProductService, ProductVariantService, RedirectService
};

/**
 * @property ProductService $products
 * @property ProductImageService $productImages
 * @property CollectService $collects
 * @property ProductVariantService $productVariants
 * @property CustomCollectionService $customCollections
 * @property MetafieldService $metafields
 * @property RedirectService $redirects
 * @property PageService $pages
 * @property CustomerService $customers
 * @property CustomerAddressService $customerAddresses
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
     * @var string
     */
    private $accessToken;

    /**
     * @param string $storeUrl
     * @return ShopifySDK
     */
    public function setStoreUrl(string $storeUrl): ShopifySDK
    {
        $this->storeUrl = $storeUrl;
        return $this;
    }

    /**
     * @param string $username
     * @return ShopifySDK
     */
    public function setUsername(string $username): ShopifySDK
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     * @return ShopifySDK
     */
    public function setPassword(string $password): ShopifySDK
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $accessToken
     * @return ShopifySDK
     */
    public function setAccessToken(string $accessToken): ShopifySDK
    {
        $this->accessToken = $accessToken;
        return $this;
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
        if (!$this->isPrivateApplication() && !$this->isOAuthApplication()) {
            throw new \InvalidArgumentException('Username and password needs to be set or an access token.');
        }

        $config = [
            'base_uri' => 'https://' . $this->storeUrl . '/',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ];

        if ($this->isPrivateApplication()) {
            $config['auth'] = [$this->username, $this->password];
        }

        if ($this->isOAuthApplication()) {
            $config['headers']['X-Shopify-Access-Token'] = $this->accessToken;
        }

        $guzzleClient = new GuzzleClient($config);

        return new ShopifyClient($guzzleClient);
    }

    /**
     * @return bool
     */
    private function isPrivateApplication(): bool
    {
        return $this->username !== null && $this->password !== null;
    }

    /**
     * @return bool
     */
    private function isOAuthApplication(): bool
    {
        return $this->accessToken !== null;
    }
}
