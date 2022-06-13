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

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $searchName = Request::get('searchName');
        if($searchName != NULL){
            $data = \App\User::query()->select('id','name','usertype_id')
                ->where('name','LIKE',"%{$searchName}%")
                ->where('isActive',0)
                ->orderBy('name')
                ->paginate(10);
        }else{
            $data = \App\User::query()->select('id','name','usertype_id')
                ->where('isActive',0)
                ->orderBy('name')
                ->paginate(10);
        }

        $data->appends(Request::all());
        $usertypes = \App\Usertype::orderBy('name')->get()->pluck('name','id');
        return view('admin.users.index',compact('data','usertypes'));
    }

    public function store(){
        $validator = Validator::make(Request::all(), [
            'name'              =>  'required|unique:users',
            'usertype_id'       =>  'required',
        ],
        [
            'name.required'             =>  'Username Required',
            'usertype_id.required'      =>  'Please Select Usertype',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        \App\User::create([
            'name'              =>      Request::get('name'),
            'usertype_id'       =>      Request::get('usertype_id'),
            'password'          =>      \Hash::make(preg_replace('/\s+/', '',strtolower(Request::get('name')))),
        ]);

        Alert::success('Success', 'User Created Successfully');
        return redirect()->back();
    }

    public function update($id){
        $user = \App\User::find($id);
        $validator = Validator::make(Request::all(), [
            'name'              =>  "required|unique:users,name,$user->id,id",
            'usertype_id'       =>  'required',
        ],
        [
            'name.required'             =>  'Username Required',
            'usertype_id.required'      =>  'Please Select Usertype',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'name'              =>      Request::get('name'),
            'usertype_id'       =>      Request::get('usertype_id'),
        ]);

        Alert::success('Success', 'User Updated Successfully');
        return redirect()->back();
    }
}
