<?php

use App\Http\Controllers\AdminApiController;
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

Route::prefix('admin')->group(function () {
    Route::get('/dashboard/get', [AdminApiController::class, 'dashboard']);
    Route::get('/destination/get', [AdminApiController::class, 'destinations']);
    Route::get('/explore/get', [AdminApiController::class, 'explore']);
    Route::get('/issue/get', [AdminApiController::class, 'issues']);
    Route::get('/food-region/get', [AdminApiController::class, 'foodRegions']);
    Route::get('/article/get', [AdminApiController::class, 'articles']);
    Route::get('/offer/get', [AdminApiController::class, 'offers']);
});
