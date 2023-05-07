<?php

declare(strict_types=1);

namespace App\Actions\Setting;

use App\Dto\Setting\IndexDto;
use App\Models\Setting;

class UpdateAction
{
    public function run(IndexDto $dto, Setting $setting): void
    {
        $setting->update([
            'name' => $dto->name,
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
