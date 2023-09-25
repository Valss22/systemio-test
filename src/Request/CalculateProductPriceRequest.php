<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
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

    public function validate(): void
    {
        $taxNumberRegex = "/^(DE|IT|GR|FR[A-Z]{2})[0-9]{9}$/";
        $couponCodeRegex = "/^D([0-9]|[1-9][0-9]|100)$/";

        $messages = ['message' => 'validation_failed', 'errors' => []];

        if (!preg_match($taxNumberRegex, $this->taxNumber)) {
            $messages['errors'][] = [
                'property' => 'taxNumber',
                'value' => $this->taxNumber,
                'message' => 'Invalid tax number format.',
            ];
            (new JsonResponse($messages, 400))->send();
            exit;
        }

        if (!preg_match($couponCodeRegex, $this->couponCode)) {
            $messages['errors'][] = [
                'property' => 'couponCode',
                'value' => $this->couponCode,
                'message' => 'Invalid coupon code format.',
            ];
            (new JsonResponse($messages, 400))->send();
            exit;
        }
        parent::validate();
    }
}