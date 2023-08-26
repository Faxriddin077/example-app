<?php

namespace App\Facades;

use App\DTO\Product\ProductDto;
use App\DTO\Product\FilterProductDto;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ProductService getAllProducts(FilterProductDto $dto)
 * @method static Product create(ProductDto $dto)
 * @method static Product getProductById(Product|int $product)
 * @method static Product update(Product $product, ProductDto $dto)
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
