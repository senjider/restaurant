<?php

namespace App\Http\Controllers\OrderDomain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\Order\OrderInterface;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    public function makeOrder(Request $request){
        DB::beginTransaction();
        try {
            $data = [
                'request' => $request->all(),
                'user' => auth()->user() ? auth()->user()->id : 0
            ];

            $order = $this->order->confirmOrder($data);

            if ($order) {
                $data = [
                    'status' => true,
                    'message' => 'Order Created!'
                ];
            } else {
                $data = [
                    'status' => false,
                    'message' => 'Order failed'
                ];
            }
            DB::commit();
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Oops.....Something Went Wrong'
            ]);
        }
    }
}
