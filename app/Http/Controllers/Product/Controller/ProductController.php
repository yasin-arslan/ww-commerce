<?php

namespace App\Http\Controllers\Product\Controller;

use App\Exceptions\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\ResourceCollection\ProductResourceCollection;
use App\Http\Controllers\Product\Service\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * @param ProductService $service
     */
    public function __construct(public ProductService $service)
    {
    }

    /**
     * @param string $slug
     * @return ProductResourceCollection|JsonResponse
     */
    public function show(string $slug): ProductResourceCollection|JsonResponse
    {
        $product = $this->service->productBySlug($slug);

        return $product
            ? new ProductResourceCollection($product)
            : ResponseHandler::notFound();
    }
}
