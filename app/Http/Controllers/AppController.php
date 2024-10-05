<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    function publicMessage(Request $request){
        return response('This message for everyone' , 200);
    }

    function secretMessage(Request $request){
        if(!Auth::check()){
            abort(403 , "please log in first");
        }
        return response('This message for logged in users' , 200);
    }


    function login(Request $request){
        $credentials = [
            'email' => 'johnson14@example.com',
            'password' => 'password'
        ];
        if(Auth::attempt($credentials)){
           return redirect()->route('dashboard');
        }else{
            return response('Login failed' , 401);
        }
    }

    function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
