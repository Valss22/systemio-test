<?php

namespace App\Controller;

use App\Request\CalculateProductPriceRequest;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/calculate-price', methods: ['POST'])]
    public function calculatePrice(ProductService $productService, CalculateProductPriceRequest $request): JsonResponse
    {
        //if ($request->validate()) {};
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }
}