<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
	// admin middleware instance

	public function __construct()
	{
		# check for guest
		$this->middleware('guest');
	}

    // get admin index page
    public function showLogin()
    {
    	return view('admin-pages.login');
    }

    // process login 
    public function doLogin()
    {
    	# code....
    	return redirect('/admin');
    }
}
