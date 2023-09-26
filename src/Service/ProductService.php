<?php

namespace App\Service;

use App\Enum\PaymentProcessor;
use App\Enum\Product;
use App\PaypalPaymentProcessor;
use App\StripePaymentProcessor;

class ProductService
{
    public const COUNTRY_TAX = [
        'DE' => 0.19,
        'IT' => 0.22,
        'GR' => 0.20,
        'FR' => 0.24,
    ];

    public function processPayment(array $data): bool
    {
        switch ($data['paymentProcessor']) {
            case PaymentProcessor::Paypal->value:
                try {
                    PaypalPaymentProcessor::pay($this->calculatePrice($data) / 100);
                    return true;
                } catch (\Exception $e) {
                    return false;
                }
            case PaymentProcessor::Stripe->value:
                return StripePaymentProcessor::processPayment($this->calculatePrice($data));
            default:
                return false;
        }
    }

    public function calculatePrice(array $data): float|int
    {
        $productPrice = Product::from($data['product'])->price();
        $tax = self::COUNTRY_TAX[substr($data['taxNumber'], 0, 2)];
        $discount = explode('D', $data['couponCode'])[1] / 100;
        return $productPrice + ($productPrice * $tax) - ($discount * $productPrice);
    }
}