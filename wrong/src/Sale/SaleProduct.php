<?php

namespace DesignPattern\Wrong\Sale;

class SaleProduct extends Sale
{
    private int $weight;

    public function __construct(\DateTimeInterface $endDate, int $weight)
    {
        parent::__construct($endDate);
        $this->weight = $weight;
    }
}