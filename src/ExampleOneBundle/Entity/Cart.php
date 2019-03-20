<?php

namespace ExampleOneBundle\Entity;

use Doctrine\ORM\EntityNotFoundException;
use ExampleOneBundle\Model\CartInterface;
use ExampleOneBundle\Model\ItemInterface;
use ExampleOneBundle\Repository\ItemRepositoryInterface;

class Cart implements CartInterface
{
    /**
     * @var ItemInterface[]
     */
    private $items = [];

    /**
     * @var int
     */
    private $totalPrice = 0;

    /**
     * By the constructor we can initiate cart with default items
     *
     * @param ItemRepositoryInterface|null $itemRepository
     */
    public function __construct(ItemRepositoryInterface $itemRepository = null)
    {
        $this->addItems($itemRepository);
    }

    /**
     * @param ItemInterface $item
     *
     * @return CartInterface
     */
    public function addItem(ItemInterface $item): CartInterface
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @param int $totalPrice
     *
     * @return CartInterface
     */
    public function setTotalPrice(int $totalPrice): CartInterface
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        $this->totalPrice = 0;
        /** @var ItemInterface $item */
        foreach ($this->items as $item) {
            $this->totalPrice += $item->getPrice();
        }
        return $this->totalPrice;
    }

    /**
     * @param int $itemId
     * @return ItemInterface
     *
     * @throws EntityNotFoundException
     */
    public function getItem(int $itemId): ItemInterface
    {
        foreach ($this->items as $key => $item) {
            if ($item->getId() === $itemId) {
                return $this->items[$key];
            }
        }
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ItemInterface $item
     */
    public function removeItem(ItemInterface $item): void
    {
        foreach ($this->items as $key => $cartItem) {
            if ($cartItem->getId() === $item->getId()) {
                unset($this->items[$key]);
                break;
            }
        }
    }

    /**
     * @param ItemRepositoryInterface|null $itemRepository
     *
     * @return CartInterface
     */
    public function addItems(ItemRepositoryInterface $itemRepository = null): CartInterface
    {
        if ($itemRepository instanceof ItemRepositoryInterface) {
            $items = $itemRepository->get();

            foreach ($items as $item) {
                $this->items[] = $item;
            }
        }

        return $this;
    }
}
