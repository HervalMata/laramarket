<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method paginate(int $int)
 * @method findOrFail(int $category)
 * @method find(int $category)
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug'];

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
