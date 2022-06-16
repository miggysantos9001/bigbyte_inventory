<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Arr;
use Alert;
use App\Branch;
use App\Product;
use App\Product_category;
use App\Product_request;
use App\Product_request_item;
use App\Supplier;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;

class ProductRequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->usertype_id == 2){
            $data = Product_request::with('branch','supplier','requestedBy')
            ->orderBy('date','DESC')
            ->paginate(10);
        }else{
            $data = Product_request::with('branch','supplier','requestedBy')
            ->where('user_id',Auth::user()->id)
            ->orderBy('date','DESC')
            ->paginate(10);
        }
        
        $data->appends(Request::all());
        return view('admin.product-requests.index',compact('data'));
    }

    public function create(){
        //Session::forget('cart');
        //return Session::get('cart');
        $suppliers = Supplier::orderBy('name')->get()->pluck('name','id');
        $categories = Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.product-requests.create',compact('suppliers','categories'));
    }

    public function edit($id){
        $request = Product_request::find($id);
        $branches = Branch::orderBy('name')->get()->pluck('name','id');
        $suppliers = Supplier::orderBy('name')->get()->pluck('name','id');
        $categories = Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.product-requests.edit',compact('suppliers','categories','request','branches'));
    }

    public function update($id){
        $request = Product_request::find($id);
        $validator = Validator::make(Request::all(), [
            'branch_id'     =>      'required',
            'supplier_id'   =>      'required',
        ],
        [
            'branch_id.required'        =>  'Please Select Branch',
            'supplier_id.required'      =>  'Please Select Supplier',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $request->update(Request::except('qty','product_id','user_name'));
        foreach(Request::get('product_id') as $key => $value){
            Product_request_item::where('product_request_id',$request->id)->update([
                'date'                      =>      Request::get('date'),
                'product_id'                =>      $value,
                'qty'                       =>      Request::get('qty')[$key],
            ]);
        }

        Alert::success('Success', 'Product Request Updated Successfully');
        return redirect()->back();
    }

    public function addtoCart(){
        $cart = Session::get('cart', []);
        foreach(Request::get('products') as $key => $value){
            if(!empty($value['product_id'])){
                $product = Product::where('id',$value['product_id'])->first();
                $cart[$value['product_id']] = [
                    "product_id"    =>  $value['product_id'],
                    "catalog_num"   =>  $product->catalog_no,
                    "description"   =>  $product->description,
                    "qty"           =>  $value['qty'],
                ];
            }
        }
            
        Session::put('cart', $cart);
        Alert::success('Success', 'Product Added to Cart Successfully');
        return redirect()->back();
    }

    public function removetoCart($id){
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        Alert::success('Success', 'Product Removed to Cart Successfully');
        return redirect()->back();
    }

    public function createRequest(){
        $branches = Branch::orderBy('name')->get()->pluck('name','id');
        $suppliers = Supplier::orderBy('name')->get()->pluck('name','id');
        return view('admin.product-requests.create-request',compact('suppliers','branches'));
    }

    public function storeRequest(){
        $validator = Validator::make(Request::all(), [
            'branch_id'     =>      'required',
            'supplier_id'   =>      'required',
        ],
        [
            'branch_id.required'        =>  'Please Select Branch',
            'supplier_id.required'      =>  'Please Select Supplier',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $product_request_id = Product_request::create([
            'date'          =>      Request::get('date'),
            'branch_id'     =>      Request::get('branch_id'),
            'supplier_id'   =>      Request::get('supplier_id'),
            'user_id'       =>      Request::get('user_id'),
        ])->id;
        
        foreach(Request::get('product_id') as $key => $value){
            Product_request_item::create([
                'product_request_id'        =>      $product_request_id,
                'date'                      =>      Request::get('date'),
                'product_id'                =>      $value,
                'qty'                       =>      Request::get('qty')[$key],
            ]);
        }

        Session::forget('cart');
        Alert::success('Success', 'Product Request Created Successfully');
        return redirect()->route('product-requests.create');
    
    }

    public function delete_request_item($id){
        $item = Product_request_item::find($id);
        $item->delete();
        Alert::success('Success', 'Product Request Item Deleted Successfully');
        return redirect()->back();
    }

    public function approveRequest($id){
        $request = Product_request::find($id);
        $branches = Branch::orderBy('name')->get()->pluck('name','id');
        $suppliers = Supplier::orderBy('name')->get()->pluck('name','id');
        return view('admin.dashboard.requisition',compact('request','branches','suppliers'));
    }

    public function store_approveRequest($id){
        $request = Product_request::find($id);
        $request->update([
            'isApproved'        =>      1,
        ]);

        Alert::success('Success', 'Product Request Approved Successfully');
        return redirect()->route('dashboard.index');
    }
}
