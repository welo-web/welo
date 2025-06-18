<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services/{slug}/prices', function ($slug) {
    $service = \App\Models\Service::where('slug', $slug)->first();
    if (!$service) {
        return response()->json(['error' => 'Service not found'], 404);
    }
    return response()->json([
        'basic' => [
            'monthly' => $service->basic_price,
            'yearly' => $service->basic_price * 12
        ],
        'advanced' => [
            'monthly' => $service->advanced_price,
            'yearly' => $service->advanced_price * 12
        ],
        'professional' => [
            'monthly' => $service->professional_price,
            'yearly' => $service->professional_price * 12
        ]
    ]);
});
