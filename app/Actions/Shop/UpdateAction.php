<?php

declare(strict_types=1);

namespace App\Actions\Shop;

use App\Dto\Shop\IndexDto;
use App\Models\Shop;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, Shop $shop): void
    {
        $shop->update([
            'name' => $dto->name,
            'registration_number' => $dto->registration_number,
            'slug' => Str::slug($dto->name),
            'physical_address' => json_encode([
                'zip_code' => $dto->physical_address?->zip_code,
                'city' => $dto->physical_address?->city,
                'street' => $dto->physical_address?->street,
                'house_number' => $dto->physical_address?->house_number,
            ]),
            'telegram' => $dto->telegram,
            'viber' => $dto->viber,
            'vk' => $dto->vk,
            'instagram' => $dto->instagram,
            'facebook' => $dto->facebook,
            'ok' => $dto->ok,
            'youtube' => $dto->youtube,
            'description' => $dto->description,
            'keys' => $dto->keys,
        ]);
    }
}
