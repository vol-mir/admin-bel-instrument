<?php

declare(strict_types=1);

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'registration_number' => ['required', 'max:255', 'unique:shops'],
            'save' => ['required', 'in:save,save-next'],
            'physical_address' => ['nullable', 'array'],
            'physical_address[zip_code]' => ['nullable', 'string', 'max:25'],
            'physical_address[city]' => ['nullable', 'string', 'max:255'],
            'physical_address[street]' => ['nullable', 'string', 'max:255'],
            'physical_address[house_number]' => ['nullable', 'string', 'max:25'],
            'telegram' => ['nullable', 'url'],
            'viber' => ['nullable', 'url'],
            'vk' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'ok' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
            'keys' => ['nullable', 'string', 'max:25'],
        ];
    }
}
