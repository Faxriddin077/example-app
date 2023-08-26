<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Facades\Products;
use Illuminate\Http\Request;
use App\Http\Requests\FilterProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll(FilterProductRequest $request)
    {
//        $this->authorize('viewAny', Product::class);

        $products = Products::getAllProducts($request->getDto());

        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductRequest $request)
    {
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
