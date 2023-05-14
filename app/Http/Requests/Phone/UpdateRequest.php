<?php

declare(strict_types=1);

namespace App\Http\Requests\Phone;

use App\Enums\MobileOperatorEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'operator' => [
                'required',
                'string',
                Rule::in(MobileOperatorEnum::toLabels()),
            ],
        ];
    }
}
