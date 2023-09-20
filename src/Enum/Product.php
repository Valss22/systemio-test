<?php

namespace App\Enum;

enum Product: int
{
    case Iphone = 1;
    case Headphones = 2;
    case PhoneCase = 3;

    public function price(): int
    {
        return match ($this) {
            Product::Iphone => 100,
            Product::Headphones => 20,
            Product::PhoneCase => 10,
        };
    }
}