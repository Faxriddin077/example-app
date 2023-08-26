<?php

namespace App\Classes;

use App\Models\Product;

class ShoppingCart
{
    private $items = [];

    public function addItem(Product $product)
    {
        $this->items[] = $product;
    }

    public function getItems()
    {
        return $this->items;
    }
}
