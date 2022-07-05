<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Action;

use Cinema\Model\Order;

class Subtotal extends AbstractAction
{
    protected function getAmountFromFormula(Order $order): float
    {
        $subtotal = array_map(function ($product) {
            return $product->getPrice() * $product->getQuantity();
        }, $order->getProducts());

        return array_sum($subtotal);
    }

    protected function assignAmountToOrderField(Order $order, float $amount): void
    {
        $order->setSubtotal($amount);
    }
}
