<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    function show(){
        $roles = User::with('role')->paginate(20);

        return view('admin.users.users', compact( 'roles'));
    }

    function formAddUser(){
        $roles = DB::table('roles')->pluck('name', 'id');

        return view('admin.users.add-user', compact('roles'));

    }

    // inser user
    function checkAdd(Request $request){
        $request -> validate(
            [
                'name' => 'required|min:5|max:20',
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


        $name = $request -> input('name');
        $email = $request -> input('email');
        $password = $request -> input('password');
        $role = $request -> input('role_id');
        // $create_by = Auth::user() -> id;



        $data_user = array("name" => $name, "password" => Hash::make($password), "email" => $email , "role_id" => $role);

        DB::table('users') -> insert($data_user);

        return redirect() -> route('users');
    }


    // delete user
    public function delete($id){
        DB::table('users')
            -> where('id', $id)
            -> delete();

        return redirect() -> route('users');
    }

    public function formupdate($id){
        $user = DB::table('users')-> find($id);
        $roles = DB::table('roles')
            ->pluck('name');

        return view('admin.users.update-user' , compact('user', 'roles'));
    }

    public function update(Request $request ){
        $request -> validate(
            [
                'name' => 'required|min:5|max:20',
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

        $name = $request -> input('name');
        $email = $request -> input('email');
        $password = $request -> input('password');
        $roles = $request -> input('role_id');

        $data_user = array("name" => $name, "password" => Hash::make($password), "email" => $email , "role_id" => $roles);

        DB::table('users')-> update($data_user);


        return redirect() -> route('users');
    }

    public function search(Request $request){
        $inputSearch = $request -> input('search');

        $roles = User::where('email', 'Like', '%'.$inputSearch.'%') ->get();

        return view('admin.users.users', compact('roles'));;
    }

}
