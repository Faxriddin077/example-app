<?php

namespace App\Facades;

use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Facade;
use App\DTO\Category\CreateCategoryDto;

/**
 * @method static CartService getItems()
 * @method static CartService addItem(Product $product)
 * @method static void removeItem($productId)
 *
 * @see CartService
 */
class ShoppingCart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cartService';
    }
}
