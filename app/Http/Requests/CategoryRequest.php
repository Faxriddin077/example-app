<?php

namespace App\Http\Requests;

use App\DTO\Category\CreateCategoryDto;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|string|min:4|max:100',
            'description' => 'required|string|max:100',
            'parent_id' => 'integer|exists:categories,id'
        ];
    }

    /**
     * @return CreateCategoryDto
     */
    public function getDto(): CreateCategoryDto
    {
        return new CreateCategoryDto(
            title: $this->input('title'),
            description: $this->input('description'),
            parent_id: $this->input('parent_id')
        );
    }
}
