<?php

namespace App\Facades;

use App\DTO\Product\CreateProductDto;
use App\DTO\Product\FilterProductDto;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ProductService getAllProducts(FilterProductDto $dto)
 * @method static Product create(CreateProductDto $dto)
 * @method static Product getProductById(Product|int $product)
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
