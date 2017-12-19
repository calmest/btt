<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
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
    	return redirect('/');
    }
}
