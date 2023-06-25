<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string|null $name
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Brand newModelQuery()
 * @method static Builder|Brand newQuery()
 * @method static Builder|Brand query()
 * @method static Builder|Brand whereCreatedAt($value)
 * @method static Builder|Brand whereDescription($value)
 * @method static Builder|Brand whereId($value)
 * @method static Builder|Brand whereName($value)
 * @method static Builder|Brand whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Brand extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'url',
        'title',
        'slug',
    ];
}
