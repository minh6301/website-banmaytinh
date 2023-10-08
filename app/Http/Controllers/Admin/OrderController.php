<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function showOrder(){
        $order = Order::get();

        return view('admin.order.order', compact('order'));
    }
}
