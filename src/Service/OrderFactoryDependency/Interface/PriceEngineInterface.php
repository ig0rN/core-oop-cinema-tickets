<?php

namespace Cinema\Service\OrderFactoryDependency\Interface;

use Cinema\Model\Order;

interface PriceEngineInterface
{
    public function processRegisteredActions(Order $order): void;
}