<?php

namespace App\Jobs;

// Models
use App\Models\Product;

// Required Libraries
use Illuminate\Foundation\Bus\Dispatchable;

class CreateProduct
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
        $product = Product::query()->create($this->data);

        if ( $product )
            return $product;

        return false;
    }
}
