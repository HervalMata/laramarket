<?php

namespace App\Models;

use App\Notifications\StoreReceiveNewOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @method static paginate(int $int)
 * @method static find(Store $store)
 * @method static limit(int $int)
 * @method whereSlug($slug)
 * @method whereIn(string $string, array $storesId)
 */
class Store extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];

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

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(UserOrder::class, 'order_store', 'store_id', 'order_id');
    }

    /**
     * @param array $storesId
     * @return mixed
     */
    public function notifyStoreOrders(array $storesId = [])
    {
        $stores = $this->whereIn('id', $storesId)->get();
        $stores->map(function ($store) {
            return $store->user;
        })->each->notify(new StoreReceiveNewOrder());
    }
}
