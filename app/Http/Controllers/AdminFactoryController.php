<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vault;
use App\Client;
use App\Wallet;
use App\Loan;
use App\Rate;

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

    // load exchange rate
    public function rate()
    {
        // exchange rate 
        $all_rate = Rate::all();
        $rate_box = [];
        foreach ($all_rate as $rate) {
            # code...
            $data = array(
                'btt_usd' => $rate->btt_usd,
                'btt_btc' => $rate->btt_btc,
                'btt_eth' => $rate->btt_eth
            );

            array_push($rate_box, $data);
        }

        return response()->json($rate_box);
    }

    // update rate
    public function toggleRate(Request $request)
    {
        // request new rate
        $btt_usd = $request->btt_usd;
        $btt_btc = $request->btt_btc;
        $btt_eth = $request->btt_eth;

        $all_rate = Rate::first();
        if($all_rate == null){
            // insert new rate
            $new_rate          = new Rate();
            $new_rate->btt_usd = $btt_usd;
            $new_rate->btt_btc = $btt_btc;
            $new_rate->btt_eth = $btt_eth;
            $new_rate->save();
        }else{
            // toggle rate
            $update_rate          = Rate::find($all_rate->id);
            $update_rate->btt_usd = $btt_usd;
            $update_rate->btt_btc = $btt_btc;
            $update_rate->btt_eth = $btt_eth;
            $update_rate->update();
        }

        $data = array(
            'status' => 'success',
            'message' => 'Rate new exchange updates successful !'
        );

        return response()->json($data);
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
        $loans = Loan::where('status', 'pending')->get();

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


    // load accepted loans
    public function loadAcceptedLoan()
    {
        # fetch all loans
        $loans = Loan::where('status', 'accepted')->get();

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

    // accept loans
    public function acceptLoan(Request $request)
    {
        # code..
        $id = $request->id;

        // dd($id);
        $check_loan = Loan::where('id', $id)->first();

        // return $check_loan;

        // check amount and credit user
        $wallet = Wallet::where('client_id', $check_loan->user_id)->first();

        // update client account (credit client account)
        $update_wallet = Wallet::find($wallet->id);
        $update_wallet->balance = bcadd($check_loan->amount, $update_wallet->balance, 8);
        $update_wallet->update();

        // debit admin account
        $admin_bank = Vault::where('type', 'btt')->first();

        // update bank 
        $update_vault = Vault::find($admin_bank->id);
        $update_vault->amount = $update_vault->amount - $check_loan->amount;
        $update_vault->update();

        // updated loan status 
        $update_loan = Loan::find($id);
        $update_loan->status = 'accepted';
        $update_loan->update();
        
        return redirect()->back()->with('loan_status', 'Loan request has been granted !');
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
