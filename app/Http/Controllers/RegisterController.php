<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //


    function showregister(){

        $roles = DB::table('roles')-> where('name', 'subcriber') -> first();

        return view('login.register', compact('roles'));
    }


    function store(Request $request){
        $request -> validate(
            [
                'name' => 'required|min:6|max:20',
                'email' => 'required|email',
                'password' => 'required|min:6|max:50',
                'confirm_password' => 'required|same:password'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được ít hơn :min ký tự',
                'max' => ':attribute không được nhiều hon :max ký tự'
            ],
            [
                'name' => 'Tên đăng nhập',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'confirm_password' => 'Mật khẩu xác nhận'
            ]
        );

        // $input = $request -> all();
        // $input['username'] = $username;
        // $input['password'] = $password;

        // insert data
        $username = $request -> input('name');
        $password = $request -> input('password');
        $email = $request -> input('email');
        $role = 3;


        $data_authors = array("name" => $username, "password" => Hash::make($password), "email" => $email, 'role_id' => $role);

        DB::table('users')-> insert($data_authors);

        return redirect('login') -> with('status', 'Đăng ký thành công !');

    }


}
