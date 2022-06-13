<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use Validator;
use Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(){
        $validator = Validator::make(Request::all(), [
            'name'          =>  'required',
            'password'      =>  'required',
        ],
        [
            'name.required'         =>  'Username Required',
            'password.required'     =>  'Password Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if (Auth::attempt(['name' => Request::input('name'), 'password' => Request::input('password'), 'isActive' => 0])) {
            return redirect()->route('dashboard.index');
        }else{
            Alert::error('Warning', 'Login Credentials Not Found');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
