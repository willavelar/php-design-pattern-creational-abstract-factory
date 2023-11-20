<?php

namespace DesignPattern\Right\Sale;

use DesignPattern\Right\Tax\Tax;

interface SaleFactory
{
    public function createSale() : Sale;
    public function tax() : Tax;
}