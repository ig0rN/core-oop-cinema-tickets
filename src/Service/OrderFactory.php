<?php

namespace Cinema\Service;

use Cinema\Model\Order;
use Cinema\Service\OrderFactoryDependency\Interface\CreatorInterface;
use Cinema\Service\OrderFactoryDependency\Interface\PriceEngineInterface;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action\GrandTotal;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action\Subtotal;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action\Taxes;

class OrderFactory
{
    public function __construct(
        private CreatorInterface $creator,
        private PriceEngineInterface $priceEngine,
    ) {
    }

    public function make(array $requestData): Order
    {
        $order = (new Order())
            ->setProducts($this->creator->makeProductArrayFromRequest($requestData));

        $this->priceEngine
            ->registerAction(new Subtotal())
            ->registerAction(new Taxes())
            ->registerAction(new GrandTotal())
        ;

        $this->priceEngine->processRegisteredActions($order);

        return $order;
    }
}
