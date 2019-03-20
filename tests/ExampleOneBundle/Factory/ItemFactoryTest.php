<?php

namespace ExampleOneBundle\Tests\Entity;

use ExampleOneBundle\Entity\Item;
use ExampleOneBundle\Factory\ItemFactory;
use PHPUnit\Framework\TestCase;

/**
 * Tests for factory items
 */
class ItemFactoryTest extends TestCase
{
    /**
     * @var ItemFactory
     */
    private $itemFactory;

    public function setUp()
    {
        parent::setUp();
        $this->itemFactory = new ItemFactory();
    }

    /**
     * Check for created object
     */
    public function testIsFactoryCreateItemObject()
    {
        $this->assertInstanceOf(Item::class, $this->itemFactory->create());
    }
}
