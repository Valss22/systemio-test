<?php

namespace App\Controller;

use App\Request\CalculateProductPriceRequest;
use App\Request\PurchaseProductRequest;
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

    #[Route('/purchase', methods: ['POST'])]
    public function purchase(ProductService $productService, PurchaseProductRequest $request): JsonResponse
    {
        return $this->json([
            'processPaymentStatus' => $productService->processPayment($request->getRequestBody())
        ]);
    }
}