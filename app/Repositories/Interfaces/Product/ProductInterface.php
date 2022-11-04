<?php

namespace App\Repositories\Interfaces\Product;

interface ProductInterface
{
    public function updateStock($id, $quantity);
    public function ingredientCheck($ingredient);
}
