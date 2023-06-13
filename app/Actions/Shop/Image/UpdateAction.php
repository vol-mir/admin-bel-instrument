<?php

declare(strict_types=1);

namespace App\Actions\Shop\Image;

use App\Dto\Shop\Image\IndexDto;
use App\Models\ShopImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, array $only, ShopImage $image): ShopImage
    {
        $updateData = $dto->only(...$only)->toArray();

        if (array_key_exists('image', $updateData) && !empty($updateData['image'])) {
            $image->delete();
            Storage::disk('public')->delete('images/shops/' . $image->shop?->slug . '/' . $image->name);

            $newImage = $updateData['image'];
            $imageInfo = explode(';base64,', $newImage);
            $imgExt = str_replace('data:image/', '', $imageInfo[0]);
            $newImage = str_replace(' ', '+', $imageInfo[1]);
            $imageName = Str::uuid() . '.' . $imgExt;

            Storage::disk('public')->put(
                'images/shops/' . $image->shop?->slug . '/' . $imageName,
                base64_decode($newImage)
            );

            $updateData = array_merge($updateData, [
                'shop_id' => $image->shop?->id,
                'name' => $imageName,
            ]);

            return ShopImage::create($updateData);
        }

        if (array_key_exists('description', $updateData) && !empty($updateData['description'])) {
            $image->update(['description' => $updateData['description']]);
        }

        return $image;
    }
}
