<?php

declare(strict_types=1);

namespace App\Actions\Phone;

use App\Dto\Phone\IndexDto;
use App\Models\Phone;
use App\Models\Setting;
use App\Models\Shop;

class StoreAction
{
    public function run(IndexDto $dto, Shop|Setting $contact): void
    {
        $phone = new Phone($dto->toArray());
        $contact->phones()->save($phone);
    }
}
