<?php

declare(strict_types=1);

namespace App\Actions\Phone;

use App\Dto\Phone\IndexDto;
use App\Models\Phone;
use Illuminate\Support\Str;

class UpdateAction
{
    public function run(IndexDto $dto, Phone $phone): void
    {
        $phone->update($dto->toArray());
    }
}
