<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupClientAccountController extends Controller
{
    // show users Registration form
    public function signupForm($value='')
    {
    	# code...
    	return view("external-pages.sign-up");
    }
}
