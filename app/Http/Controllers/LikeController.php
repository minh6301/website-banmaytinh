<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    //
    public function showLike(){
        $likes = Like::with('product')->get();

        return view('view.view-likes', compact('likes'));
    }

    public function createLike(Request $request){
        $product_id = $request -> input('product_id');
        $user_id = Auth::user()->id;
        
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $data_cart = array("user_id" => $user_id, "product_id" => $product_id);

            $cart_insert = DB::table('likes')->insert($data_cart);

            if($cart_insert == true)
            {
                return back();
            }
            else
            {
                return redirect() -> route('layout.computech');
            }
        }
        else{
            return redirect() -> route('login');
        }
    }

    public function deleteLike($id){
        $delete = Like::find($id)->delete();

        if($delete==true){
            return back();
        }
        else{
            return back();
        }
    }
}
