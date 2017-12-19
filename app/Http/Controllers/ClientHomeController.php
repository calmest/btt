<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Auth;

class ClientHomeController extends Controller
{

    // secure home page controller 
    public function __construct()
    {
        $this->middleware('auth:client')->except('logout');
    }

    // init users informations
    public function dashboard()
    {
    	# code...
    	return view('internal-pages.dashboard');
    }

    // init users informations
    public function wallets()
    {
    	# code...
    	return view('internal-pages.wallets');
    }

    // init users informations
    public function alert()
    {
        # code...
        return view('internal-pages.price-alert');
    }

    // init users informations
    public function transactions()
    {
    	# code...
    	return view('internal-pages.transactions');
    }

    // init users informations
    public function exchange()
    {
        # code...
        return view('internal-pages.exchange');
    }

    // init users informations
    public function setting()
    {
    	# code...
    	return view('internal-pages.setting');
    }

    // init users informations
    public function charts()
    {
    	# code...
    	return view('internal-pages.charts');
    }

    // init users informations
    public function logout()
    {
    	# code...
        Auth::guard('client')->logout();
    	return redirect('/');
    }
}
