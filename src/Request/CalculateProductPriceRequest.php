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
        $messages = ['message' => 'validation_failed', 'errors' => []];

        if (!preg_match($taxNumberRegex, $this->taxNumber)) {
            $messages['errors'][] = [
                'property' => 'taxNumber',
                'value' => $this->taxNumber,
                'message' => 'Invalid tax number format.',
            ];
            (new JsonResponse($messages))->send();
            exit;
        }
        parent::validate();
    }
}