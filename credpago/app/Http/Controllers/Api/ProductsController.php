<?php

namespace App\Http\Controllers\Api;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Product;

// Requests
use App\Http\Requests\Api\Product\StoreRequest;

// Jobs
use App\Jobs\CreateProduct;

class ProductsController extends Controller
{

    /**
     * @param StoreRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreRequest $request) {

        $product = $this->dispatchNow(new CreateProduct($request->all()));

        if ( $product ) {
            return response()->json(array("status" => "success", "message" => "Produto cadastrado."));
        } else {
            return response()->json(array("status" => "error", "message" => "Erro ao inserir o produto."));
        }
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function all() {
        $products = Product::get(['product_id', 'artist', 'year', 'album', 'price', 'store', 'thumb', 'date'])->all();

        return response()->json($products);
    }
}
