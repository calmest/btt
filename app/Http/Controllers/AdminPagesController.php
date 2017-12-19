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
    	return view('admin-pages.index');
    }

    // get admin index page
    public function dashboard()
    {
        # code...
        return view('admin-pages.index');
    }

    // get admin index page
    public function error()
    {
    	# code...
    }

    // get admin index page
    public function clients()
    {
    	# code...
    }   

    // get admin index page
    public function notifications()
    {
    	# code...
    }   

    // get admin index page
    public function exchanges()
    {
    	# code...
    }   

    // get admin index page
    public function rewards()
    {
    	# code...
    }

    // get all users
    public function allUsers()
    {
        $clients = Client::all();
        return view('admin-pages.list-users', compact('clients'));
    }

    // get admin logout page
    public function logout()
    {
    	# logout admin
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }   
}
