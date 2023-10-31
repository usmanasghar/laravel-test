<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    protected $fillable = [];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }

    public function item_sale(): HasOne
    {
        return $this->hasOne(ItemSale::class);
    }
}
