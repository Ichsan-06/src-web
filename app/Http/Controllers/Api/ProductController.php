<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\ProductPageSetting;

class ProductController extends Controller
{
    public function index()
    {
        $response =  Product::with('category')->get();

        return ApiResponse::success($response,'Product list');
    }

    public function productCategory()
    {
        $response =  CategoryProduct::all();

        return ApiResponse::success($response,'Product Category list');
    }

    public function productPageSetting()
    {
        $response =  ProductPageSetting::with('productBenefit')->first();

        return ApiResponse::success($response,'Product Page Setting');
    }
}
