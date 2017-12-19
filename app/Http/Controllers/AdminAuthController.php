<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminAuthController extends Controller
{
    // loggin admin 
    public function loginAdmin(Request $request)
    {
    	// login admin 
    	$admin_email = $request->email;
    	$admin_pass  = $request->password;

    	// logged admin
    	$rememberToken = $request->remember;

		// Attemp to logged the user in
		if (Auth::guard('admin')->attempt(['email' => $admin_email, 'password' => $admin_pass], $rememberToken)) {
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
}
