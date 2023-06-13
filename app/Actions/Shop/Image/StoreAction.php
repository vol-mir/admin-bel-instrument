<?php

declare(strict_types=1);

namespace App\Actions\Shop\Image;

use App\Dto\Shop\Image\IndexDto;
use App\Models\Shop;
use App\Models\ShopImage;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreAction
{
    public function run(IndexDto $dto, Shop $shop): ShopImage
    {
        if (empty($dto->image)) {
            throw new Exception('Image not found');
        }

        $newImage = $dto->image;
        $imageInfo = explode(';base64,', $newImage);
        $imgExt = str_replace('data:image/', '', $imageInfo[0]);
        $newImage = str_replace(' ', '+', $imageInfo[1]);
        $imageName = Str::uuid() . '.' . $imgExt;

        Storage::disk('public')->put('images/shops/' . $shop->slug . '/' . $imageName, base64_decode($newImage));

        $data = $dto->toArray();
        $data = array_merge($data, [
            'shop_id' => $shop->id,
            'name' => $imageName,
        ]);

        return ShopImage::create($data);
    }
}
