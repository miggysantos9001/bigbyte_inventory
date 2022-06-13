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

class SupplierController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $searchName = Request::get('searchName');
        if($searchName != NULL){
            $data = \App\Supplier::query()->select('id','name','address','email','mobile','contact_person')
                ->where('name','LIKE',"%{$searchName}%")
                ->where('isActive',0)
                ->orderBy('name')
                ->paginate(10);
        }else{
            $data = \App\Supplier::query()->select('id','name','address','email','mobile','contact_person')
                ->where('isActive',0)
                ->orderBy('name')
                ->paginate(10);
        }

        $data->appends(Request::all());
        return view('admin.suppliers.index',compact('data'));
    }

    public function store(){
        $validator = Validator::make(Request::all(), [
            'name'                  =>  'required',
            'address'               =>  'required',
            'email'                 =>  'required',
            'mobile'                =>  'required',
            'contact_person'        =>  'required',
        ],
        [
            'name.required'             =>  'Supplier Name Required',
            'address.required'          =>  'Supplier Address Required',
            'email.required'            =>  'Supplier Email Required',
            'mobile.required'           =>  'Supplier Contact # Required',
            'contact_person.required'   =>  'Supplier Contact Person Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        \App\Supplier::create(Request::all());
        Alert::success('Success', 'Supplier Created Successfully');
        return redirect()->back();
    }

    public function update($id){
        $supplier = \App\Supplier::find($id);
        $validator = Validator::make(Request::all(), [
            'name'                  =>  'required',
            'address'               =>  'required',
            'email'                 =>  'required',
            'mobile'                =>  'required',
            'contact_person'        =>  'required',
        ],
        [
            'name.required'             =>  'Supplier Name Required',
            'address.required'          =>  'Supplier Address Required',
            'email.required'            =>  'Supplier Email Required',
            'mobile.required'           =>  'Supplier Contact # Required',
            'contact_person.required'   =>  'Supplier Contact Person Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $supplier->update(Request::all());
        Alert::success('Success', 'Supplier Updated Successfully');
        return redirect()->back();
    }

    public function delete($id){

    }
}
