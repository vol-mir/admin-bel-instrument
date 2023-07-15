<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Dto\Product\IndexDto;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, array $only, Product $product): Product
    {
        $updateData = $dto->only(...$only)->toArray();

        if (array_key_exists('image', $updateData) && !empty($updateData['image'])) {
            Storage::disk('public')->delete('images/products/' . $product->image);

            $newImage = $updateData['image'];
            $imageInfo = explode(';base64,', $newImage);
            $imgExt = str_replace('data:image/', '', $imageInfo[0]);
            $newImage = str_replace(' ', '+', $imageInfo[1]);
            $imageName = Str::uuid() . '.' . $imgExt;

            Storage::disk('public')->put(
                'images/products/' . $imageName,
                base64_decode($newImage)
            );

            $updateData = array_merge($updateData, [
                'image' => $imageName,
            ]);
        }

        if (array_key_exists('name', $updateData) && !empty($updateData['name'])) {
            $updateData = array_merge($updateData, [
                'slug' => Str::slug($dto->name),
            ]);
        }

        $product->update($updateData);

        return $product;
    }
}
