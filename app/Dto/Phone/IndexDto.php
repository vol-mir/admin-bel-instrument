<?php

declare(strict_types=1);

namespace App\Dto\Phone;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public ?string $name = null;

    public string $phone;

    public string $operator;
}
