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
        return Shop::create(array_merge($dto->toArray(), ['slug' => Str::slug($dto->name)]));
    }
}
