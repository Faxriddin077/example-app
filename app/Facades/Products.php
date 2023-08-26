<?php

namespace App\Facades;

use App\DTO\Product\FilterProductDto;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ProductService getAllProducts(FilterProductDto $dto)
 * @method static ProductService create(array $product)
 * @method static ProductService getProductById(Product|int $product)
 *
 * @see ProductService
 */
class Products extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'productService';
    }
}
