<?php

namespace App\Http\Controllers;

use App\Facades\ShoppingCart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getAll()
    {
        return ShoppingCart::getItems();
    }

    public function addToCart(Request $request)
    {
        $productId = $request->get('product_id');
        $product = Product::find($productId);

        if ($product) {
            ShoppingCart::addItem($product);
        }

        return ShoppingCart::getItems();
    }

    public function removeFromCart(Request $request)
    {
        $product = Product::query()->find($request->get('product_id'));
        if ($product) {
            ShoppingCart::removeItem($request->get('product_id'));
        }

        return ShoppingCart::getItems();
    }
}
