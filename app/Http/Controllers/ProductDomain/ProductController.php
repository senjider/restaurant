<?php
namespace App\Http\Controllers\ProductDomain;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Product\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function updateStock(Request $request){
        DB::beginTransaction();
        try {
            if ($request->product_id && $request->quantity) {
                $this->product->updateStock($request->product_id, $request->quantity);
                $data = [
                    'success' => __('Update stock done')
                ];
            } else {
                $data = [
                    'error' => 'product ID or quantity is missing'
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
