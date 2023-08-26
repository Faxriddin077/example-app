<?php

namespace App\Http\Requests;

use App\DTO\Product\FilterProductDto;
use Illuminate\Foundation\Http\FormRequest;

class FilterProductRequest extends FormRequest
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
            'search'        => 'string',
            'status'        => 'string',
            'category_id'   => 'int',
            'date'          => 'date',
        ];
    }

    /**
     * @return FilterProductDto
     */
    public function getDto(): FilterProductDto {
        return new FilterProductDto(
            search: $this->get('search'),
            status: $this->get('status'),
            category_id: $this->get('category_id'),
            date: $this->get('date'),
        );
    }
}
