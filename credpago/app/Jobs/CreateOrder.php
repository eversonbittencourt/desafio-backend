<?php

namespace App\Jobs;

// Models
use App\Models\Order;
use App\Models\Cart;

// Jobs
use App\Jobs\CreateCreditCard;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Bus;

class CreateOrder
{
    use Dispatchable;

    /**
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $creditCard = Bus::dispatchNow(
            new CreateCreditCard($this->data['credit_card'])
        );

        $total = Cart::where('cart_id', $this->data['cart_id'])->get()->sum('price');
        $total = $total + $this->data['value_to_pay'];
        $data = collect($this->data)
            ->only('client_id', 'cart_id', 'cart_id', 'client_name')
            ->put('total_to_pay', $total)
            ->put('credit_card_id', $creditCard->id)
            ->toArray();

        $order = Order::query()->create($data);

        if ( $order )
            return $order;

        return false;
    }
}
