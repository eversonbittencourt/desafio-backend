<?php

namespace App\Jobs;

// Models
use App\Models\Cart;
use App\Models\Product;

// Required Libraries
use Illuminate\Foundation\Bus\Dispatchable;

class CreateCart
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
        $product = Product::where('product_id', $this->data['product_id'])->first();

        $data = collect($this->data)
            ->only('cart_id', 'client_id', 'date', 'time')
            ->put('product_id', $product->id)
            ->toArray();

        $cart = Cart::query()->create($data);

        if ( $cart )
            return true;

        return false;
    }
}
