<?php

namespace ExampleOneBundle\Model;

use ExampleOneBundle\Repository\ItemRepositoryInterface;

interface CartInterface
{
    /**
     * @param ItemInterface $item
     *
     * @return CartInterface
     */
    public function addItem(ItemInterface $item): CartInterface;

    /**
     * @param ItemRepositoryInterface|null $items
     *
     * @return CartInterface
     */
    public function addItems(ItemRepositoryInterface $items = null): CartInterface;

    /**
     * @param int $itemId
     *
     * @return ItemInterface
     */
    public function getItem(int $itemId): ItemInterface;

    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @param int $totalPrice
     *
     * @return CartInterface
     */
    public function setTotalPrice(int $totalPrice): CartInterface;

    /**
     * @return int
     */
    public function getTotalPrice(): int;

    /**
     * @param ItemInterface $item
     */
    public function removeItem(ItemInterface $item): void;
}
