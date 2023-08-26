<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Facades\Products;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Requests\FilterProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll(FilterProductRequest $request)
    {
        return ProductResource::collection(
            Products::getAllProducts($request->getDto())
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductRequest $request)
    {
        $this->authorize('create', Product::class);

        return new ProductResource(Products::create($request->getDto()));
    }

    /**
     * Display the specified resource.
     */
    public function getOne(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        return new ProductResource(Products::update($product, $request->getDto()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
