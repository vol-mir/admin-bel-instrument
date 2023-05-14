<?php

declare(strict_types=1);

namespace App\Actions\Shop;

use App\Dto\Shop\IndexDto;
use App\Models\Shop;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, array $only, Shop $shop): void
    {
        $updateData = $dto->only(...$only)->toArray();

        $additionalData = [];
        if (array_key_exists('name', $updateData)) {
            $additionalData['slug'] = Str::slug($dto->name);
        }

        $shop->update(array_merge($updateData, $additionalData));
    }
}
