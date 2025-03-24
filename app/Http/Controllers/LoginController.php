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
            if($response["data"]){
                $request->session()->put('admin',true);
                return redirect("/dashboard");
            }
            else{
                return redirect("/login");
            }
        }
    }

    public function loginForm(){
        return view('login/login');
    }
}
