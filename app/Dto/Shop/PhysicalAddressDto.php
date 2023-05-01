<?php

declare(strict_types=1);

namespace App\Dto\Shop;

use Spatie\DataTransferObject\DataTransferObject;

class PhysicalAddressDto extends DataTransferObject
{
    public ?string $zip_code = null;

    public ?string $city = null;

    public ?string $street = null;

    public ?string $house_number = null;
}
