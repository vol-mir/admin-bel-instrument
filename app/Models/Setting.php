<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $telegram
 * @property string|null $viber
 * @property string|null $vk
 * @property string|null $instagram
 * @property string|null $facebook
 * @property string|null $ok
 * @property string|null $youtube
 * @property string|null $description
 * @property string|null $keys
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereDescription($value)
 * @method static Builder|Setting whereFacebook($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereInstagram($value)
 * @method static Builder|Setting whereKeys($value)
 * @method static Builder|Setting whereName($value)
 * @method static Builder|Setting whereOk($value)
 * @method static Builder|Setting whereSlug($value)
 * @method static Builder|Setting whereTelegram($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereViber($value)
 * @method static Builder|Setting whereVk($value)
 * @method static Builder|Setting whereYoutube($value)
 *
 * @mixin Eloquent
 */
class Setting extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
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
}
