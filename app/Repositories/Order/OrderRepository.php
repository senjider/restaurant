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

    /**
     * get order details
     *
     * @param    integer  $id order id
     *
     * @return object
     */
    public function getDetail($id)
    {
        return OrderDetail::find($id);
    }

    /**
     * store order with it\'s order details
     *
     * @param    array  $data
     *
     * @return boolean
     */
    public function confirmOrder($data):bool
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
