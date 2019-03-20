<?php

namespace ExampleOneBundle\Model;

/**
 * Interface PriceModifierInterface
 */
interface PriceModifierInterface
{
    /**
     * Modyfing price
     *
     * @param int $price
     *
     * @return int
     */
    public function modify(int $price): int;
}
