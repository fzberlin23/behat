<?php

final class Basket implements \Countable
{
    private $shelf;
    private $products = array();
    private $productsPrice = 0.0;
    private $couponValue = 0.0;

    public function __construct(Shelf $shelf)
    {
        $this->shelf = $shelf;
    }

    public function addProduct(string $product)
    {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getProductPrice($product);
    }

    public function redeemCoupon(float $couponValue)
    {
        $this->couponValue = $couponValue;
    }

    public function getTotalPrice(): float
    {
        return
            $this->productsPrice +
            ($this->productsPrice * 0.2) -
            ($this->couponValue) +
            ($this->productsPrice > 10 ? 2.0 : 3.0);
    }

    public function count(): int
    {
        return count($this->products);
    }
}
