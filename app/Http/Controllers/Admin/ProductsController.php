<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    //

    public function show(){
        $product = Product::with('color')->paginate(10);

        return view('admin.products.products', compact('product'));
    }

    public function showAdd(){
        $categorys = Category::get();
        $product = Color::get();

        return view('admin.products.add-product', compact('categorys', 'product'));
    }

    public function create(Request $request){
        $tensanpham = $request -> input('tensanpham');
        $slug = Str::slug($request->input('tensanpham'), "-");
        $color = $request -> input('color');
        $price = $request -> input('price');
        $dacdiemnoibat = $request -> input('dacdiemnoibat');
        $thongsokythuat = $request -> input('thongsokythuat');
        $category_id = $request -> input('category_id');
        $user_id = Auth::user() -> id;
        // $file = $request -> input('thumbnail');

        // if($request -> hasFile('file')){
        //     // Lấy tên file
        //     $file = $request->file;

        //     $filename =  $file -> getClientOriginalName();

        //     // Lấy đuôi file
        //     echo $file -> getClientOriginalExtension();

        //     // Lấy kích thước file
        //     echo $file -> getSize();

        //     $path = $file -> move('public/uploads', $filename);
        //     $thumbnail = 'public/uploads/'.$filename;

        //     $input['file'] = $thumbnail;
        // }

        if($request->hasfile('file'))
         {

            foreach($request->file('file') as $file)
            {
                $file_name =  $file -> getClientOriginalName();
                $file->move(public_path('public/uploads'), $file_name);
                $name = 'public/uploads/'.$file_name;
                $data= $name;
            }
         }
        
        $data_product = array( "tensanpham" => $tensanpham ,"dacdiemnoibat" => $dacdiemnoibat, "thongsokythuat" => $thongsokythuat, "category_id" => $category_id, "user_id" => $user_id, "file" => $name, "color"=> $color, "price"=>$price, "slug" => $slug);

        $product =  DB::table('products') -> insert($data_product);

        if($product == true){
            return redirect() -> route('products') -> with('status', 'Thêm thành công sản phẩm');
        }
        else{
            return redirect() -> route('products') -> with('status-fail', 'Thêm không thành công');
        }
    }

    // DELETE SAN PHAM
    public function delete($id){
        $delete = Product::where('id', $id) ->delete();

        if($delete == true){
            return redirect() -> route('products') -> with('status', 'Xoá thành công sản phẩm');
        }
        else{
            return redirect() -> route('products') -> with('status-fail', 'Xoá không không thành công');
        }
    }


    // UPDATE SAN PHAM
    public function updateForm($id) {
        $product_update = Product::find($id);
        $categorys = Category::get();

        return view('admin.products.update-product', compact('product_update','categorys' ));
    }

    public function update(Request $request, $id){
        $tensanpham = $request -> input('tensanpham');
        $slug = Str::slug($request->input('tensanpham'), "-");
        $color = $request -> input('color');
        $price = $request -> input('price');
        $dacdiemnoibat = $request -> input('dacdiemnoibat');
        $thongsokythuat = $request -> input('thongsokythuat');
        $category_id = $request -> input('category_id');
        $user_id = Auth::user() -> id;

        if($request->hasfile('file'))
         {

            foreach($request->file('file') as $file)
            {
                $file_name =  $file -> getClientOriginalName();
                $file->move(public_path('public/uploads'), $file_name);
                $name = 'public/uploads/'.$file_name;
                $data= $name;
            }
         }
        
        $data_product = array( "tensanpham" => $tensanpham ,"dacdiemnoibat" => $dacdiemnoibat, "thongsokythuat" => $thongsokythuat, "category_id" => $category_id, "user_id" => $user_id, "file" => $name, "color"=> $color, "price"=>$price, "slug" => $slug);

        $product =  DB::table('products') -> where('id', $id) -> update($data_product);

        if($product == true){
            return redirect() -> route('products') -> with('status', 'Sửa thành công sản phẩm');
        }
        else{
            return redirect() -> route('products') -> with('status-fail', 'Sửa không thành công sản phẩm');
        }
    }
}
