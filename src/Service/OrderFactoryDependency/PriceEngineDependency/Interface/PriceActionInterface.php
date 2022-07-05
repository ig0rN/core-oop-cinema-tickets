<?php

namespace Cinema\Service\OrderFactoryDependency\PriceEngineDependency\Interface;

use Cinema\Model\Order;

interface PriceActionInterface
{
    public function makeCalculation(Order $order): void;
}
