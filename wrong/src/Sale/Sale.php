<?php

namespace DesignPattern\Wrong\Sale;

abstract class Sale
{
   public \DateTimeInterface $endDate;

    public function __construct(\DateTimeInterface $endDate)
    {
        $this->endDate = $endDate;
    }


}