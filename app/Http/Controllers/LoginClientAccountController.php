<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginClientAccountController extends Controller
{
    // login user 
    public function loginUser($value='')
    {
    	# code...
    	return redirect('/account/dashboard');
    }
}
