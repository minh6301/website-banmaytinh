<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{
    //

    // function __construct(){
    //     $this -> middleware('CheckAdmin');
    // }

    function show(){
        // $users = Auth::user();
        // return $users->role->name;


        return view('admin.dashboard.dashboard' );  

        $users = User::with('role')->get();
        return $users;
    }
    
}
