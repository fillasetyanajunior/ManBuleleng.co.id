<?php

use App\Http\Controllers\API\AbsenController;
use App\Http\Controllers\API\AuthController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',[AuthController::class,'login']);
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function () {
    // manggil controller sesuai bawaan laravel 8
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('qrkode',[AbsenController::class, 'CreateCode']);
    Route::put('qrkode',[AbsenController::class,'UpdateCode']);
});