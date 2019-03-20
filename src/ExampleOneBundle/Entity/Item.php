<?php

namespace ExampleOneBundle\Entity;

use ExampleOneBundle\Model\ItemInterface;

/**
 * Class Item
 */
class Item implements ItemInterface
{
    /**
     * @var int Item identifier (ID)
     */
    private $id;

    /**
     * @var string Item name
     */
    private $name;

    /**
     * @var int Item price
     */
    private $price;

    /**
     * @param int $id
     *
     * @return ItemInterface
     */
    public function setId(int $id): ItemInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $price
     *
     * @return ItemInterface
     */
    public function setPrice(int $price): ItemInterface
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param string $name
     *
     * @return ItemInterface
     */
    public function setName(string $name): ItemInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
