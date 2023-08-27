<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder, Factories\HasFactory, Model,
    Relations\BelongsTo, Relations\HasMany
};

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $main_image
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereData($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereProgress($value)
 * @method static Builder|Category whereProjectId($value)
 * @method static Builder|Category whereUpdatedAt($value)
 */
class Category extends Model
{
    use HasFactory;

    protected $with = ['parent'];

    protected $fillable = ['title', 'description', 'parent_id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function child(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
