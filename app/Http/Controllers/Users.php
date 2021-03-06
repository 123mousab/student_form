<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function login_get(){
        return view('auth/login');
    }
    public function login_post(){
//        return request()->all();
        $remember = request()->has('remember')?true:false;
        if(auth()->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
            return redirect('home');
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
