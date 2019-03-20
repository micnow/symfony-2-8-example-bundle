<?php

namespace ExampleOneBundle\Repository;

/**
 * Interface RepositoryInterface
 */
interface ItemRepositoryInterface
{
    /**
     * @return array
     */
    public function get(): array;
}
