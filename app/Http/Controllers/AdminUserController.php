<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;

class AdminUserController extends Controller
{
    public function index(){
    	return view('admin.login');
    }

    public function store(Request $Request){
    	$Request->validate([
    		'email_id'=>'required',
    		'password' => 'required'
    	]);

    	$credentials =$Request->only('email','password');

    	if(Auth::guard('admin')->attempt($credentials)){
    		return back()->withErrors([
    			'message' => 'Wrong credentials'
    		]);
    	}

    	session()->flash('msg','You have been logged In');

    	return redirect('/admin');
    }
}
