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
                    'success' => __('Order done')
                ];
            } else {
                $data = [
                    'error' => 'Order failed'
                ];
            }
            DB::commit();
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => __('Oops.....Something Went Wrong')
            ]);
        }
    }
}
