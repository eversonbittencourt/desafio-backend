<?php

namespace App\Http\Requests\Api\Product;

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
            'product_id' => 'required|unique:products,product_id',
            'artist'     => 'required',
            'year'       => 'required|min:4|max:4',
            'album'      => 'required',
            'price'      => 'required',
            'store'      => 'required',
            'thumb'      => 'required',
            'date'       => 'required|min:10|max:10',
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
            'product_id.required'   => 'ID do produto não informado.',
            'product_id.unique'     => 'ID já existente em outro registro.',
            'artist.required'       => 'Artista não informado.',
            'yaar.required'         => 'Ano não informado.',
            'year.min'              => 'A data deve seguir o padrão YYYY (Ex. 01/01/2019).',
            'year.max'              => 'A data deve seguir o padrão YYYY (Ex. 2019).',
            'album.required'        => 'Album não informado.',
            'price.required'        => 'Valor não informado.',
            'store.required'        => 'Loja não',
            'thumb.required'        => 'Imagem não informada.',
            'date.required'         => 'Data não informada.',
            'date.min'              => 'A data deve seguir o padrão DD/MM/YYYY (Ex. 01/01/2019).',
            'date.max'              => 'A data deve seguir o padrão DD/MM/YYYY (Ex. 01/01/2019).',
        ];
    }
}
