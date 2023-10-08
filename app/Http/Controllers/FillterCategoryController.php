<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FillterCategoryController extends Controller
{
    //
    public function fillterCategoryAcer(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-acer', compact('category', 'product'));
    }
    
    public function fillterCategoryAsus(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-asus', compact('category', 'product'));
    }

    public function fillterCategoryDell(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-dell', compact('category', 'product'));
    }

    public function fillterCategoryHp(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-hp', compact('category', 'product'));
    }

    public function fillterCategoryMacbook(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-macbook', compact('category', 'product'));
    }

    public function fillterCategoryLenovo(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-lenovo', compact('category', 'product'));
    }

    public function fillterCategoryMSI(){
        $category = Category::get();
        $product = Category::join('products', 'categories.id', '=', 'category_id' )->get();


        return view('view.view-product-msi', compact('category', 'product'));
    }
}
