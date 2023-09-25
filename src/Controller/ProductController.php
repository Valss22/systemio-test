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
        return $this->json([
            'price' => $productService->calculatePrice($request->getRequestBody())
        ]);
    }
}