<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\HomeSettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Article
Route::get('article-category', [ArticleController::class, 'articleCategory']);
Route::get('articles', [ArticleController::class, 'index']);
Route::get('home-setting', [HomeSettingController::class, 'index']);
Route::get('home-setting', [HomeSettingController::class, 'index']);
Route::get('product', [ProductController::class, 'index']);
Route::get('product-category', [ProductController::class, 'productCategory']);
Route::get('product-page-setting', [ProductController::class, 'productPageSetting']);
Route::get('banner', [BannerController::class, 'index']);

