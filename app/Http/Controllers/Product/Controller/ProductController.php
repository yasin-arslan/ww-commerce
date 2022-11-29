<?php

namespace App\Http\Controllers\Product\Controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Service\ProductService;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    public ProductService $service;

    /**
     * @param ProductService $service
     */
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
}
