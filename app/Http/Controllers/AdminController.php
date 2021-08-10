<?php

namespace App\Http\Controllers;
use App\Order;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function orders(){
        $orders = Order::get();

        $orders->transform(function($order,$key){

            $order->cart = unserialize($order->cart);
            
            return $order;
        });
        return view('admin.orders')->with('orders',$orders);
    }
}
