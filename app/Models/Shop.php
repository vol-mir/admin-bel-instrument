<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Shop
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $registration_number
 * @property mixed $physical_address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Shop newModelQuery()
 * @method static Builder|Shop newQuery()
 * @method static Builder|Shop query()
 * @method static Builder|Shop whereCreatedAt($value)
 * @method static Builder|Shop whereId($value)
 * @method static Builder|Shop whereName($value)
 * @method static Builder|Shop wherePhysicalAddress($value)
 * @method static Builder|Shop whereRegistrationNumber($value)
 * @method static Builder|Shop whereSlug($value)
 * @method static Builder|Shop whereUpdatedAt($value)
 *
 * @property string|null $telegram
 * @property string|null $viber
 * @property string|null $vk
 * @property string|null $instagram
 * @property string|null $facebook
 * @property string|null $ok
 * @property string|null $youtube
 * @property string|null $description
 * @property string|null $keys
 *
 * @method static Builder|Shop whereDescription($value)
 * @method static Builder|Shop whereFacebook($value)
 * @method static Builder|Shop whereInstagram($value)
 * @method static Builder|Shop whereKeys($value)
 * @method static Builder|Shop whereOk($value)
 * @method static Builder|Shop whereTelegram($value)
 * @method static Builder|Shop whereViber($value)
 * @method static Builder|Shop whereVk($value)
 * @method static Builder|Shop whereYoutube($value)
 *
 * @mixin Eloquent
 */
class Shop extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'registration_number',
        'physical_address',
        'telegram',
        'viber',
        'vk',
        'instagram',
        'facebook',
        'ok',
        'youtube',
        'description',
        'keys',
    ];

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'contactable');
    }
}
