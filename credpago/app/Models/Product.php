<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**************************************************************/
    /*************************** CONFIGS **************************/

    protected $fillable = [
        'product_id',
        'artist',
        'year',
        'album',
        'price',
        'store',
        'thumb',
        'date'
    ];

}
