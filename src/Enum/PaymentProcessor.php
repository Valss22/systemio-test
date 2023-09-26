<?php

namespace App\Enum;

use Symfony\Component\HttpFoundation\JsonResponse;

enum PaymentProcessor: string
{
    case Paypal = 'paypal';
    case Stripe = 'stripe';

}