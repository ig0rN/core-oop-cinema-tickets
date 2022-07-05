<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action;

use Cinema\Model\Order;
use Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Interface\PriceActionInterface;

abstract class AbstractAction implements PriceActionInterface
{
    abstract protected function getAmountFromFormula(Order $order): float;
    abstract protected function assignAmountToOrderField(Order $order, float $amount): void;

    final public function makeCalculation(Order $order): void
    {
        $this->validate($order);

        $amount = round($this->getAmountFromFormula($order), 2);

        $this->assignAmountToOrderField($order, $amount);
    }

    protected function validate(Order $order): void
    {
        // Nothing to validate.
        // Override if it's needed.
    }
}