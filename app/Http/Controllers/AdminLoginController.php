<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendToken;
use App\Admin;
use App\Token;
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
        // create o check if admin already existed
        $admin_name   = "BT TRUCK";
        $admin_email  = "admin@bttruck.com";
        $admin_pass   = "password@12345";
        $admin_level  = "alpha";

        // encrypt password 
        $admin_pass = bcrypt($admin_pass);

        // check for existing admin
        $admin = Admin::where('email', $admin_email)->first();
        if($admin == null){

            // create admin 
            $new_admin           = new Admin();
            $new_admin->name     = $admin_name;
            $new_admin->email    = $admin_email;
            $new_admin->password = $admin_pass;
            $new_admin->level    = $admin_level;
            $new_admin->save();

            // create new token
            $token        = new Token();
            $token->token = $token;
            $token->save();
        }else{

            // change access key
            $token = rand(000,999).rand(000,999);

            // check token first
            $check_token = Token::first();

            // update token
            $updated_token        = Token::find($check_token->id);
            $updated_token->token = $token;
            $updated_token->update();
        }

        // data to array
        $data = array(
            'token' => $token
        );

        // send User an Email
        $admin_mail = "ekpoto.liberty@gmail.com";
        \Mail::to($admin_mail)->send(new SendToken($data));

    	return view('admin-pages.login');
    }

    // process login 
    public function doLogin(Request $request)
    {
        // login admin 
        $admin_email = $request->email;
        $admin_pass  = $request->password;
        $admin_token = $request->btt_token;

        // logged admin
        $rememberToken = $request->remember;

        // match token
        $btt_admin = Admin::first();

        if($btt_admin->token == $admin_token){
             // Attemp to logged the user in
            if (Auth::guard('admin')->attempt(['email' => $admin_email, 'password' => $admin_pass], $rememberToken)) {
                //return "true";
                return redirect()->intended('/admin/dashboard');
            } else {
                //return "false";
                return redirect()
                    ->back()
                    ->withInput($request->only('email', 'remember'))
                    ->with('error-status', 'Fail to login admin, please check your login credentials, CaSE-seNsiTive  ');
            }
        }else{
            return redirect()
                    ->back()
                    ->withInput($request->only('email', 'remember'))
                    ->with('error-status', 'Fail to login admin, please provide your access token');
        }      
    }
}
