<?php

namespace App\Repositories\Interfaces\Product;

interface ProductInterface
{
    public function updateStock($id, $quantity):bool;
    public function ingredientCheck($ingredient):void;
}
