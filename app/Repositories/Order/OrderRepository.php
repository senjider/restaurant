<?php

namespace App\Repositories\Order;

use App\Models\Order\Order;
use App\Models\Order\OrderDetails;

use App\Repositories\Interfaces\Order\OrderInterface;
use App\Repositories\Interfaces\Product\ProductInterface;

use Carbon\Carbon;
use DB;

class OrderRepository implements OrderInterface
{
    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

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
                if((isset($item['product_id']) && is_integer($item['product_id']))
                    &&
                   (isset($item['quantity']) && is_integer($item['quantity']))){

                    if($this->product->updateStock($item['product_id'], $item['quantity']))
                        OrderDetails::create([
                            'order_id' => $order->id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                        ]);
                }
            }
            return true;
        }
        return false;
    }
}
