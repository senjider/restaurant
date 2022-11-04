<?php

namespace App\Repositories\Interfaces\Order;

interface OrderInterface
{
    public function getDetail($id);
    public function confirmOrder($data);
}
