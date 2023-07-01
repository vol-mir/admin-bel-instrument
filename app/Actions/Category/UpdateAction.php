<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Dto\Category\IndexDto;
use App\Models\Category;
use Arr;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, array $only, Category $category): Category
    {
        $updateData = $dto->only(...$only)->toArray();

        if (array_key_exists('name', $updateData)) {
            $updateData = array_merge($updateData, [
                'slug' => Str::slug($dto->name),
            ]);
        }

        $updateData['parent_id'] = Arr::get($updateData, 'parent_id');

        $category->update($updateData);

        return $category;
    }
}
