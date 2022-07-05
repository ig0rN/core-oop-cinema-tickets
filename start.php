<?php
require 'vendor/autoload.php';
$data = require('data/data.php');

$engine = new \Cinema\CinemaPriceEngine($data);

//ORDER:
$order1 = [
    'items' => [
        'cinema ticket',
        'cinema ticket',
        'cola',
    ],
];
echo $engine->getOrderBill($order1);
