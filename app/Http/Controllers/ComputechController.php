<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Color;
use Illuminate\Support\Facades\DB;


class ComputechController extends Controller
{
    //
    public function show(){
        // $laptop_gaming = Product::join('colors', 'product_id' ,'=', 'products.id')->get();

        $product = Product::with('color')->limit(10)->get();
        $laptop_gaming = Product::with('color')->where('tensanpham','like', '%gaming%')->limit(15)->get();
        $macos = Product::where('tensanpham','like', '%Macbook%')->limit(15)->get();
        $laptop = Product::where('tensanpham','!=', '%Macbook%')
        ->orWhere('tensanpham','!=', '%Gaming%')
        ->limit(15)
        ->get();


        return view('view.view-trangchu', compact('product', 'laptop_gaming', 'macos', 'laptop'));
    }


    public function searchProduct(Request $request){
        $searchProduct = $request -> input('searchProduct');
        $product = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->get();
        $countProduct = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->count();


        return view('view.view-seach-product', compact('product', 'searchProduct', 'countProduct'));
    }

    public function sortAsc(Request $request){
        $category = Category::get();
        $searchProduct = $request -> input('searchProduct');
        $product = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->orderBy('price', 'asc');
        $countProduct = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->count();

        return view('view.view-seach-product', compact('category', 'product', 'searchProduct','countProduct'));

    }

    public function sortDesc(Request $request){
        $category = Category::get();
        $product = Product::orderBy('price', 'desc')->get();
        $searchProduct = $request -> input('searchProduct');
        $countProduct = Product::where('tensanpham', 'like', '%'.$searchProduct.'%')->count();


        return view('view.view-seach-product', compact('category', 'product', 'searchProduct','countProduct'));
    }

    

}
