<?php

namespace DesignPattern\Right\Sale;

class SaleService extends Sale
{
    private string $providerName;

    public function __construct(\DateTimeInterface $endDate, string $providerName)
    {
        parent::__construct($endDate);
        $this->providerName = $providerName;
    }
}