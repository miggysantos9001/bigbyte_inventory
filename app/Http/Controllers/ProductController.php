<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Arr;
use Alert;
use App\Product_onhand;
use DB;
use Auth;


class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function loadsubone(){
        $id = Request::get('combobox1');
        $subone = \App\Product_sub_category::where('category_id',$id)->get();    
        return $subone;      
    }

    public function loadsubtwo(){
        $id = Request::get('combobox1');
        $subtwo = \App\Product_sub_two_category::where('subone_id',$id)->get();    
        return $subtwo;      
    }

    public function loadsubtwo_lf(){
        $id = Request::get('combobox2');
        $subtwo = \App\Product_sub_two_category::where('subone_id',$id)->get();    
        return $subtwo;      
    }

    public function loadproducts(){
        $id = Request::get('combobox3');
        $prod = \App\Product::where('subtwo_id',$id)->get();    
        return $prod;
    }

    public function index(){
        $categories = \App\Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.products.index',compact('categories'));
    }

    public function edit($id){
        $product = \App\Product::find($id);
        $categories = \App\Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update($id){
        $product = \App\Product::find($id);
        Product_onhand::updateOrCreate([
            'product_id'        =>      $product->id,
        ],[
            'on_hand'           =>      Request::get('on_hand'),
            'date'              =>      Request::get('date'),
        ]);
       
        Alert::success('Success', 'Product On Hand Updated Successfully');
        return redirect()->back();
    }
}
