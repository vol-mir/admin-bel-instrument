<?php

declare(strict_types=1);

namespace App\Dto\Category;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public string $name;

    public ?int $parent_id = null;

    public ?string $description = null;
}
