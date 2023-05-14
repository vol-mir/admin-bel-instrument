<?php

declare(strict_types=1);

namespace App\Actions\Setting;

use App\Dto\Setting\IndexDto;
use App\Models\Setting;

class UpdateAction
{
    public function run(IndexDto $dto, array $only, Setting $setting): void
    {
        $updateData = $dto->only(...$only)->toArray();

        $setting->update($updateData);
    }
}
