<?php

namespace App\Http\Controllers\Api;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Order;

// Requests
use App\Http\Requests\Api\Order\StoreRequest;

// Jobs
use App\Jobs\CreateOrder;

class OrdersController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreRequest $request) {

        $order = $this->dispatchNow(new CreateOrder($request->all()));

        if ( $order ) {
            return response()->json(array("status" => "success", "message" => 'Venda Efeturada - Ordem: ' . $order->id ));
        } else {
            return response()->json(array("status" => "error", "message" => "Erro ao efetuar a venda."));
        }
    }

    /**
     * @return Illuminate\Http\Response
     */
     public function history() {
        $orders = Order::all();
        if ( $orders ) {
            $result = [];
            foreach ( $orders as $order ) {
                $result[] = $this->filterFields($order);
            }
            return response()->json($result);
        }
        return response()->json(array("status" => "error", "message" => "Nenhuma ordem localizada."));
     }

     /**
      * @param string $client_id
      * @return Illuminate\Http\Response
      */
     public function historyByClient($client_id) {
         $orders = Order::where('client_id', $client_id)->get();
         if ( $orders ) {
             $result = [];
             foreach ( $orders as $order ) {
                 $result[] = $this->filterFields($order);
             }
             return response()->json($result);
         }
         return response()->json(array("status" => "error", "message" => "Nenhuma ordem localizada."));
     }

     /**
      * @param Order $order
      * @return array $data
      */
     public function filterFields(Order $order) {
          $data = collect($order)
             ->only('client_id')
             ->put('order_id', $order->id)
             ->put('value', $order->total_to_pay)
             ->put('date', $order->date)
             ->put('card_number', $order->card_number)
             ->toArray();

            return $data;

     }


}
