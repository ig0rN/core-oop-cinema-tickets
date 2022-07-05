<?php

namespace Cinema\Service;

use Cinema\Model\Order;

// OR THIS WAY OR IMPLEMENT JSON_SERIALIZABLE IN ORDER MODEL
// I PREFER THIS WAY
class BillResponse
{
    public function __construct(
        private Order $order
    ) {
    }

    public function getOrderBill(): string
    {
        return json_encode($this->makeResponseArray(), JSON_PRETTY_PRINT);
    }

    private function makeResponseArray(): array
    {
        return [
            'orderDateTime' => [
                'date' => $this->order->getOrderDate()->format('d.m.Y.'),
                'time' => $this->order->getOrderDate()->format('H:i:s'),
            ],
            'products' => $this->getProducts(),
            'subtotal' => $this->order->getSubtotal(),
            'taxes' => $this->order->getTaxes(),
            'grandTotal' => $this->order->getGrandTotal()
        ];
    }

    private function getProducts(): array
    {
        return array_map(function ($product) {
            return [
                'name' => $product->getName(),
                'quantity' => $product->getQuantity(),
                'category' => $product->getCategory(),
                'price' => $product->getPrice() * $product->getQuantity()
            ];
        }, $this->order->getProducts());
    }
}