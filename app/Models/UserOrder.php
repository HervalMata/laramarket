<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'store_id', 'items', 'pagseguro_code', 'pagseguro_status', 'reference'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return BelongsToMany
     */
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'order_store', 'order_id');
    }
}
