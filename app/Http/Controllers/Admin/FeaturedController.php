<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Featured;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;


class FeaturedController extends Controller
{
    //
    public function show(){

        $image = Featured::with('product')->get();

        return view('admin.image.image', compact('image'));
    }

    public function formAdd(){

        $product = Product::get();

        return view('admin.image.add-image', compact('product'));
    }

    public function create(Request $request){
        $product_id = $request -> input('product_id');
        $user_id = Auth::user() ->id;

        if($request->hasfile('file'))
         {

            foreach($request->file('file') as $file)
            {
                $file_name =  $file -> getClientOriginalName();
                $file->move(public_path('public/uploads'), $file_name);
                $thumbnail = 'public/uploads/'.$file_name;
                $data= $thumbnail;
            }
         }


        $data_image = array("product_id" => $product_id, "user_id" => $user_id,"file" => $thumbnail);
            $file_image = DB::table('featureds')->insert($data_image);

            if($file_image == true){
                return redirect() -> route('featured') -> with('status' , "Thêm thành công");
            } 
            else{
                return redirect() -> route('featured')-> with('status-fail' , "Thêm không thành công");
            }

        
        // $files = [];
        // if ($request->hasFile('file')){
        //     foreach($request->file('file') as $key => $file)
        //     {
        //         $file_name =  $file -> getClientOriginalName();
        //         $file->move(public_path('public/uploads'), $file_name);
        //         $thumbnail = 'public/uploads/'.$file_name;
        //         $files[]['file'] = $thumbnail;
                
        //     }
        // }

        
        // foreach ($files as $key => $file) {
            
        //     $data_image = array("product_id" => $product_id, "user_id" => $user_id);
        //     $file_image = DB::table('featureds')->insert($data_image);
            
        //     // $files_img = Featured::create($file);

        //     if($file_image == true){
        //         return redirect() -> route('featured') -> with('status' , "Thêm thành công");
        //     } 
        //     else{
        //         return redirect() -> route('featured')-> with('status-fail' , "Thêm không thành công");
        //     }
        // }
         

    }

    public function delete($id){
        $delete = Featured::find($id)->delete();

        if($delete == true){
            return redirect() -> route('featured') -> with('status' , "Xoá thành công");
        } 
        else{
            return redirect() -> route('featured')-> with('status-fail' , "Xoá không thành công");
        }
    }
}
