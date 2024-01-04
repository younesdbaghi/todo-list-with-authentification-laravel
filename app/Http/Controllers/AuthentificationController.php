<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
    public function ShowLoginForm(){
        return view("TaskViews.formLogin");
    }

    public function se_connecter(Request $request){
        $login = $request->txtEmail;
        $password = $request->txtPassword;
        $credentials = [
            "email" => $login,
            "password" => $password
        ];

        // dd(Auth::attempt($credentials));
        // dd($credentials);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('tasks');
        }
        else{
            return redirect()->route('login')->with('login-error', 'L\'email ou mot de passe incorrect');
        }
    }

    public function Logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route("login");
    }
    
}
