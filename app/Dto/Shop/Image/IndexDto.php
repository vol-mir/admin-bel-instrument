<?php

declare(strict_types=1);

namespace App\Dto\Shop\Image;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public ?string $description = null;

    public ?string $image = null;
}
