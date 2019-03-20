<?php

namespace ExampleOneBundle\Tests\Entity;

use ExampleOneBundle\Entity\Operator;
use PHPUnit\Framework\TestCase;

/**
 * Tests for entity Operator
 */
class OperatorTest extends TestCase
{
    /**
     * @var Operator
     */
    private $operator;

    public function setUp()
    {
        parent::setUp();
        $this->operator = new Operator();
    }

    /**
     * Check for setters and getters
     */
    public function testIsSettersSetData()
    {
        $this->assertInstanceOf(Operator::class, $this->operator->setId(12));
        $this->assertInstanceOf(Operator::class, $this->operator->setName('test name'));

        $this->assertEquals(12, $this->operator->getId());
        $this->assertEquals('test name', $this->operator->getName());
    }
}
