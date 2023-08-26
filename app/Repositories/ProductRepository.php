<?php

namespace App\Repositories;

use App\DTO\Product\FilterProductDto;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(FilterProductDto $dto)
    {
        $query = Product::query();

        if ($dto->getCategoryId()) {
            $query->where('category_id', $dto->getCategoryId());
        }

        if ($dto->getStatus()) {
            $query->where('status', $dto->getStatus());
        }

        if ($dto->getDate()) {
            $query->whereDate('created_at', $dto->getDate());
        }

        if ($dto->getSearch()) {
            $query->where(function ($q) use ($dto) {
                return $q->where('name', 'like', "%{$dto->getSearch()}%")
                    ->orWhere('price', 'like', "%{$dto->getSearch()}%");
            });
        }

        $query->orderByDesc('id');

        return $query->paginate(20)->withQueryString();
    }

    public function getById($id)
    {
        return Product::find($id);
    }

}
