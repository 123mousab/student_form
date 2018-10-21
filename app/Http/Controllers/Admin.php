<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function login_get(){
        return view('auth/login_admin');
    }
    public function login_post(){
//        return request()->all();
        $remember = request()->has('remember')?true:false;
        if(auth()->guard('webAdmin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
            return redirect('admin/path');
        }else{
            return back();
        }
        /*if(Auth::attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
            return redirect('home');
        }else{
            return back();
        }*/
    }
}
