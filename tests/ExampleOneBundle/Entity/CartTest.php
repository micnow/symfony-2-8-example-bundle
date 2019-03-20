<?php

namespace ExampleOneBundle\Tests\Entity;

use ExampleOneBundle\Entity\Cart;
use ExampleOneBundle\Entity\Item;
use PHPUnit\Framework\TestCase;

/**
 * Tests for entity Cart
 */
class CartTest extends TestCase
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * @var Item
     */
    private $item;

    public function setUp()
    {
        parent::setUp();
        $this->cart = $this->setUpCart(new Cart());
        $this->item = new Item();
    }

    /**
     * Check for setters and getters
     */
    public function testIsSettersSetData()
    {
        $this->assertInstanceOf(Cart::class, $this->cart->addItem());
        $this->assertInstanceOf(Cart::class, $this->cart->setPrice(300));
        $this->assertInstanceOf(Cart::class, $this->cart->setName('test name'));

        $this->assertEquals(12, $this->cart->getId());
        $this->assertEquals(300, $this->cart->getPrice());
        $this->assertEquals('test name', $this->cart->getName());
    }

    /**
     * Checking adding items to cart
     */
    public function testIsItemAdded()
    {
        $this->assertEquals(2, $this->cart->getItems());

        $item = $this->cart->getItem(1);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals('first item', $item->getName());
        $this->assertEquals(200, $item->getPrice());
    }

    /**
     * Checking for prices
     */
    public function testIsPricesAreCorrect()
    {
        $cart = $this->setUpCart(new Cart());
        $this->assertEquals(650, $cart->getTotalPrice());
        $item = $cart->getItem(1);
        $item->setPrice(350);
        $this->assertEquals(800, $cart->getTotalPrice());
    }

    /**
     * Checking removing items from cart
     */
    public function testCheckRemovingItems()
    {
        $cart = $this->setUpCart(new Cart());
        $this->item->setId(2);
        $cart->removeItem($this->item);

        $this->assertEquals(1, $cart->getItems());
    }

    /**
     * Prepare car for tests
     *
     * @param Cart $cart
     *
     * @return Cart
     */
    private function setUpCart(Cart $cart)
    {
        $firstItem = new Item();
        $firstItem->setId(1);
        $firstItem->setPrice(200);
        $firstItem->setName('first item');

        $secondItem = new Item();
        $secondItem->setId(2);
        $secondItem->setPrice(450);
        $secondItem->setName('second item');

        $cart->addItem($firstItem);
        $cart->addItem($secondItem);

        return $cart;
    }
}
