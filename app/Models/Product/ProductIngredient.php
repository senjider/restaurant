<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['current_stock', 'alert_email'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
