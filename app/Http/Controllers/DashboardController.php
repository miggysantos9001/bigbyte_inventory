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
use Location;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('admin.dashboard');
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
