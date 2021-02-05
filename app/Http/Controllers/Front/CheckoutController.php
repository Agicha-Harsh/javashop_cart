<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index(){
    	return view('front.checkout.index');
    }

    public function store(Request $Request){
    	try {
    		dd(['amount' => Cart::total(),
                
                 'name' => $Request->name,
    			'description' => 'test description',
			    'email' => $Request->email,
			    'source' => $Request->stripeToken,
			    "address" => ["city" => $Request->city, "country" => $Request->country, "line1" => $Request->address, "postal_code" => $Request->postal, "state" => $Request->province],
                'metadata' => [
//                    'contents' => $contents,
//                    'quantity' => Cart::instance('default')->count()
                ],]);
            Stripe::charges()->create([
                'amount' => Cart::total(),
                
                 'name' => $Request->name,
    			'description' => 'test description',
			    'email' => $Request->email,
			    'source' => $Request->stripeToken,
			    "address" => ["city" => $Request->city, "country" => $Request->country, "line1" => $Request->address_line_1, "line2" => "", "postal_code" => $Request->postal, "state" => $Request->province],
                'metadata' => [
//                    'contents' => $contents,
//                    'quantity' => Cart::instance('default')->count()
                ],

            ]);
            return redirect()->back()->with('msg','Success Thank you');
        }catch(Exception $e){}
    }
}
