<?php

namespace App\Controller;

use App\Request\CalculateProductPriceRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


#[Route('/product')]
class ProductController extends AbstractController
{
    #[Route('/calculate', methods: ['POST'])]
    public function calculatePrice(CalculateProductPriceRequest $request): JsonResponse
    {
        dd($request->getRequestBody());

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }
}