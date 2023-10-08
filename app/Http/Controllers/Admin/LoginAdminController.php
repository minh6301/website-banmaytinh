<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginAdminController extends Controller
{
    //

    public function showlogin(){
        return view('admin.login.login');
    }

    
    public function store(Request $request){

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

            return redirect() -> route('dashboard');
        }
        else{
            return redirect() -> route('admin.login') -> with('status', 'Email hoặc Mật khẩu chưa chính xác');
        }
        

    }

    public function logout(){
        Auth::logout();
        return redirect() -> route('admin.login');
    }
}
