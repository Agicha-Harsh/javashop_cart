<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;
use session;

class AdminUserController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }

    public function index(){
    	return view('admin.login');
    }

    public function store(Request $Request){

    	$Request->validate([
    		'email_id'=>'required|email',
    		'password' => 'required'
    	]);

    	$credentials =$Request->only('email_id','password');

    	if(! Auth::guard('admin')->attempt($credentials)){
    		return back()->withErrors([
    			'message' => 'Wrong credentials'
    		]);
    	}



        session()->flash('msg','You have been logged in');

    	return redirect('/admin');
    }

    public function logout(){
        auth()->guard('admin')->logout();

        session()->flash('msg','You have been logged out');

        return redirect('/admin/login');
    }
}
