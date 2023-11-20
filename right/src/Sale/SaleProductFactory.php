<?php

namespace DesignPattern\Right\Sale;

use DesignPattern\Right\Tax\Icms;
use DesignPattern\Right\Tax\Tax;

class SaleProductFactory implements SaleFactory
{

    public int $weight;

    public function __construct(int $weight)
    {
        $this->weight = $weight;
    }

    public function createSale(): Sale
    {
        return new SaleProduct(new \DateTimeImmutable(), $this->weight);
    }

    public function tax(): Tax
    {
        return new Icms();
    }
}