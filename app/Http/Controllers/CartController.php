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
        ShoppingCart::addItem($request->get('product_id'));

        return ShoppingCart::getItems();
    }

    public function removeFromCart(Request $request)
    {
        ShoppingCart::removeItem($request->get('product_id'));

        return ShoppingCart::getItems();
    }
}
