<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(int $int)
 * @method static find(Store $store)
 */
class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
