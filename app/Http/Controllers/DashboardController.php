<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Arr;
use Alert;
use App\Product_request;
use DB;
use Auth;
use Location;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->usertype_id == 2){
            $requests = Product_request::where('isApproved',0)->orderBy('date','DESC')->get();
        }else{
            $requests = Product_request::where('isApproved',0)
                ->where('user_id',Auth::user()->id)
                ->orderBy('date','DESC')->get();
        }
        
        return view('admin.dashboard',compact('requests'));
    }

    public function view_changepassword($id){
        $user = \App\User::find(Auth::user()->id);
        return view('admin.change-password',compact('user'));
    }

    public function post_changepassword($id){
        $user = \App\User::find(Auth::user()->id);
        $validator = Validator::make(Request::all(), [
            'password'              =>  'required',
        ],
        [
            'password.required'     =>  'Password Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->update([
            'password'  =>      \Hash::make(preg_replace('/\s+/', '',Request::get('password'))),
        ]);

        Alert::success('Success', 'Password Changed Successfully');
        return redirect()->back();
    }

}
