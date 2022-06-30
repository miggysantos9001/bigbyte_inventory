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

        $df = Request::get('date_from');
        $dt = Request::get('date_to');
        $subtwo = Request::get('subtwo_id');
        $count = 1;
        $list = [];

        $products = Product::with('subtwo','onhand','requisitions','delivered')->where('subtwo_id',Request::get('subtwo_id'))
            ->orderBy('description')
            ->get();
        
        foreach($products as $product){
            $p_onhand = \App\Product_onhand::where('date','>=',$df)
                ->where('date','<=',$dt)
                ->where('product_id',$product->id)
                ->sum('on_hand');
            
            $p_add = $product->requisitions->where('date','>=',$df)
                ->where('date','<=',$dt)
                ->sum('qty');
            
            $p_delivered = $product->delivered->where('date','>=',$df)
                ->where('date','<=',$dt)->where('isPulledout',0)
                ->sum('qty_delivered');
            
            $p_used = $product->delivered->where('date','>=',$df)
                ->where('date','<=',$dt)->where('isPulledout',1)
                ->sum('qty_used');
            
            $p_missing = $product->lost_missing->where('date','>=',$df)
                ->where('date','<=',$dt)
                ->sum('missing');
            
            $p_damage = $product->lost_missing->where('date','>=',$df)
                ->where('date','<=',$dt)
                ->sum('damage');

            $list[] = array(
                "count"             =>      $count,
                "catalog_no"        =>      $product->catalog_no,
                "description"       =>      $product->description,
                "p_onhand"          =>      $p_onhand,
                "p_add"             =>      $p_add,
                "p_delivered"       =>      $p_delivered,
                "p_used"            =>      $p_used,
                "p_missing"         =>      $p_missing,
                "p_damage"          =>      $p_damage,
                "available"         =>      ($p_onhand + $p_add) - ($p_delivered + $p_used + $p_missing + $p_damage),
            );

            $count++;
        }
        
        return view('admin.inventories.getResult',compact('products','df','dt','list','subtwo'));
    }

    public function printResult(){
        $df = Request::get('df');
        $dt = Request::get('dt');
        $subtwo = Request::get('subtwo');

        $setting = \App\Setting::orderBy('id','DESC')->first();

        $count = 1;
        $list = [];

        $products = Product::with('subtwo','onhand','requisitions','delivered')->where('subtwo_id',$subtwo)
            ->orderBy('description')
            ->get();
        
        foreach($products as $product){
            $p_onhand = \App\Product_onhand::where('date','>=',$df)
                ->where('date','<=',$dt)
                ->where('product_id',$product->id)
                ->sum('on_hand');
            
            $p_add = $product->requisitions->where('date','>=',$df)
                ->where('date','<=',$dt)
                ->sum('qty');
            
            $p_delivered = $product->delivered->where('date','>=',$df)
                ->where('date','<=',$dt)->where('isPulledout',0)
                ->sum('qty_delivered');
            
            $p_used = $product->delivered->where('date','>=',$df)
                ->where('date','<=',$dt)->where('isPulledout',1)
                ->sum('qty_used');
            
            $p_missing = $product->lost_missing->where('date','>=',$df)
                ->where('date','<=',$dt)
                ->sum('missing');
            
            $p_damage = $product->lost_missing->where('date','>=',$df)
                ->where('date','<=',$dt)
                ->sum('damage');

            $list[] = array(
                "count"             =>      $count,
                "catalog_no"        =>      $product->catalog_no,
                "description"       =>      $product->description,
                "p_onhand"          =>      $p_onhand,
                "p_add"             =>      $p_add,
                "p_delivered"       =>      $p_delivered,
                "p_used"            =>      $p_used,
                "p_missing"         =>      $p_missing,
                "p_damage"          =>      $p_damage,
                "available"         =>      ($p_onhand + $p_add) - ($p_delivered + $p_used + $p_missing + $p_damage),
            );

            $count++;
        }
        
        return View('admin.pdf.inventory',compact('products','df','dt','list','subtwo','setting'));
    }
}
