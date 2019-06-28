<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**************************************************************/
    /*************************** CONFIGS **************************/

    protected $fillable = [
        'cart_id',
        'client_id',
        'product_id',
        'date',
        'time',
    ];

    /**************************************************************/
    /*************************** RELATIONS ************************/

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**************************************************************
    *************************** GETS ******************************/

    public function getPriceAttribute()
    {
        return $this->product->price;
    }
}
