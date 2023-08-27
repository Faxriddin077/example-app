<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder, Collection, Factories\HasFactory,
    Model, Relations\BelongsTo
};

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $name
 * @property int $price
 * @property string|null $main_image
 * @property Collection|array $images
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereData($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereProgress($value)
 * @method static Builder|Product whereProjectId($value)
 * @method static Builder|Product whereUpdatedAt($value)
 */
class Product extends Model
{
    use HasFactory;

    protected $with = ['category'];

    protected $fillable = ['name', 'price', 'main_image', 'images', 'status', 'category_id'];

    protected $casts = [
        'images' => 'array'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
