<?php

namespace App\Services;

use App\Exceptions\InvalidCartProductException;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartService
{
    public function getItems()
    {
        return Cart::query()->where('user_id', auth()->id())->get();
    }

    public function addItem(Product $product)
    {
        $cart = Cart::query()->firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $product->id
        ],[
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ]);
        if (!$cart->wasRecentlyCreated) {
            $cart->increment('quantity');
        }
    }

    /**
     * @throws InvalidCartProductException
     */
    public function removeItem($productId)
    {
        $cart = Cart::query()
            ->where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if (!$cart) {
            throw new InvalidCartProductException();
        }

        if ($cart->quantity == 1) {
            $cart->delete();
        } else {
            $cart->decrement('quantity');
        }
    }
}
