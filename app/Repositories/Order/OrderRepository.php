<?php

namespace App\Repositories\Order;

use App\Models\Order\Order;
use App\Models\Order\OrderDetails;

use App\Repositories\Interfaces\Order\OrderInterface;
use Carbon\Carbon;
use DB;

class OrderRepository implements OrderInterface
{
    public function getDetail($id)
    {
        return OrderDetail::find($id);
    }

    public function confirmOrder($data)
    {
        $order = Order::create([
            'user_id'   => $data['user'],
            'date'      => now(),
        ]);

        if($order){
            foreach ($data['request']['products'] as $item) {

                OrderDetails::create([
                    'order_id'          => $order->id,
                    'product_id'        => $item['product_id'],
                    'quantity'          => $item['quantity'],
                ]);

                $this->product->updateStock($item['product_id'], $item['quantity']);
            }

            return true;
        }
        return false;
    }
}
