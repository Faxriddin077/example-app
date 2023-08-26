<?php

namespace App\Services;

use App\DTO\Product\FilterProductDto;
use App\Models\Product;
use Illuminate\Support\Arr;
use App\Http\Requests\FilterProductRequest;
use App\Interfaces\ProductRepositoryInterface;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(FilterProductDto $dto)
    {
        return $this->productRepository->getAll($dto);
    }

    public function create(array $data): Product
    {
        return Product::query()->create([
            'name' => Arr::get($data, 'name'),
            'price' => Arr::get($data, 'email'),
            'main_image' => Arr::get($data, 'mainImage'),
            'images' => Arr::get($data, 'images'),
            'status' => Arr::get($data, 'status'),
            'category_id' => Arr::get($data, 'categoryId'),
        ]);
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }
}
