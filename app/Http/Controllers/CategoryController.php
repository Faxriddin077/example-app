<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Facades\Categories;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\FilterCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll(FilterCategoryRequest $request)
    {
        return CategoryResource::collection(
            Categories::getAllCategories($request->get('search'))
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        return new CategoryResource(Categories::create($request->getDto()));
    }

    /**
     * Display the specified resource.
     */
    public function getOne(Category $category)
    {
        return new CategoryResource($category);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(Category $category)
    {
        $category->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
