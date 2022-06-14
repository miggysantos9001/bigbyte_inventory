<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Arr;
use Alert;
use App\Product;
use App\Product_category;
use App\Supplier;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;

class ProductRequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        //return Session::get('cart');
        $suppliers = Supplier::orderBy('name')->get()->pluck('name','id');
        $categories = Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.product-requests.create',compact('suppliers','categories'));
    }

    public function addtoCart(){
        //$product = Product::find($id);
        $cart = Session::get('cart', []);

        // if(isset($cart[$id])) {
        //     $cart[$id]['qty']++;
        // } else {
            
        foreach(Request::get('products') as $key => $value){
            if(!empty($value['product_id'])){
                $cart[] = [
                    "product_id"    =>  $value['product_id'],
                    "qty"           =>  $value['qty'],
                ];
            }
        }
            
        //}
            
        //dd($cart);
        Session::put('cart', $cart);
        Alert::success('Success', 'Product Added to Cart Successfully');
        return redirect()->back();
    }
}
