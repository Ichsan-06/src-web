<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        $response =  Banner::all();

        return ApiResponse::success($response,'Banner list');
    }

}
