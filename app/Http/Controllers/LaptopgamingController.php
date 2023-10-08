<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class LaptopgamingController extends Controller
{
    //
    function show(){

        $category = Category::get();
        $product = Product::where('tensanpham', 'like', '%gaming%')->paginate(10);

        return view('view.view-laptopgaming', compact('category', 'product'));
    }
}
