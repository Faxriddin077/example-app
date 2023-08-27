<?php

namespace App\Facades;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Facade;
use App\DTO\Category\CreateCategoryDto;

/**
 * @method static CategoryService getAllCategories(string|null $search)
 * @method static Category create(CreateCategoryDto $dto)
 * @method static Category getCategoryById(Category|int $category)
 *
 * @see CategoryService
 */
class Categories extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'categoryService';
    }
}
