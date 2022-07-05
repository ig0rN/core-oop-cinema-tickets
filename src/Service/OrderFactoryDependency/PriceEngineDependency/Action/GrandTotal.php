<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action;

use Cinema\Model\Order;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Exception\TaxesActionMissedException;

class GrandTotal extends AbstractAction
{
    protected function validate(Order $order): void
    {
        if (null === $order->getTaxes()) {
            throw new TaxesActionMissedException();
        }
    }

    protected function getAmountFromFormula(Order $order): float
    {
        return $order->getSubtotal() + $order->getTaxes();
    }

    protected function assignAmountToOrderField(Order $order, float $amount): void
    {
        $order->setGrandTotal($amount);
    }
}
