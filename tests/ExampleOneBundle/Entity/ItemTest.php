<?php

namespace ExampleOneBundle\Tests\Entity;

use ExampleOneBundle\Entity\Item;
use PHPUnit\Framework\TestCase;

/**
 * Tests for entity Item
 */
class ItemTest extends TestCase
{
    /**
     * @var Item
     */
    private $item;

    public function setUp()
    {
        parent::setUp();
        $this->item = new Item();
    }

    /**
     * Check for setters and getters
     */
    public function testIsSettersSetData()
    {
        $this->assertInstanceOf(Item::class, $this->item->setId(12));
        $this->assertInstanceOf(Item::class, $this->item->setPrice(300));
        $this->assertInstanceOf(Item::class, $this->item->setName('test name'));

        $this->assertEquals(12, $this->item->getId());
        $this->assertEquals(300, $this->item->getPrice());
        $this->assertEquals('test name', $this->item->getName());
    }
}
