<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'price' => ['required', 'numeric', 'min:0'],
            'weight' => ['required', 'string', 'max:50'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'image_url' => ['nullable', 'string', 'max:500'],
            'slug' => [
                'nullable',
                'string',
                'max:170',
                Rule::unique('products', 'slug')->ignore($this->route('product')),
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function validatedPayload(): array
    {
        $validated = $this->validated();
        $validated['is_featured'] = $this->boolean('is_featured');

        return $validated;
    }
}
