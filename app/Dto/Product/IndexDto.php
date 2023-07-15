<?php

declare(strict_types=1);

namespace App\Dto\Product;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public ?string $description = null;

    public ?string $sku = null;

    public string $name;

    public ?string $image = null;
}
