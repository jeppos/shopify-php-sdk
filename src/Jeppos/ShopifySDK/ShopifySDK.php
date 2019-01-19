<?php declare(strict_types=1);

namespace Jeppos\ShopifySDK;

use GuzzleHttp\Client as GuzzleClient;
use Jeppos\ShopifySDK\Client\ShopifyClient;
use Jeppos\ShopifySDK\Serializer\ConfiguredSerializer;
use Jeppos\ShopifySDK\Service\AbstractService;
use Jeppos\ShopifySDK\Service\CollectService;
use Jeppos\ShopifySDK\Service\CustomCollectionService;
use Jeppos\ShopifySDK\Service\CustomerAddressService;
use Jeppos\ShopifySDK\Service\CustomerService;
use Jeppos\ShopifySDK\Service\InventoryItemService;
use Jeppos\ShopifySDK\Service\InventoryLevelService;
use Jeppos\ShopifySDK\Service\LocationService;
use Jeppos\ShopifySDK\Service\MetafieldService;
use Jeppos\ShopifySDK\Service\PageService;
use Jeppos\ShopifySDK\Service\ProductImageService;
use Jeppos\ShopifySDK\Service\ProductService;
use Jeppos\ShopifySDK\Service\ProductVariantService;
use Jeppos\ShopifySDK\Service\RedirectService;

/**
 * @property-read ProductService $products
 * @property-read ProductImageService $productImages
 * @property-read CollectService $collects
 * @property-read ProductVariantService $productVariants
 * @property-read CustomCollectionService $customCollections
 * @property-read MetafieldService $metafields
 * @property-read RedirectService $redirects
 * @property-read PageService $pages
 * @property-read CustomerService $customers
 * @property-read CustomerAddressService $customerAddresses
 * @property-read LocationService $locations
 * @property-read InventoryItemService $inventoryItems
 * @property-read InventoryLevelService $inventoryLevels
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
     * @api
     *
     * @param string $storeUrl
     *
     * @return ShopifySDK
     */
    public function setStoreUrl(string $storeUrl): ShopifySDK
    {
        $this->storeUrl = $storeUrl;
        return $this;
    }

    /**
     * @api
     *
     * @param string $username
     *
     * @return ShopifySDK
     */
    public function setUsername(string $username): ShopifySDK
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @api
     *
     * @param string $password
     *
     * @return ShopifySDK
     */
    public function setPassword(string $password): ShopifySDK
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $accessToken
     *
     * @return ShopifySDK
     */
    public function setAccessToken(string $accessToken): ShopifySDK
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @param string $name
     *
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
    public function createClient(): ShopifyClient
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
