<?php

namespace App\Http\Requests;

use App\DTO\Product\ProductDto;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|max:100',
            'price' => 'required|integer|min:1000|max:10000000',
            'status' => 'integer',
            'category_id' => 'integer|exists:categories,id',
            'main_image' => 'image|min:1',
            'images' => 'array',
        ];
    }

    /**
     * @return ProductDto
     */
    public function getDto(): ProductDto
    {
        return new ProductDto(
            name: $this->input('name'),
            price: $this->input('price'),
            status: $this->input('status'),
            category_id: $this->input('category_id'),
            main_image: $this->file('main_image'),
            images: $this->file('images')
        );
    }
}
