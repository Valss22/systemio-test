<?php

namespace App;

class StripePaymentProcessor
{
    /**
     * @param float $price payment amount in currency
     * @return bool true if payment was succeeded, false otherwise
     */
    public static function processPayment(float $price): bool
    {
        if ($price < 100) {
            return false;
        }

        //process payment logic
        return true;
    }
}