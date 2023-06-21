<?php

declare(strict_types=1);

namespace App\Dto\Shop;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public ?string $name;

    public ?string $registration_number;

    public ?PhysicalAddressDto $physical_address;

    public ?string $telegram = null;

    public ?string $viber = null;

    public ?string $vk = null;

    public ?string $instagram = null;

    public ?string $facebook = null;

    public ?string $ok = null;

    public ?string $youtube = null;

    public ?string $description = null;

    public ?string $keys = null;

    public ?string $google_map = null;
}
