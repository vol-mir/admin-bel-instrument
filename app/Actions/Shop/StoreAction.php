<?php

declare(strict_types=1);

namespace App\Actions\Shop;

use App\Dto\Shop\IndexDto;
use App\Models\Shop;
use Illuminate\Support\Str;

class StoreAction
{
    public function run(IndexDto $dto): Shop
    {
        $data = $dto->toArray();

        if ($dto->name) {
            $data = array_merge($data, ['slug' => Str::slug($dto->name)]);
        }

        return Shop::create($data);
    }
}
