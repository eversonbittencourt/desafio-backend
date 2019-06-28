<?php
namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id'                     => 'required',
            'cart_id'                       => 'required|exists:carts',
            'client_name'                   => 'required',
            'value_to_pay'                  => 'required',
            'credit_card.number'            => 'required',
            'credit_card.cvv'               => 'required|min:3|max:3',
            'credit_card.exp_date'          => 'required|min:5|max:5',
            'credit_card.card_holder_name'  => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'client_id.required'                    => 'ID do cliente não informado.',
            'cart_id.required'                      => 'ID do carrinho não informado.',
            'cart_id.exists'                        => 'ID do carrinho não localizado em nenhum registro.',
            'client_name.required'                  => 'Nomo do cliente não informado.',
            'value_to_pay.required'                 => 'Valor total da compra não informado.',
            'credit_card.number.required'           => 'Número do cartão ao não informado.',
            'credit_card.cvv.required'              => 'CVV não informado.',
            'credit_card.cvv.min'                   => 'O CVV deve conter três caracteres',
            'credit_card.cvv.max'                   => 'O CVV deve conter três caracteres',
            'credit_card.exp_date.required'         => 'Data de vencimento do cartão não informado.',
            'credit_card.exp_date.min'              => 'A data de vencimento do cartão deve seguir o padrão MM/YY (Ex. 01/19).',
            'credit_card.card_holder_name.required' => 'Não informado nome do titular do cartão (Conforme consta no cartão).',
        ];
    }
}
