<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{

    /**************************************************************/
    /*************************** CONFIGS **************************/

    protected $table = 'credit_cards';

    protected $fillable = [
        'number',
        'card_holder_name',
        'cvv',
        'exp_date',
    ];
}
