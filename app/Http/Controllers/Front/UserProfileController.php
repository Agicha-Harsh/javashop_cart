<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserProfileController extends Controller
{
    public function index(){
    	$id = auth()->user()->id;
    	$users = User::where('id',$id)->first();
       	return view('front.profile.index',compact('users'));
    }

    public function edit($id){
    	$users = User::find($id);
    	return view('front.profile.edit',compact('users'));
    }

    public function show($id){

    	$order = Order::find($id);
    	return view('front.profile.details',compact('order'));
    }

    public function update(Request $Request,$id){
    	$user = User::find($id);
    	

    	$Request->validate([
    		'name' => 'required',
    		'email_id' => 'required|email',    		
    		'address' => 'required',
    	]);

    	$user->update([
    		'name' => $Request->name,
    		'email_id' => $Request->email_id,
    		'address' => $Request->address,
    		
    	]);

    	$Request->session()->flash('msg','User Details has been updated');

    	return redirect('front/user/profile');
    }
}
