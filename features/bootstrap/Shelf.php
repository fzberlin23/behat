<?php

final class Shelf
{
    private $priceMap = array();

    public function setProductPrice(string $product, float $price)
    {
        $this->priceMap[$product] = $price;
    }

    public function getProductPrice($product): float
    {
        return $this->priceMap[$product];
    }
}
