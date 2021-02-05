<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
	public function __construct(){
		$this->middleware('guest')->except('logout');
	}

    public function index(){
    	return view('front.sessions.index');
    }

    public function store(Request $Request){
    	$Request->validate([
    		'email_id' => 'required|email',
    		'password' => 'required',
    	]);

    	$credentials = request(['email_id','password']); 

    	if (! auth()->attempt($credentials)) {
    		return back()->withErrors([
    			'message' => 'Wrong credentials entered' 
    		]);
    	}

    	return redirect('front/user/profile');
    }

    public function logout(){
    	auth()->logout();

    	session()->flash('msg','You have been logged out');

    	return redirect('front/user/login');
    }
}
