<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    //
     function __construct()
    {
        $this -> middleware('CheckRole');
    }

    public function show(){

        $roles = DB::table('roles') -> paginate(10);

        return view('admin.roles.roles', compact('roles'));
    }

    public function showAddRoles(){
        return view('admin.roles.add-roles');
    }


    function createRoles(Request $request){

        $name = $request -> input('name');

        $data_roles = array("name" => $name);

        DB::table('roles') -> insert($data_roles);

        return redirect() -> route('roles');
    }

    public function delete($id){
        $res = DB::table('roles')
            ->where('id',$id)
            ->delete();

        return redirect() -> route('roles');

    }

    // function permanetlyDelete($id){
    //     Roles::onlyTrashed()
    //         ->where('id', $id)
    //         ->forceDelete();
    // }
}
