<?php

namespace ExampleOneBundle\Model;

/**
 * Interface UserInterface
 */
interface UserInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     *
     * @return UserInterface
     */
    public function setId(int $id): UserInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return UserInterface
     */
    public function setName(string $name): UserInterface;
}
