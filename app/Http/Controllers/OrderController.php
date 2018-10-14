<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(10);
        return view('admin.orders.index',compact('orders'));
    }
    public function confirm($id){
        $order = Order::findOrFail($id);
        $order->update(['status'=> 1]);
        session()->flash('msg','Order had been Confirmed Successfully');
        return redirect()->back();
    }
    public function pending($id){
        $order = Order::findOrFail($id);
        $order->update(['status'=> 0]);
        session()->flash('msg','Order had been Pending Successfully');
        return redirect()->back();
    }
    public function show($id){
        $order = Order::findOrFail($id);
        return view('admin.orders.details',compact('order'));
    }

}
