<?php

namespace App\Http\Controllers\Api;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Cart;

// Requests
use App\Http\Requests\Api\Cart\StoreRequest;

// Jobs
use App\Jobs\CreateCart;

class CartsController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreRequest $request) {

        $cart = $this->dispatchNow(new CreateCart($request->all()));

        if ( $cart ) {
            return response()->json(array("status" => "success", "message" => "Item inserido com sucesso."));
        } else {
            return response()->json(array("status" => "error", "message" => "Erro ao inserir item em carrinho."));
        }
    }
}
