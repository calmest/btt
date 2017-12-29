<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AccountActivation;
use App\Activation;
use App\Client;
use App\Wallet;

class SignupClientAccountController extends Controller
{
    // show users Registration form
    public function signupForm()
    {
    	# code...
    	return view("external-pages.sign-up");
    }

    // show users Registration form
    public function doSignup(Request $request)
    {
    	# receive request 
    	$name   = $request->name;
    	$email  = $request->email;
    	$pass   = $request->pass;

        // encrypt password
        $pass = bcrypt($pass);

    	// check if users already exits 
    	$already_email_exits = Client::where('email', $email)->first();
    	if($already_email_exits !== null){
    		$data = array(
    			'status'  => 'error',
    			'message' => 'This email already exits !'
    		);
    	}else{
    	   // check if users already exits 
    	   $already_user_exits = Client::where('name', $name)->first();

            // check if users already exits 
            $already_user_exits = Client::where('name', $name)->first();

            if($already_user_exits == null){

                // now save users information and create a local wallet
                $clients           = New Client();
                $clients->name     = $name;
                $clients->email    = $email;
                $clients->password = $pass;
                $clients->save();

                // Send activation email 
                $token   = rand(000, 999).'-'.rand(222, 888);
                $status  = 'inactive';

                // save information
                $find_id = Client::where('email', $email)->first();
                $user_id = $find_id->id;

                // updated activation
                $activation = new Activation();
                $activation->user_id = $user_id;
                $activation->status  = $status;
                $activation->token   = $token;
                $activation->save();

                // fetch activation
                $active_details = Activation::where('user_id', $user_id)->first();
                $data = array(
                    'id'    => $active_details->id,
                    'name'  => $name,
                    'token' => $active_details->token
                );

                // Fire a mail
                // send User an Email
                \Mail::to($email)->send(new AccountActivation($data));


                // send clients a signup successfull messages
                $data = array(
                    'status'  => 'success',
                    'message' => 'Registration successfull !, A confirmation link has been sent to '.$email
                );
            }else{

                $data = array(
                    'status'  => 'error',
                    'message' => 'This user already exits !'
                );
            }
        }

        // check for response
        return response()->json($data);
    }
}
