<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RepairController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');;
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');;
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('cars', CarController::class)->except('show');
    Route::apiResource('cars.repairs', RepairController::class)->except('show');
});

