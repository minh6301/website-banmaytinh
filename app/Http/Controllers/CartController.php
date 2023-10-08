<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function show(){
        $cart = Cart::with('product')->get();
    
        
        return view('view.view-cart', compact('cart'));
    }

    public function delete($id){
        $delete = Cart::find($id)->delete();

        if($delete==true){
            return redirect() -> route('cart');
        }
        else{
            return redirect() -> route('cart');
        }
    }


}
