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
use App\Product_lost_damage;
use App\Product_lost_damage_item;
use App\Product_request;
use App\Product_request_item;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;

class ProductMissingDamageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data = Product_lost_damage::with('branch')
            ->orderBy('date','DESC')
            ->paginate(10);
        $data->appends(Request::all());
        return view('admin.product-lost-damages.index',compact('data'));
    }

    public function create(){
        $branches = Branch::orderBy('name')->get()->pluck('name','id');
        $categories = Product_category::orderBy('name')->get()->pluck('name','id');
        return view('admin.product-lost-damages.create',compact('branches','categories'));
    }

    public function store(){
        $validator = Validator::make(Request::all(), [
            'branch_id'         =>      'required',
            'subtwo_id'         =>      'required',
        ],
        [
            'branch_id.required'        =>  'Please Select Branch',
            'subtwo_id.required'        =>  'Please Select Category Two',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $lost_id = Product_lost_damage::create([
            "date"              =>      Request::get('date'),
            "branch_id"         =>      Request::get('branch_id'),
        ])->id;


        foreach(Request::get('products') as $key => $value){
            if(!empty($value['product_id'])){
                Product_lost_damage_item::create([
                    "lost_id"           =>      $lost_id,
                    "date"              =>      Request::get('date'),
                    "product_id"        =>      $value['product_id'],
                    "missing"           =>      $value['missing'],
                    "damage"            =>      $value['damage'],
                ]);
            }
        }

        Alert::success('Success', 'Product Lost and Missing Created Successfully');
        return redirect()->back();
        
    }

    public function edit($id){
        $lost = Product_lost_damage::find($id);
        if($lost->lost_items->count() == 0){
            $lost->delete();
            $data = Product_lost_damage::with('branch')
                ->orderBy('date','DESC')
                ->paginate(10);
            $data->appends(Request::all());
            return view('admin.product-lost-damages.index',compact('data'));
        }else{
            $branches = Branch::orderBy('name')->get()->pluck('name','id');
            return view('admin.product-lost-damages.edit',compact('branches','lost'));
        }
        
    }

    public function update($id){
        $lost = Product_lost_damage::find($id);
        $validator = Validator::make(Request::all(), [
            'branch_id'         =>      'required',
        ],
        [
            'branch_id.required'        =>  'Please Select Branch',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $lost->update([
            "date"              =>      Request::get('date'),
            "branch_id"         =>      Request::get('branch_id'),
        ]);

        foreach(Request::get('missing') as $key => $value){
            Product_lost_damage_item::updateOrCreate([
                'lost_id'       =>      $lost->id,
            ],[
                "date"          =>      Request::get('date'),
                'missing'       =>      $value,
                'damage'        =>      Request::get('damage')[$key],
            ]);
        }

        Alert::success('Success', 'Product Lost and Missing Updated Successfully');
        return redirect()->back();
    }

    public function delete($id){
        $item = Product_lost_damage_item::find($id);
        $item->delete();
        Alert::success('Success', 'Product Lost and Missing Item Deleted Successfully');
        return redirect()->back();

    }
}
