<?php

namespace App\Http\Controllers;

use App\Service\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private LoginService $loginService;

    public function __construct(LoginService $loginService){
        $this->loginService = $loginService;
    }

    public function login(Request $request){
        $request->validate([
            "username"=>'required',
            "password"=>'required'
        ]);
        $response=$this->loginService->login($request->input('username'),$request->input('password'));
        if($response["code"]==200){
            $request->session()->put('token',$response["data"]);
            return redirect("/dashboard");
        }
        else{
            return redirect("/login");
        }
    }

    public function loginForm(){
        return view('login/login');
    }
}
