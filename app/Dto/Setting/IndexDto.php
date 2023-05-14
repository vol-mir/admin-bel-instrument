<?php

declare(strict_types=1);

namespace App\Dto\Setting;

use Spatie\DataTransferObject\DataTransferObject;

class IndexDto extends DataTransferObject
{
    public ?string $name = null;

    public ?string $telegram = null;

    public ?string $viber = null;

    public ?string $vk = null;

    public ?string $instagram = null;

    public ?string $facebook = null;

    public ?string $ok = null;

    public ?string $youtube = null;

    public ?string $description = null;

    public ?string $keys = null;
}
