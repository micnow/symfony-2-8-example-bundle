<?php

namespace ExampleOneBundle\Factory;

use ExampleOneBundle\Entity\Item;

/**
 * Creating Item objects
 */
class ItemFactory implements FactoryInterface
{
    /**
     * @return Item
     */
    public function create()
    {
        return new Item();
    }
}
