<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productsByTenant(TenantFormRequest $request)
    {
        $products = $this->productService->getProductsByTenantUuid(
            $request->token_company,
            $request->get('categories', [])
        );

        return ProductResource::collection($products);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if (!$product = $this->productService->getProductByUuid($identify)) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        return new ProductResource($product);
    }
}
