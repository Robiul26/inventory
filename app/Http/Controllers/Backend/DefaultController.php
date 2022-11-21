<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function get_category(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $categories = Product::with('category')->select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->get();
        // dd($categories);
        return response()->json($categories);
    }
    public function get_product(Request $request)
    {
        $category_id = $request->category_id;
        $products = Product::where('category_id', $category_id)->get();
        return response()->json($products);
    }
}
