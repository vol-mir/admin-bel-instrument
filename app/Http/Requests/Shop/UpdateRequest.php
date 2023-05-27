<?php

declare(strict_types=1);

namespace App\Http\Requests\Shop;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        /** @var Shop $shop */
        $shop = $this->route('shop');

        return [
            'name' => ['nullable', 'string', 'max:255'],
            'registration_number' => ['nullable', 'max:255', 'unique:shops,registration_number,'.$shop->id],
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
            'keys' => ['nullable', 'string'],
        ];
    }
}
