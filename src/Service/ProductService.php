<?php

namespace App\Service;

use App\Enum\Product;
use App\StripePaymentProcessor;

class ProductService
{
    public const COUNTRY_TAX = [
        'DE' => 0.19,
        'IT' => 0.22,
        'GR' => 0.20,
        'FR' => 0.24,
    ];

    public function processPayment(array $data)
    {
        return 'service';
    }

    public function calculatePrice(array $data): float
    {
        $productPrice = Product::from($data['product'])->price();
        $tax = self::COUNTRY_TAX[substr($data['taxNumber'], 0, 2)];
        $discount = explode('D', $data['couponCode'])[1] / 100;
        return $productPrice + ($productPrice * $tax) - ($discount * $productPrice);
    }
}