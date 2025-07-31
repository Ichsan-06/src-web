<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;

class HomeSettingController extends Controller
{
    public function index()
    {
        $response =  HomeSetting::with('homeSliders', 'homeSection4s')->first();

        return ApiResponse::success($response,'Home Setting list');
    }
}
