<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'name' => 'required|max:255',
            'slug' => 'required|unique:products|max:255',
            'quantity' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
            'code' =>  Str::random(9)
        ]);
    }
}
