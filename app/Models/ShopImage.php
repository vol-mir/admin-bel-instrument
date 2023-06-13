<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ShopImage
 *
 * @property-read Shop|null $shop
 *
 * @method static Builder|ShopImage newModelQuery()
 * @method static Builder|ShopImage newQuery()
 * @method static Builder|ShopImage query()
 *
 * @property int $id
 * @property string|null $name
 * @property string $description
 * @property int $shop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|ShopImage whereCreatedAt($value)
 * @method static Builder|ShopImage whereDescription($value)
 * @method static Builder|ShopImage whereId($value)
 * @method static Builder|ShopImage wherePath($value)
 * @method static Builder|ShopImage whereShopId($value)
 * @method static Builder|ShopImage whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class ShopImage extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'shop_id',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
