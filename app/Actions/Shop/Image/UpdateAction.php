<?php

declare(strict_types=1);

namespace App\Actions\Shop\Image;

use App\Dto\Shop\Image\IndexDto;
use App\Models\ShopImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, ShopImage $image): ShopImage
    {
        $image->delete();
        Storage::disk('public')->delete('images/shops/' . $image->shop?->slug . '/' . $image->name);

        $newImage = $dto->image;
        $imageInfo = explode(';base64,', $newImage);
        $imgExt = str_replace('data:image/', '', $imageInfo[0]);
        $newImage = str_replace(' ', '+', $imageInfo[1]);
        $imageName = Str::uuid() . '.' . $imgExt;

        Storage::disk('public')->put(
            'images/shops/' . $image->shop?->slug . '/' . $imageName,
            base64_decode($newImage)
        );

        $data = $dto->toArray();
        $data = array_merge($data, [
            'shop_id' => $image->shop?->id,
            'name' => $imageName,
        ]);

        return ShopImage::create($data);
    }
}
