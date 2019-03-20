<?php

namespace ExampleOneBundle\Service;

use ExampleOneBundle\Entity\Operator;
use ExampleOneBundle\Model\PriceModifierInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Price modifier for customer
 */
class CustomerPriceModifier implements PriceModifierInterface
{
    /**
     * @var int
     */
    private $modifier;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param int $modifier
     * @param SessionInterface $session
     */
    public function __construct(int $modifier, SessionInterface $session)
    {
        $this->modifier = $modifier;
        $this->session = $session;
    }

    /**
     * Strategy to modify price depending from customer type
     *
     * @param int $price Price to modify
     *
     * @return int
     */
    public function modify(int $price): int
    {
        if ($this->modifier === 0) {
            return $price;
        }

        # Check Customer type in session
        $customer = get_class($this->session->get('customer'));

        switch ($customer) {
            case Operator::class:
                return $price * ($this->modifier / 100);
        }

        return $price;
    }
}
