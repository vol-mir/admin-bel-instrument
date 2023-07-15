<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Dto\Product\IndexDto;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreAction
{
    public function run(IndexDto $dto): Product
    {
        $imageName = null;

        if (!empty($dto->image)) {
            $newImage = $dto->image;
            $imageInfo = explode(';base64,', $newImage);
            $imgExt = str_replace('data:image/', '', $imageInfo[0]);
            $newImage = str_replace(' ', '+', $imageInfo[1]);
            $imageName = Str::uuid() . '.' . $imgExt;

            Storage::disk('public')->put('images/products/' . $imageName, base64_decode($newImage));
        }

        $data = $dto->toArray();
        $data = array_merge($data, [
            'image' => $imageName,
            'slug' => Str::slug($dto->name),
        ]);

        return Product::create($data);
    }
}
