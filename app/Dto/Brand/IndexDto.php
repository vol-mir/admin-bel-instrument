<?php

declare(strict_types=1);

namespace App\Dto\Brand;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public ?string $description = null;

    public ?string $image = null;

    public ?string $url = null;

    public string $title;
}
