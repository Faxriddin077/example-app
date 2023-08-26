<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll($search)
    {
        $query = Category::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                return $q->where('name', 'like', "%$search%")
                    ->orWhere('price', 'like', "%$search%");
            });
        }

        $query->orderByDesc('id');

        return $query->paginate(20)->withQueryString();
    }

    public function getById($id)
    {
        return Category::find($id);
    }

}
