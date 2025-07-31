<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Category;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $response =  Article::with('category')->get();

        return ApiResponse::success($response,'Article list');
    }

    public function articleCategory()
    {
        $response =  Category::all();

        return ApiResponse::success($response,'Article Category list');
    }
}
