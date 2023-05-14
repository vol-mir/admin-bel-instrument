<?php

declare(strict_types=1);

namespace App\Tasks;

use App\Models\Setting;
use App\Models\Shop;

class GetContactTask
{
    public function run(string $type, int $id): Shop|Setting
    {
        $class = match ($type) {
            'shops' => Shop::class,
            // no break
            default => Setting::class,
        };

        return (new $class())::find($id);
    }
}
