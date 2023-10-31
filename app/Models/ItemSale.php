<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemSale extends Model
{
    protected $table = 'item_sale';

    protected $fillable=['item_id','sale_id','quantity','unit_price','total_price'];
}
