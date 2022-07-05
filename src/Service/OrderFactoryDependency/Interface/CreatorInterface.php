<?php

namespace Cinema\Service\OrderFactoryDependency\Interface;

use Cinema\Model\Product;

interface CreatorInterface
{
    /**
     * @return Product[]
     */
    public function makeProductArrayFromRequest(array $requestData): array;
}