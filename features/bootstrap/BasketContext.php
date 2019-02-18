<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class BasketContext implements Context
{
    private $shelf;
    private $basket;

    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
    }

    /**
     * @Given there is a :product, which costs £:price
     */
    public function thereIsAWhichCostsPs($product, $price)
    {
        $this->shelf->setProductPrice($product, floatval($price));
    }

    /**
     * @When I add the :product to the basket
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @When I redeem a £:couponValue coupon
     */
    public function iRedeemAPsCoupon($couponValue)
    {
        $this->basket->redeemCoupon($couponValue);
    }

    /**
     * @Then I should have :count product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        PHPUnit\Framework\Assert::assertCount(
            intval($count),
            $this->basket
        );
    }

    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price)
    {
        PHPUnit\Framework\Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPrice()
        );
    }
}
