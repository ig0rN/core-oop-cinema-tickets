<?php

namespace Cinema\Service\OrderFactoryDependency;

use Cinema\Model\Product;
use Cinema\Service\OrderFactoryDependency\Interface\CreatorInterface;

class ProductCreator implements CreatorInterface
{
    private array $products = [];

    public function __construct(
        private array $data
    ) {
    }

    /**
     * @return Product[]
     */
    public function makeProductArrayFromRequest(array $requestData): array
    {
        foreach ($requestData['items'] as $productName) {
            if ($this->isProductRegistered($productName)) {
                $this->incrementProductQuantity($productName);

                continue;
            }

            $product = $this->createProduct($productName);

            $this->registerProduct($product);
        }

        return array_values($this->products);
    }

    private function isProductRegistered($productName): bool
    {
        return array_key_exists($productName, $this->products);
    }

    private function incrementProductQuantity(string $productName): void
    {
        /** @var Product $product */
        $product = $this->products[$productName];

        $product->incrementQuantity();
    }

    private function createProduct(string $productName): Product
    {
        $productDetails = $this->data['products'][$productName];

        return (new Product())
            ->setName($productName)
            ->setCategory($productDetails['category'])
            ->setPrice((float) $productDetails['price'])
        ;
    }

    private function registerProduct(Product $product): void
    {
        $this->products[$product->getName()] = $product;
    }
}
