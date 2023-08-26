<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, ProductController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('create', 'create')->name('user.create');
    Route::post('login', 'login')->name('user.login');
    Route::get('/', 'show')
        ->name('user.show')
        ->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProductController::class)
        ->group(function () {
            Route::get('products', 'getAll')->name('products.getAll');
            Route::post('products', 'create')->name('products.create');
            Route::get('products/{product}', 'getOne')->name('products.getOne');
            Route::put('products/{product}', 'update')->name('products.update');
            Route::delete('products/{product}', 'remove')->name('products.remove');
        });
});

