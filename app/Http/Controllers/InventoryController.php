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
use DB;
use Auth;

class InventoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $categories = Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.inventories.index',compact('categories'));
    }

    public function getResult(){
        $validator = Validator::make(Request::all(), [
            'subtwo_id'                 =>      'required',
        ],
        [
            'subtwo_id.required'        =>      'Please Select Category Two',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $products = Product::with('subtwo','onhand','requisitions','delivered')->where('subtwo_id',Request::get('subtwo_id'))
            ->orderBy('description')
            ->get();
        
        return view('admin.inventories.getResult',compact('products'));
    }

    public function printResult(){

    }
}
