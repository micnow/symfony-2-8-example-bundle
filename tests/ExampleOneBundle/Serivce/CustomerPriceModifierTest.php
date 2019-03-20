<?php

namespace ExampleOneBundle\Tests\Entity;

use ExampleOneBundle\Entity\Item;
use ExampleOneBundle\Entity\Operator;
use ExampleOneBundle\Factory\ItemFactory;
use ExampleOneBundle\Repository\ItemRepository;
use ExampleOneBundle\Service\CustomerPriceModifier;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Tests for price modifier service
 */
class CustomerPriceModifierTest extends TestCase
{
    /**
     * @var Session
     */
    private $session;

    public function setUp()
    {
        parent::setUp();
        $this->session = new Session();
    }

    /**
     * Check for returning price
     */
    public function testIsPriceCorrect()
    {
        $customerPriceModifier = new CustomerPriceModifier(0, $this->session);
        $this->assertEquals(500, $customerPriceModifier->modify(500));

        $customerPriceModifier = new CustomerPriceModifier(50, $this->session);
        $this->assertEquals(500, $customerPriceModifier->modify(500));

        $customer = new Operator();
        $this->session->set('customer', $customer);
        $customerPriceModifier = new CustomerPriceModifier(50, $this->session);
        $this->assertEquals(250, $customerPriceModifier->modify(500));
    }
}
