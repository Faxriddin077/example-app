<?php

namespace App\Providers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\AccountService;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('accountService', AccountService::class);
        $this->app->bind('productService', ProductService::class);
        $this->app->bind('categoryService', CategoryService::class);
        $this->app->bind('cartService', CartService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
