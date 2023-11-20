<?php

use DesignPattern\Right\Sale\SaleProductFactory;
use DesignPattern\Right\Sale\SaleServiceFactory;

require "vendor/autoload.php";

$saleProductFactory = new SaleProductFactory(rand(1 , 100000));
$saleProduct = $saleProductFactory->createSale();
$taxProduct = $saleProductFactory->tax();

$saleServiceFactory = new SaleServiceFactory(md5((string) rand(1 , 100000)));
$saleService = $saleServiceFactory->createSale();
$taxService = $saleServiceFactory->tax();