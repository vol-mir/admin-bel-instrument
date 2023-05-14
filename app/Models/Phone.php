<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Phone
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $operator
 * @property string $contactable_type
 * @property int $contactable_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Phone newModelQuery()
 * @method static Builder|Phone newQuery()
 * @method static Builder|Phone query()
 * @method static Builder|Phone whereContactableId($value)
 * @method static Builder|Phone whereContactableType($value)
 * @method static Builder|Phone whereCreatedAt($value)
 * @method static Builder|Phone whereId($value)
 * @method static Builder|Phone whereName($value)
 * @method static Builder|Phone whereOperator($value)
 * @method static Builder|Phone wherePhone($value)
 * @method static Builder|Phone whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Phone extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'operator',
        'contactable_type',
        'contactable_id',
    ];

    public function contactable(): MorphTo
    {
        return $this->morphTo();
    }
}
