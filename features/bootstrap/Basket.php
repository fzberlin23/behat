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
        $totalPrice =
            $this->productsPrice +
            ($this->productsPrice * 0.2) -
            $this->couponValue;

        $totalPrice = $totalPrice < 0 ? 0 : $totalPrice;
        $totalPrice += ($totalPrice > 10) ? 2.0 : 3.0;

        return $totalPrice;
    }

    public function count(): int
    {
        return count($this->products);
    }
}
