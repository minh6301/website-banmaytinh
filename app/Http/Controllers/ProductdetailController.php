<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductdetailController extends Controller
{
    //

    public function show(){
        
        return view('view.view-productdetail');
    }

    public function detailProduct($id){
        $product = Product::find($id);
        // $similar_product = Product::with('color')->orderBy('tensanpham');
        // return $product->id;

        return view('view.view-productdetail', compact('product'));

    }

    public function searchProduct(Request $request){
        $searchProduct = $request -> input('searchProduct');
        $product = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->get();
        $countProduct = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->count();

        
        return view('view.view-seach-product', compact('product', 'searchProduct', 'countProduct'));
    }

    public function addToCart(Request $request){
        $product_id = $request -> input('product_id');
        $quantity = $request -> input('quantity');
        $user_id = Auth::user()->id;
        
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $data_cart = array("user_id" => $user_id, "product_id" => $product_id, "quantity" => $quantity);

            $cart_insert = DB::table('carts')->insert($data_cart);

            if($cart_insert == true)
            {
                return back();
            }
            else
            {
                return redirect() -> route('detail');
            }
        }
        else{
            return redirect() -> route('login');
        }
    }

    
}
