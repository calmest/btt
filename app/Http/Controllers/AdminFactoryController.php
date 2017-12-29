<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vault;
use App\Client;
use App\Wallet;

class AdminFactoryController extends Controller
{
    // Request and Query Vault

    public function addBtt(Request $request)
    {
    	// request from form
    	$type    = $request->type; 
    	$amount  = $request->amount;
    	$rate    = 0.0000000;


    	// check if any existed
    	$vaults = vault::where('type', $type)->first();
    	if($vaults == null){
    		// Vaults and Request
	    	$btt_vault = new Vault();
	    	$btt_vault->type = $type;
	    	$btt_vault->amount = $amount;
	    	$btt_vault->rate = $rate;
	    	$btt_vault->save();

	    	$data = array(
	    		'status'  => 'success',
	    		'message' => 'amount created successfully'
	    	);
    	}else{
    		// updated existing
    		// check if any existed
    		$vaults = vault::where('type', $type)->first();
    		$vault_id = $vaults->id;

            $limits = 15.00000000;

            if($vaults->amount > $limits){
                $data = array(
                    'status'  => 'error',
                    'message' => 'you have exceeded total distribution'
                );
                
            }else{
                $updated_vault = Vault::find($vault_id);
                $updated_vault->type = $type;
                $updated_vault->amount = $updated_vault->amount + $amount;
                $updated_vault->rate = $updated_vault->rate + $rate;
                $updated_vault->update();

                $data = array(
                    'status'  => 'success',
                    'message' => 'amount added successfully'
                );
            }	
    	}

    	// return response
    	return response()->json($data);
    }

    // load all vaults balance
    public function loadBtt()
    {
    	// request from form
    	$pair = Vault::all();

    	$pair_box = [];
    	foreach ($pair as $btt) {
    		# code...
    		$data = array(
    			'id'      => $btt->id,
    			'type'    => $btt->type,
    			'amount'  => $btt->amount,
    			'rate'    => $btt->rate,
    			'date'    => $btt->updated_at->diffForHumans()

    		);

    		array_push($pair_box, $data);
    	}

    	// return response
    	return response()->json($pair_box);
    }

    // load all users 
    public function clients()
    {
        # code...
        $clients = Client::all();

        $client_box = [];
        foreach ($clients as $users) {
            // get client wallets
            $wallets = Wallet::where('client_id', $users->id)->first();
            if($wallets == null){
                $data = array(
                    'id'     => $users->id,
                    'name'   => $users->name,
                    'email'  => $users->email,
                    'btt'    => '0.00000000',
                    'btc'    => 0.00000000,
                    'eth'    => 0.00000000,
                    'status' => 'active',
                    'date'   => $users->created_at->diffForHumans()
                );
            }else{
                $data = array(
                    'id'     => $users->id,
                    'name'   => $users->name,
                    'email'  => $users->email,
                    'btt'    => $wallets->balance,
                    'btc'    => 0.00000000,
                    'eth'    => 0.00000000,
                    'status' => 'active',
                    'date'   => $users->created_at->diffForHumans()
                );
            }

            array_push($client_box, $data);
        }

        return response()->json($client_box);
    }
}
