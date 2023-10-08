<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function show(){
        $categories = DB::table('categories')-> paginate(20);

        return view('admin.category.category', compact('categories'));
    }

    public function showAdd(){

        return view('admin.category.add-category');
    }

    public function create(Request $request){
        $name = $request -> input('name');
        // $create_by = Auth::user()->id;
        

        $input = $request -> except('_token');
        
        if($request -> hasFile('file')){
            // Lấy tên file
            $file = $request->file;

            $filename =  $file -> getClientOriginalName();

            // Lấy đuôi file
            echo $file -> getClientOriginalExtension();

            // Lấy kích thước file
            echo $file -> getSize();

            $path = $file -> move('public/uploads', $filename);
            $thumbnail = 'public/uploads/'.$filename;

            $input['thumbnail'] = $thumbnail;
        }

        $category_i = Category::create($input);

        if($category_i == true){
            return redirect() -> route('category') -> with('status', 'Thêm thành công ');
        }
        else{
            return redirect() -> route('category') -> with('status-fail', 'Thêm không thành công');
        }
    }


    public function delete($id){
        DB::table('categories')
            -> where('id', $id)
            -> delete();

        return redirect() -> route('category');
    }

    public function formUpdate($id){
        $category = Category::find($id);
        return view('admin.category.update-category', compact('category'));
    }

    public function update(Request $request, $id){
        $input = $request -> except('_token');
        
        if($request -> hasFile('file')){
            // Lấy tên file
            $file = $request->file;

            $filename =  $file -> getClientOriginalName();

            // Lấy đuôi file
            echo $file -> getClientOriginalExtension();

            // Lấy kích thước file
            echo $file -> getSize();

            $path = $file -> move('public/uploads', $filename);
            $thumbnail = 'public/uploads/'.$filename;

            $input['thumbnail'] = $thumbnail;
        }

        $update = Category::find($id) -> update($input);

        if($update == true){
            return redirect() -> route('category') -> with('status', 'Cập nhật thành công');
        }
        else{
            return redirect() -> route('category') -> with('status-fail', 'Cập nhật không thành công');
        }

    }
}
