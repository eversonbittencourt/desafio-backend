<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Order extends Model
{
    /**************************************************************/
    /*************************** CONFIGS **************************/

    protected $fillable = [
        'credit_card_id',
        'client_id',
        'client_name',
        'total_to_pay',
    ];

    /**************************************************************/
    /*************************** RELATIONS ************************/

    public function credit_card()
    {
        return $this->belongsTo(CreditCard::class);
    }

    /**************************************************************/
    /*************************** GETS ******************************/

    public function getCardNumberAttribute()
    {
        return $this->formatCardNumber($this->credit_card->number);
    }

    public function getDateAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }

    /**************************************************************/
    /*************************** METHODS **************************/
    
    public function formatCardNumber($value)
    {
        $number = substr($value, 12, 4);
        return '**** **** **** ' . $number;
    }
}
