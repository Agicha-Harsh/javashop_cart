<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Carbon\Carbon;
use Mockery\Exception;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	return view('front.checkout.index');
    }

    public function store(Request $request) {

        $contents = Cart::instance('default')->content()->map(function($item) {
            return $item->model->name . ' ' . $item->qty;
        })->values()->toJson();

        try {

            Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'INR',
                'source' => $request->stripeToken,
                'description' => 'Some Text',
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count()
                ]
            ]);


            // Insert into orders table
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'date' => Carbon::now(),
                'address' => $request->address,
                'status' => 0
            ]);

            // Insert into order items table
            foreach (Cart::instance('default')->content() as $item) {

                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                    'price' => $item->price
                ]);

            }

            Cart::instance('default')->destroy();


            return redirect()->back()->with('msg','Success Thank you');
            // Success

        } catch (Exception $e) {
            // Code
        }

    }
}
