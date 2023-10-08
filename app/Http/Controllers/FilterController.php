<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FilterController extends Controller
{
    //
    public function sortAsc(){
        $category = Category::get();
        $product = Product::orderBy('price', 'asc')->get();

        return view('view.view-laptopwindow', compact('category', 'product'));
        return view('view.view-product-acer', compact('category', 'product'));
        return view('view.view-product-asus', compact('category', 'product'));
        return view('view.view-product-hp', compact('category', 'product'));
        return view('view.view-product-macbook', compact('category', 'product'));
        return view('view.view-product-lenovo', compact('category', 'product'));
        return view('view.view-product-msi', compact('category', 'product'));
        return view('view.view-product-dell', compact('category', 'product'));

    }

    public function sortDesc(){
        $category = Category::get();
        $product = Product::orderBy('price', 'desc')->get();

        return view('view.view-laptopwindow', compact('category', 'product'));
        return view('view.view-product-acer', compact('category', 'product'));
        return view('view.view-product-asus', compact('category', 'product'));
        return view('view.view-product-hp', compact('category', 'product'));
        return view('view.view-product-macbook', compact('category', 'product'));
        return view('view.view-product-lenovo', compact('category', 'product'));
        return view('view.view-product-msi', compact('category', 'product'));
        return view('view.view-product-dell', compact('category', 'product'));

    }
}
