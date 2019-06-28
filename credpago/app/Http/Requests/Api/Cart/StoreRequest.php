<?php

namespace App\Http\Requests\Api\Cart;

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
            'cart_id'       => 'required',
            'client_id'     => 'required',
            'product_id'    => 'required|exists:products',
            'date'          => 'required|min:10|max:10',
            'time'          => 'required|min:8|max:8',
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
            'cart_id.required'      => 'ID do carrinho não informado.',
            'client_id.required'    => 'ID do cliente não informado.',
            'product_id.required'   => 'ID do produto não informado.',
            'product_id.exists'     => 'ID do produto não localizado.',
            'date.required'         => 'Data não informada.',
            'date.max'              => 'A data deve seguir o padrão YYYY (Ex. 2019).',
            'date.min'              => 'A data deve seguir o padrão YYYY (Ex. 2019).',
            'time.required'         => 'Horário não informado.',
            'time.min'              => 'O horário informado deve seguir o padrão H:i:s (EX. 13:01:01).',
            'time.max'              => 'O horário informado deve seguir o padrão H:i:s (EX. 13:01:01).',
        ];
    }
}
