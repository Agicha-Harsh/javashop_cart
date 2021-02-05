<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    public function index(){
    	
    	return view('front.registration.index');
    }

    public function store(Request $Request){
    	$Request->validate([
    		'name' => 'required',
    		'email_id' => 'required|email',
    		'password' => 'required|confirmed',
    		'address' => 'required'
    	]);

    	$user = User::create([
    		'name' => $Request->name,
    		'email_id' => $Request->email_id,
    		'password' => bcrypt($Request->password),    		
    		'address' => $Request->address,

    		
    	]);

    	auth()->login($user);



    	return redirect('/front/user/profile');
    }
}
