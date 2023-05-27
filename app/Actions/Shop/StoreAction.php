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

        if ($dto->physical_address) {
            $data['physical_address'] = json_encode($data['physical_address']);
        }

        return Shop::create($data);
    }
}
