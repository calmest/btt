<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activation;

class AccountActivationController extends Controller
{
    // activated account
    public function activate(Request $request)
    {
    	$token = $request->token;

    	// verify token
    	$verify = Activation::where('token', $token)->first();
    	if($verify->token == $token){
    		return "account activated";
    	}else{
    		return "invalid access token";
    	}
    }
}
