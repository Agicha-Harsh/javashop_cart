<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
    	return view('front.cart.index');
    }

    public function store(Request $Request){
    	$dubl = Cart::instance('default')->search(function($cartItem , $rowId) use($Request){
    		return $cartItem->id === $Request->id;
       	});

       	if($dubl->isNotEmpty())
       	{
       		return redirect()->back()->with('msg','Item is already in cart');
       	}
    	Cart::add($Request->id, $Request->name, 1, $Request->price)->associate('App\Models\Product');
    	return redirect()->back()->with('msg','Item has been added to cart');
    }

    public function destroy($id){
    	Cart::remove($id);

    	return redirect()->back()->with('msg','Item has been removed from the cart');
    }

    public function savelater($id){
    	$item = Cart::instance('default')->get($id);
    	$add = $item->id;
    	Cart::instance('default')->remove($id);

    	$dubl = Cart::instance('savelater')->search(function($cartItem , $rowId) use($add){
    		return $cartItem->id === $add;
       	});

       	if($dubl->isNotEmpty())
       	{
       		return redirect()->back()->with('msg','Item is already in cart');
       	}

    	Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');

    	return redirect()->back()->with('msg','Item has been saved for later');
    }
}
