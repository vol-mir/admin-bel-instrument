<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'description' => ['nullable', 'string'],
            'name' => ['required', 'string'],
            'sku' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
        ];
    }
}
