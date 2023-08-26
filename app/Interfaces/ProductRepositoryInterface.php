<?php

namespace App\Interfaces;

use App\DTO\Product\FilterProductDto;

interface ProductRepositoryInterface
{
    public function getAll(FilterProductDto $dto);
    public function getById($id);
}
