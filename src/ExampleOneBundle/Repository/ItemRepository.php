<?php

namespace ExampleOneBundle\Repository;

use ExampleOneBundle\Factory\FactoryInterface;
use ExampleOneBundle\Factory\ItemFactory;
use ExampleOneBundle\Model\ItemInterface;

/**
 * Repository with items
 */
class ItemRepository implements ItemRepositoryInterface
{
    /**
     * @var ItemFactory
     */
    private $itemFactory;

    /**
     * @param FactoryInterface $itemFactory
     */
    public function __construct(FactoryInterface $itemFactory)
    {
        $this->itemFactory = $itemFactory;
    }

    /**
     * @return ItemInterface[]
     */
    public function get(): array
    {
        $items = [];

        $item = $this->itemFactory->create();
        $item->setId(1);
        $item->setName("TV LCD");
        $item->setPrice(100);

        $item2 = $this->itemFactory->create();
        $item2->setId(2);
        $item2->setName("Samsung S1000");
        $item2->setPrice(200);

        $items[] = $item;
        $items[] = $item2;

        return $items;
    }
}
