<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vault;
use App\Client;
use App\Wallet;
use App\Loan;

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

    // load loans request
    public function loadLoan()
    {
        # fetch all loans
        $loans = Loan::all();

        $loans_box = [];

        // Scanned all loans
        foreach ($loans as $owings) {
            # code...
            $user_info = Client::where('id', $owings->user_id)->first();
            $wallet_info = Wallet::where('client_id', $owings->user_id)->first();
            if($wallet_info == null){
                $wallets_addr = "no wallets address";
                $wallets_balance = "users has no wallet";
            }else{
                $wallets_addr = $wallet_info->address;
                $wallets_balance = $wallet_info->balance;
            }
            $data = array(
                'id'       => $owings->id,
                'name'     => $user_info->name,
                'email'    => $user_info->email,
                'addr'     => $wallets_addr,
                'btt'      => $wallets_balance,
                'usd'      => '0.00000000',
                'amount'   => $owings->amount,
                'rate'     => $owings->rate,
                'interest' => $owings->interest,
                'status'   => $owings->status,
                'expired'  => date("M d 'Y" ,$owings->maturity_date),
                'date'     => $owings->created_at->diffForHumans()
            );
        
            array_push($loans_box, $data);    
        }

        return response()->json($loans_box);
    }


    // count no of users 
    public function countClients()
    {
        $clients = Client::all();

        // count clients
        $total_clients = $clients->count();
        $data = array(
            'total_clients' => $total_clients
        );

        // return count response
        return response()->json($data);
    }

    // count no of loan request
    public function countLoans()
    {
        $loans = Loan::where('status', 'pending')->get();

        $total_loans = $loans->count();
        $data = array(
            'total_loans' => $total_loans
        );

        // return total loan request
        return response()->json($data);
    }
}
