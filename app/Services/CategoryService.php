<?php

namespace App\Services;

use App\Models\Category;
use App\DTO\Category\CreateCategoryDto;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories($search)
    {
        return $this->categoryRepository->getAll($search);
    }

    public function create(CreateCategoryDto $dto): Category
    {
        $category = new Category();
        $category->title = $dto->getTitle();
        $category->description = $dto->getDescription();
        $category->parent_id = $dto->getParentId();
        $category->save();

        return $category;
    }
}
