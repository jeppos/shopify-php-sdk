<?php declare(strict_types=1);
namespace Tests\Integration\Jeppos\ShopifySDK\Service;

use Jeppos\ShopifySDK\Enum\CustomerState;
use Jeppos\ShopifySDK\Model\Customer;

final class CustomerServiceTest extends AbstractServiceTest
{
    /** @var int */
    private $customerId;

    protected function setUp()
    {
        parent::setUp();

        $customer = (new Customer())
            ->setFirstName($this->faker->firstName)
            ->setLastName($this->faker->lastName)
            ->setEmail($this->faker->email)
            ->setPhone('+46761701010')
        ;
        $createdCustomer = $this->shopifySDK->customers->createOne($customer);
        $this->customerId = $createdCustomer->getId();
    }

    protected function tearDown()
    {
        $this->shopifySDK->customers->deleteOne($this->customerId);
    }

    /**
     * @test
     */
    public function shouldAssertDefaults(): void
    {
        $customer = $this->shopifySDK->customers->getOne($this->customerId);

        $this->assertNull($customer->getLastOrderId());
        $this->assertNull($customer->getLastOrderName());
        $this->assertNull($customer->getDefaultAddress());
        $this->assertNull($customer->getNote());
        $this->assertNull($customer->getMultipassIdentifier());
        $this->assertSame(CustomerState::get(CustomerState::DISABLED), $customer->getState());
        $this->assertSame('0.00', $customer->getTotalSpent());
        $this->assertSame(0, $customer->getOrdersCount());
        $this->assertCount(0, $customer->getAddresses());
        $this->assertFalse($customer->isTaxExempt());
        $this->assertFalse($customer->isAcceptsMarketing());
        $this->assertTrue($customer->isVerifiedEmail());
    }

    /**
     * @test
     */
    public function shouldEnableMarketing(): void
    {
        $customer = $this->shopifySDK->customers->getOne($this->customerId);
        $customer->setAcceptsMarketing(true);

        $actual = $this->shopifySDK->customers->updateOne($customer);

        $this->assertTrue($actual->isAcceptsMarketing());
    }

    /**
     * @test
     */
    public function shouldSetAndResetNote(): void
    {
        $customer = $this->shopifySDK->customers->getOne($this->customerId);
        $customer->setNote('Lorem ipsum');

        $actual = $this->shopifySDK->customers->updateOne($customer);

        $this->assertSame('Lorem ipsum', $actual->getNote());

        $customer = $this->shopifySDK->customers->getOne($this->customerId);
        $customer->setNote(null);

        $actual = $this->shopifySDK->customers->updateOne($customer);

        $this->assertNull($actual->getNote());
    }

    /**
     * @test
     */
    public function shouldSetAndResetMultipassIdentifier(): void
    {
        $customer = $this->shopifySDK->customers->getOne($this->customerId);
        $customer->setMultipassIdentifier('test');

        $actual = $this->shopifySDK->customers->updateOne($customer);

        $this->assertSame('test', $actual->getMultipassIdentifier());

        $customer = $this->shopifySDK->customers->getOne($this->customerId);
        $customer->setMultipassIdentifier(null);

        $actual = $this->shopifySDK->customers->updateOne($customer);

        $this->assertNull($actual->getMultipassIdentifier());
    }
}
