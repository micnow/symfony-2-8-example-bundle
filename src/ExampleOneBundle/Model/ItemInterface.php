<?php

namespace ExampleOneBundle\Model;

interface ItemInterface
{
    /**
     * @param int $id
     *
     * @return ItemInterface
     */
    public function setId(int $id): ItemInterface;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $price
     *
     * @return $this
     */
    public function setPrice(int $price): ItemInterface;

    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): ItemInterface;

    /**
     * @return string
     */
    public function getName(): string;
}
