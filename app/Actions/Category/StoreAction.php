<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Dto\Category\IndexDto;
use App\Models\Category;
use Illuminate\Support\Str;

class StoreAction
{
    public function run(IndexDto $dto): Category
    {
        $data = $dto->toArray();
        $data = array_merge($data, [
            'slug' => Str::slug($dto->name),
        ]);

        return Category::create($data);
    }
}
