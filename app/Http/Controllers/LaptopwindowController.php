<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\CursorPaginator;

class LaptopwindowController extends Controller
{
    //
    function show(){
        $category = Category::get();
        $product = Product::with('color')->get();
        // ->paginate(10);

        return view('view.view-laptopwindow', compact('category', 'product'));
    }
    
    public function sortAsc(){
        $category = Category::get();
        $product = Product::orderBy('price', 'asc')->get();

        return view('view.view-laptopwindow', compact('category', 'product'));

    }

    public function sortDesc(){
        $category = Category::get();
        $product = Product::orderBy('price', 'desc')->get();

        return view('view.view-laptopwindow', compact('category', 'product'));

    }

    
}
