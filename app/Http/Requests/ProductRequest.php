<?php

namespace App\Http\Requests;

use App\DTO\Product\CreateProductDto;
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
            'main_image' => 'required|image|min:1',
            'images' => 'required|array',
        ];
    }

    /**
     * @return CreateProductDto
     */
    public function getDto(): CreateProductDto
    {
        return new CreateProductDto(
            name: $this->input('name'),
            price: $this->input('price'),
            status: $this->input('category_id'),
            category_id: $this->input('category_id'),
            main_image: $this->input('main_image'),
            images: $this->input('images')
        );
    }
}
