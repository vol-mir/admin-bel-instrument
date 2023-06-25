<?php

declare(strict_types=1);

namespace App\Actions\Brand;

use App\Dto\Brand\IndexDto;
use App\Models\Brand;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreAction
{
    public function run(IndexDto $dto): Brand
    {
        if (empty($dto->image)) {
            throw new Exception('Image not found');
        }

        $newImage = $dto->image;
        $imageInfo = explode(';base64,', $newImage);
        $imgExt = str_replace('data:image/', '', $imageInfo[0]);
        $newImage = str_replace(' ', '+', $imageInfo[1]);
        $imageName = Str::uuid() . '.' . $imgExt;

        Storage::disk('public')->put('images/brands/' . $imageName, base64_decode($newImage));

        $data = $dto->toArray();
        $data = array_merge($data, [
            'name' => $imageName,
            'slug' => Str::slug($dto->title),
        ]);

        return Brand::create($data);
    }
}
