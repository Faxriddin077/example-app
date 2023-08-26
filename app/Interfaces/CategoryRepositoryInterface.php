<?php

namespace App\Interfaces;

use App\DTO\Product\FilterProductDto;

interface CategoryRepositoryInterface
{
    public function getAll($search);
    public function getById($id);
}
