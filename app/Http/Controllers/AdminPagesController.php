<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Client;

class AdminPagesController extends Controller
{

    // auth pages 
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    // get admin index page
    public function index()
    {
    	# code...
    	return view('admin-pages.dashboard');
    }

    // get admin index page
    public function dashboard()
    {
        # code...
        return view('admin-pages.dashboard');
    }

    // get payments
    public function payments()
    {
    	# return payments view
        return view('admin-pages.payments');
    }

    // get clients  page
    public function clients()
    {
    	# clients
        $clients = Client::all();
        
        return view('admin-pages.clients', compact('clients'));
    }   

    // get notifications page
    public function notifications()
    {
    	# notifications and alerst
        return view('admin-pages.notifications');
    }   

    // get exchanges page
    public function exchange()
    {
    	# exchange
        return view('admin-pages.exchange');
    }  

    // get exchanges page
    public function transactions()
    {
        # exchange
        return view('admin-pages.transactions');
    }   

    // get loan & lending page page
    public function loans()
    {
    	# loans
        return view('admin-pages.loans');
    }

    // get all users
    public function charts()
    {
        # load graph
        return view('admin-pages.chars');
    }

    // get all users
    public function wallets()
    {
        # load graph
        return view('admin-pages.wallets');
    }

    // get all users
    public function vaults($id)
    {
        # load graph
        return view('admin-pages.vaults');
    }

    // get admin logout page
    public function logout()
    {
    	# logout admin
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }   
}
