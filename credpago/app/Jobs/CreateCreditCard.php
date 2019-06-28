<?php

namespace App\Jobs;

use App\Models\CreditCard;

use Illuminate\Foundation\Bus\Dispatchable;

class CreateCreditCard
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
        $data = collect($this->data)
            ->only('number', 'card_holder_name', 'cvv', 'exp_date')
            ->toArray();

        $creditCard = CreditCard::where('number', $this->data['number'])->first();

        if ( $creditCard )
            return $creditCard;

        $creditCard = CreditCard::create($data);

        if ( $creditCard )
            return $creditCard;

    }
}
