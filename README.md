## Abstract Factory

Abstract Factory is a creational design pattern that lets you produce families of related objects without specifying their concrete classes.

-----

We need to create a relationship between tax and sales, every time there is a sale of a type it will have to be related to a specific tax

### The problem

If we do it this way separately, we will not be able to relate sales and tax

```php
<?php
abstract class Sale
{
   public \DateTimeInterface $endDate;

    public function __construct(\DateTimeInterface $endDate)
    {
        $this->endDate = $endDate;
    }


}
```
```php
<?php
class SaleProduct extends Sale
{
    private int $weight;

    public function __construct(\DateTimeInterface $endDate, int $weight)
    {
        parent::__construct($endDate);
        $this->weight = $weight;
    }
}
```
```php
<?php
class SaleService extends Sale
{
    private string $providerName;

    public function __construct(\DateTimeInterface $endDate, string $providerName)
    {
        parent::__construct($endDate);
        $this->providerName = $providerName;
    }
}
```
```php
<?php
interface Tax
{

}
```
```php
<?php
class Iss implements Tax
{

}
```
```php
<?php
class Icms implements Tax
{

}
```

### The solution

Now, using the Abstract Factory pattern, we are relating sales and taxes to a factory to create them.

```php
<?php
interface SaleFactory
{
    public function createSale() : Sale;
    public function tax() : Tax;
}
```
```php
<?php
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
```
```php
<?php
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
```
```php
<?php
$saleProductFactory = new SaleProductFactory(rand(1 , 100000));
$saleProduct = $saleProductFactory->createSale();
$taxProduct = $saleProductFactory->tax();

$saleServiceFactory = new SaleServiceFactory(md5((string) rand(1 , 100000)));
$saleService = $saleServiceFactory->createSale();
$taxService = $saleServiceFactory->tax();
```

-----

### Installation for test

![PHP Version Support](https://img.shields.io/badge/php-7.4%2B-brightgreen.svg?style=flat-square) ![Composer Version Support](https://img.shields.io/badge/composer-2.2.9%2B-brightgreen.svg?style=flat-square)

```bash
composer install
```

```bash
php wrong/test.php
php right/test.php
```