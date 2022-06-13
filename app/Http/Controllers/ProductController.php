<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Arr;
use Alert;
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

    public function create(){
        $categories = \App\Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.products.create',compact('categories'));
    }

    public function store(){
        $validator = Validator::make(Request::all(), [
            'subtwo_id'     =>      'required',
            'description'   =>      'required|unique:products',
            'catalog_no'    =>      'required',
            'uom_id'        =>      'required',
        ],
        [
            'subtwo_id.required'        =>  'Product Sub Two Category Required',
            'description.required'      =>  'Description Required',
            'catalog_no.required'       =>  'Catalog Number Required',
            'uom_id.required'           =>  'Unit of Measure Required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        \App\Product::create(Request::except('category_id','subone_id'));
        Alert::success('Success', 'Product Created Successfully');
        return redirect()->back();
    }

    public function edit($id){
        $product = \App\Product::find($id);
        $categories = \App\Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update($id){
        $product = \App\Product::find($id);
        $validator = Validator::make(Request::all(), [
            'subone_id'     =>      'required',
            'subtwo_id'     =>      'required',
            'description'   =>      "required|unique:products,description,$product->id,id",
            'catalog_no'    =>      'required',
            'uom_id'        =>      'required',
        ],
        [
            'subone_id.required'        =>  'Product Sub One Category Required',
            'subtwo_id.required'        =>  'Product Sub Two Category Required',
            'description.required'      =>  'Description Required',
            'catalog_no.required'       =>  'Catalog Number Required',
            'uom_id.required'           =>  'Unit of Measure Required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $product->update(Request::except('category_id','subone_id'));
        Alert::success('Success', 'Product Updated Successfully');
        return redirect()->back();
    }
}
