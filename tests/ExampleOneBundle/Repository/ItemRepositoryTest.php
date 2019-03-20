<?php

namespace ExampleOneBundle\Tests\Entity;

use ExampleOneBundle\Entity\Item;
use ExampleOneBundle\Factory\ItemFactory;
use ExampleOneBundle\Repository\ItemRepository;
use PHPUnit\Framework\TestCase;

/**
 * Tests for repository items
 */
class ItemRepositoryTest extends TestCase
{
    /**
     * @var ItemRepository
     */
    private $itemRepository;

    public function setUp()
    {
        parent::setUp();
        $this->itemRepository = new ItemRepository(new ItemFactory());
    }

    /**
     * Check for returning type
     */
    public function testIsRepositoryReturnArray()
    {
        $this->assertInternalType('array', $this->itemRepository->get());
    }
}
