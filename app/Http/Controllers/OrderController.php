<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::all();
    	return view('admin.orders.index',compact('orders'));
    }

    public function confirm($id){
    	$order = Order::find($id);

    	$order->update(['status'=>1]);

    	session()->flash('msg','Order has been confirmed');

    	return redirect('admin/orders');
    }

    public function pending($id){
    	$order = Order::find($id);

    	$order->update(['status'=>0]);

    	session()->flash('msg','Order is pending');

    	return redirect('admin/orders');
    }

    public function show($id){
    	$order = Order::find($id);
    	return view('admin.orders.details',compact('order'));
    }
}