<?php

namespace ExampleOneBundle\Controller;

use ExampleOneBundle\Entity\Item;
use ExampleOneBundle\Entity\Operator;
use ExampleOneBundle\Model\CartInterface;
use ExampleOneBundle\Model\PriceModifierInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

class OperatorController extends Controller
{
    /**
     * @var CartInterface
     */
    private $cart;

    /**
     * @var PriceModifierInterface
     */
    private $priceModifier;

    /**
     * @var EngineInterface
     */
    private $engine;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param CartInterface $cart
     * @param PriceModifierInterface $priceModifier
     * @param EngineInterface $engine
     * @param ContainerInterface $container
     * @param SessionInterface $session
     * @param LoggerInterface $logger
     */
    public function __construct(
        CartInterface $cart,
        PriceModifierInterface $priceModifier,
        EngineInterface $engine,
        ContainerInterface $container,
        SessionInterface $session,
        LoggerInterface $logger
    )
    {
        $this->cart = $cart;
        $this->priceModifier = $priceModifier;
        $this->engine = $engine;
        $this->container = $container;
        $this->session = $session;
        $this->logger = $logger;
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        try {
            $oldTotalPrice = $this->cart->getTotalPrice();

            return $this->engine->renderResponse('@ExampleOne/Operator/index.html.twig', array(
                'oldTotalPrice' => $oldTotalPrice,
                'totalPrice' => $this->priceModifier->modify($oldTotalPrice)
            ));
        } catch (\Exception $e) {
            $this->logger->error('There was an unexpected error: ' . $e->getMessage());
        }
    }
}
