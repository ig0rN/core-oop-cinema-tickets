<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action;

use Cinema\Model\Order;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Exception\SubtotalActionMissedException;

class Taxes extends AbstractAction
{
    /** TAX percentage */
    private const TAX = 20;

    protected function validate(Order $order): void
    {
        if (null === $order->getSubtotal()) {
            throw new SubtotalActionMissedException();
        }
    }

    protected function getAmountFromFormula(Order $order): float
    {
        return $order->getSubtotal() * (self::TAX / 100);
    }

    protected function assignAmountToOrderField(Order $order, float $amount): void
    {
        $order->setTaxes($amount);
    }
}