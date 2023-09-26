<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class PurchaseProductRequest extends CalculateProductPriceRequest
{
    #[Type('string')]
    #[NotBlank]
    protected string $paymentProcessor;
}