<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;


class DashboardController extends Controller
{
	public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
    	$products = new Product();
    	$orders = new Order();
    	$users = new User();
    	return view('admin.dashboard', compact('products','orders','users'));
    }
}
