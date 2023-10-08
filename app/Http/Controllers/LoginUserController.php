<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginUserController extends Controller
{
    //

    public function showlogin(){
        return view('login.signin');
    }

    
    public function checkLogin(Request $request){

        $request -> validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:50'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được ít hơn :min ký tự',
                'max' => ':attribute không được nhiều hon :max ký tự',
                'email' => 'Không đúng định dạng email'
            ],
            [
                'email' => 'Email',
                'password' => 'Mật khẩu'
            ]
        );

        if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password])){
            $user = User::where('email', $request -> email) -> first();
            Auth::login($user);

            return redirect() -> route('layouts.computech');
        }
        else{
            return redirect() -> route('login') ->with('status-fail', 'Email hoặc mật khẩu không chính xác');
        }
        

    }

    public function logout(){
        Auth::logout();
        return redirect() -> route('login');
    }

}
