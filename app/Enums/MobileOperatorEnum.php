<?php

declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self mts()
 * @method static self a1()
 * @method static self life()
 * @method static self city()
 */
class MobileOperatorEnum extends Enum
{
    /**
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'mts' => 'mts',
            'a1' => 'a1',
            'life' => 'life',
            'city' => 'city',
        ];
    }
}
