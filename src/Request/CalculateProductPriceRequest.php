<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CalculateProductPriceRequest extends BaseRequest
{
    #[Type('integer')]
    #[NotBlank]
    protected int $product;

    #[Type('string')]
    #[NotBlank]
    protected string $taxNumber;

    #[Type('string')]
    #[NotBlank]
    protected string $couponCode;
}