<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    //
    public function show(){
        $color = Color::with('product')->simplePaginate(20);

        return view('admin.color-porduct.color-product', compact('color'));
    }

    public function formAdd(){
        $product = Product::get();

        return view('admin.color-porduct.add-color', compact('product'));
    }

    public function create(Request $request){
        $tensanpham = $request -> input('tensanpham');
        $name = $request -> input('name');
        $price = $request -> input('price');
        // $user_id = Auth::user() ->id;

        $data_color = array("tensanpham" => $tensanpham, "name" => $name, "price" => $price,);

        $insert_color = DB::table('colors')->insert($data_color);

        if($insert_color == true){
            return redirect() -> route('color') -> with('status', 'Thêm thành công');
        }
        else
        {
            return redirect() -> route('color') -> with('status-fail', 'Thêm không thành công');

        }
    }

    public function delete($id){
        $delete = DB::table('colors') ->where('id', $id) -> delete();

        if($delete == true){
            return redirect() -> route('color') -> with('status', 'Xoá thành công');
        }
        else
        {
            return redirect() -> route('color') -> with('status-fail', 'Xoá không thành công');
            
        }
    }

    public function formUpdate($id){
        $product = Product::pluck('tensanpham', 'id');
        $color = Color::find($id);

        return view('admin.color-porduct.update-color', compact('product', 'color'));
    }

    public function updateColor(Request $request, $id){
        $input_color = $request -> except('_token');

        $updateColor = Color::find($id)->update($input_color);
        if($updateColor == true){
            return redirect() -> route('color') -> with('status', 'Sửa thành công');
        }
        else
        {
            return redirect() -> route('color') -> with('status-fail', 'Sửa không thành công');
            
        }
    }

    public function searchColor(Request $request){
        $inputSearch = $request -> input('search');
        $name = Color::with('product')->get();

        $color = Color::where('name', 'Like', '%'.$inputSearch.'%') ->get();

        return view('admin.color-porduct.color-product', compact('color'));;
    }

}
