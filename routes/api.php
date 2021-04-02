<?php

use App\Http\Controllers\API\AbsenController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CodeqrController;
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

    Route::get('materi', [CodeqrController::class,'Materi']);
    Route::post('materi', [CodeqrController::class, 'Inputmateri']);

    Route::post('qrkode',[CodeqrController::class, 'CreateCode']);
    Route::put('qrkode',[CodeqrController::class,'UpdateCode']);
    Route::delete('qrkode',[CodeqrController::class,'DeleteCode']);
    Route::delete('absen/{absen}',[AbsenController::class,'DeleteAbsen']);

    Route::post('absen',[AbsenController::class,'Absen']);
});