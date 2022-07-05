<?php

use Cinema\Service\BillResponse;
use Cinema\Service\OrderFactory;
use Cinema\Service\OrderFactoryDependency\PriceEngine;
use Cinema\Service\OrderFactoryDependency\ProductCreator;

require 'vendor/autoload.php';
$data = require('data/data.php');

//ORDER:
$requestData = [
    'items' => [
        'cinema ticket',
        'cinema ticket',
        'cola',
    ],
];

$orderFactory = new OrderFactory(
    new ProductCreator($data),
    new PriceEngine()
);

$order = $orderFactory->make($requestData);

echo (new BillResponse($order))->getOrderBill();
