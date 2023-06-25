<?php

declare(strict_types=1);

namespace App\Actions\Brand;

use App\Dto\Brand\IndexDto;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, array $only, Brand $brand): Brand
    {
        $updateData = $dto->only(...$only)->toArray();

        if (array_key_exists('image', $updateData) && !empty($updateData['image'])) {
            $brand->delete();
            Storage::disk('public')->delete('images/brands/' . $brand->name);

            $newImage = $updateData['image'];
            $imageInfo = explode(';base64,', $newImage);
            $imgExt = str_replace('data:image/', '', $imageInfo[0]);
            $newImage = str_replace(' ', '+', $imageInfo[1]);
            $imageName = Str::uuid() . '.' . $imgExt;

            Storage::disk('public')->put(
                'images/brands/' . $imageName,
                base64_decode($newImage)
            );

            $updateData = array_merge($updateData, [
                'name' => $imageName,
                'slug' => Str::slug($dto->title),
                'title' => $dto->title,
            ]);

            return Brand::create($updateData);
        }

        if (array_key_exists('description', $updateData) && !empty($updateData['description'])) {
            $brand->update([
                'description' => $updateData['description'],
                'slug' => Str::slug($dto->title),
                'title' => $dto->title,
            ]);
        }

        return $brand;
    }
}
