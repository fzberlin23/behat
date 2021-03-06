Feature: Product basket
    In order to buy products
    As a customer
    I need to be able to put interesting products into a basket

    Rules:
    - VAT is 20%
    - Delivery for basket under £10 is £3
    - Delivery for basket over £10 is £2

    Scenario: Buying a single product under £10
        Given there is a "Sith Lord Lightsaber", which costs £5
        When I add the "Sith Lord Lightsaber" to the basket
        Then I should have 1 product in the basket
        And the overall basket price should be £9

    Scenario: Buying a single product over £10
        Given there is a "Sith Lord Lightsaber", which costs £15
        When I add the "Sith Lord Lightsaber" to the basket
        Then I should have 1 product in the basket
        And the overall basket price should be £20

    Scenario: Buying two products over £10
        Given there is a "Sith Lord Lightsaber", which costs £10
        And there is a "Jedi Lightsaber", which costs £5
        When I add the "Sith Lord Lightsaber" to the basket
        And I add the "Jedi Lightsaber" to the basket
        Then I should have 2 products in the basket
        And the overall basket price should be £20

    Scenario: Buying a single complimentary product
        Given there is a "Complimentary Star wars book", which costs £0
        When I add the "Complimentary Star wars book" to the basket
        Then I should have 1 product in the basket
        And the overall basket price should be £3

    Scenario: Buying a single product under £10 with a £5 coupon
        Given there is a "Special book about star wars", which costs £8
        When I add the "Special book about star wars" to the basket
        And I redeem a £5 coupon
        Then I should have 1 product in the basket
        And the overall basket price should be £7.6

    Scenario: Buying a single product for £3 with a £5 coupon
        Given there is a "Jamie Oliver Cookbook", which costs £3
        When I add the "Jamie Oliver Cookbook" to the basket
        And I redeem a £5 coupon
        Then I should have 1 product in the basket
        And the overall basket price should be £3
