<?php

declare(strict_types=1);

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
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
