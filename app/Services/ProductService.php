<?php

namespace App\Services;

use App\Models\Product;
use App\DTO\Product\ProductDto;
use App\DTO\Product\FilterProductDto;
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

    public function create(ProductDto $dto): Product
    {
        $product = new Product();
        $product->name = $dto->getName();
        $product->price = $dto->getPrice();
        $product->status = $dto->getStatus() ?? 1;
        $product->category_id = $dto->getCategoryId();

        $date = date('my');

        if ($dto->getMainImage()) {
            $product->main_image = (string) $dto->getMainImage()->store("products/$date", 'public');
        }

        $images = [];
        if ($dto->getImages()) {
            foreach ($dto->getImages() as $image) {
                $images[] = $image->store("products/$date", 'public');
            }
        }

        $product->images = $images;
        $product->save();
        return $product;
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function update(Product $product, ProductDto $dto): Product
    {
        $product->name = $dto->getName();
        $product->price = $dto->getPrice();
        $product->status = $dto->getStatus() ?? 1;
        $product->category_id = $dto->getCategoryId();

        $date = date('my');

        if ($dto->getMainImage()) {
            $product->main_image = (string) $dto->getMainImage()->store("products/$date", 'public');
        }

        $images = [];
        if ($dto->getImages()) {
            foreach ($dto->getImages() as $image) {
                $images[] = $image->store("products/$date", 'public');
            }
        }

        $product->images = $images;
        $product->save();
        return $product;
    }
}
