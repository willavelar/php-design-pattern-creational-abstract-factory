<?php

namespace DesignPattern\Right\Sale;

abstract class Sale
{
   public \DateTimeInterface $endDate;

    public function __construct(\DateTimeInterface $endDate)
    {
        $this->endDate = $endDate;
    }


}