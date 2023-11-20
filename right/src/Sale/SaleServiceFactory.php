<?php

namespace DesignPattern\Right\Sale;

use DesignPattern\Right\Tax\Iss;
use DesignPattern\Right\Tax\Tax;

class SaleServiceFactory implements SaleFactory
{
    private string $providerName;

    /**
     * @param string $providerName
     */
    public function __construct(string $providerName)
    {
        $this->providerName = $providerName;
    }

    public function createSale(): Sale
    {
       return new SaleService(new \DateTimeImmutable(), $this->providerName);
    }

    public function tax(): Tax
    {
       return new Iss();
    }
}