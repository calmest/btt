<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Auth;

class LoginClientAccountController extends Controller
{
    // login user 
    public function loginUser(Request $request)
    {
    	$email = $request->email;
    	$pass  = $request->password;

    	// ecnrypt password
    	// $pass = bcrypt($pass);
    	$rememberToken = $request->remember;

		// Attemp to logged the user in
		if (Auth::guard('client')->attempt(['email' => $email, 'password' => $pass], $rememberToken)) {
			//return "true";
			return redirect()->intended('/account/dashboard');
		} else {
			//return "false";
			return redirect()
				->back()
				->withInput($request->only('email', 'remember'))
				->with('error-status', 'Fail to login account, please check your login credentials, CaSE-seNsiTive  ');
		}
    }

    // login client form 
    public function showLogin()
    {
    	return view('external-pages.login');
    }
}
