<?php

namespace ExampleOneBundle\Entity;

use ExampleOneBundle\Model\UserInterface;

/**
 * One of the user class
 */
class Operator implements UserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name = 'Name';

    /**
     * @return int
     */
    public function getId(): int
    {
        $this->id;
    }

    /**
     * @param int $id
     * @return UserInterface
     */
    public function setId(int $id): UserInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserInterface
     */
    public function setName(string $name): UserInterface
    {
        $this->name = $name;
        return $this;
    }
}
