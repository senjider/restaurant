<?php

namespace App\Repositories\Product;

use App\Models\Product\Product;
use App\Repositories\Interfaces\Product\ProductInterface;

use Carbon\Carbon;
use DB;
use PhpParser\Node\Expr\Cast\Object_;

class ProductRepository implements ProductInterface
{
    /**
     * Update product ingredient stock
     *
     * @param    integer  $id product id
     * @param    integer  $quantity product quantity to deduct
     *
     * @return boolean
     */
    public function updateStock($id, $quantity):bool{
        $product = Product::where('id', $id)->first();
        if($product){
            $ingredients = $product->ingredients;
            foreach ($ingredients as $ingredient){

                $newStock = $ingredient->current_stock - ($quantity * $ingredient->consumes);
                $ingredient->update(['current_stock' => $newStock]);

                $this->ingredientCheck($ingredient);
            }
            return true;
        }
        return false;
    }

    /**
     * Check ingredient stock limit to send email alert
     *
     * @param    object  $ingredient
     *
     * @return void
     */
    public function ingredientCheck($ingredient):void{
        $merchantEmail = settingHelper('merchant_email');
        //alert mail once
        //alert_email can be reset to zero again once current stock gets updated by the merchant
        if($merchantEmail && !$ingredient->alert_email){
            $percentage = ($ingredient->current_stock * $ingredient->main_stock) / 100;
            if($percentage < $ingredient->alert_percentage_rate){
                //Send email to merchant
                $mailData = [
                    "subject"       => "Ingredient stock alert",
                    "purpose"       => "ingredient_stock_alert",
                    "ingredient"    => $ingredient->name,
                    "current_stock" => $ingredient->current_stock." ".$ingredient->weight,
                ];
                sendMailTo($merchantEmail, $mailData, 'new_clinic_order', '');

                $ingredient->update(['alert_email' => 1]);
            }
        }
    }
}
