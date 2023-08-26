<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AccountController, ProductController};

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
Route::controller(AccountController::class)->prefix('auth')->group(function () {
    Route::post('create', 'create')->name('auth.create');
    Route::post('login', 'login')->name('auth.login');
    Route::get('/', 'show')
        ->name('user.show')
        ->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProductController::class)->prefix('products')
        ->group(function () {
            Route::get('', 'getAll')->name('products.getAll');
            Route::post('', 'create')->name('products.create');
            Route::get('{product}', 'getOne')->name('products.getOne');
            Route::put('{product}', 'update')->name('products.update');
            Route::delete('{product}', 'remove')->name('products.remove');
        });
});

