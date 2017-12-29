<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Wallet;
use App\Vault;
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

    public function loadWallet()
    {
        # load users wallet
        $user_id = Auth::user()->id;

        # check wallets
        $wallets = Wallet::where('client_id', $user_id)->first();

        if($wallets == null){

            $data = array(
                'status'  => 'info',
                'message' => 'you do not have any btt wallet yet ! '
            );
        }else{
            $data = array(
                'id'   => $wallets->id,
                'addr' => $wallets->address,
                'bal'  => $wallets->balance
            );
        }

        return response()->json($data);
    }

    // create wallets
    public function createWallet()
    {
        # load users wallet
        $user_id = Auth::user()->id;

        # check if user is trying to duplicate wallets
        $already_exits = Wallet::where('client_id', $user_id)->first();
        if($already_exits !== null){
            # return message response
            $data = array(
                'status' => 'error',
                'message' => 'wallet can not be duplicated !'
            );
        }else{

            # generate Address
            $length = 50;
            $addr   = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

            # ico offerings
            $ico = 0.00003421;

            # credit users balance
            $vaults = Vault::where('type', 'btt')->first();
            if($vaults !== null){
                $update_vaults = Vault::find($vaults->id);
                $update_vaults->amount = $update_vaults->amount - $ico;
                $update_vaults->update();
            }else{
                $ico = 0.00000020;
            }
            
            # code...
            $wallets           = new Wallet();
            $wallets->client_id  = $user_id;
            $wallets->address  = $addr;
            $wallets->balance  = $ico;
            $wallets->save();

            # return message response
            $data = array(
                'status' => 'success',
                'message' => 'wallet successfully created !'
            );

        }

        return response()->json($data);
    }

    // show wallets
    public function showWallets($name)
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
