<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Wallet;

class SignupClientAccountController extends Controller
{
    // show users Registration form
    public function signupForm()
    {
    	# code...
    	return view("external-pages.sign-up");
    }

    // show users Registration form
    public function doSignup(Request $request)
    {
    	# receive request 
    	$name   = $request->name;
    	$email  = $request->email;
    	$pass   = $request->pass;
    	$phone  = $request->phone;

    	// check if users already exits 
    	$already_email_exits = Client::where('email', $email)->first();
    	if($already_email_exits == null){
    		$data = array(
    			'status'  => 'error',
    			'message' => 'This email already exits !'
    		);
    		//
    		return response()->json($data);
    	}

    	// check if users already exits 
    	$already_phone_exits = Client::where('phone', $phone)->first();

    	// check if users already exits 
    	$already_user_exits = Client::where('name', $name)->first();
    }
}
