<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
class AjaxRequest extends Controller
{
    //
    public function product_sort_by(Request $request)
    {
    	$data['products'] = Product::adminOrderProducts($request->order_by, Auth::id());
        return view('ajax/product_sort_by', $data);
    }

    public function product_user_sort_by(Request $request)
    {
    	$data['products'] = Product::orderProducts($request->order_by);
    	return view('ajax/product_user_sort_by', $data);	
    }
}
