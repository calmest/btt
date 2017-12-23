<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vault;

class AdminFactoryController extends Controller
{
    // Request and Query Vault

    public function addBtt(Request $request)
    {
    	// request from form
    	$type    = $request->type; 
    	$amount  = $request->amount;
    	$balance = 0.0000000;


    	// check if any existed
    	$vaults = vault::where('type', $type)->first();
    	if($vaults == null){
    		// Vaults and Request
	    	$btt_vault = new Vault();
	    	$btt_vault->type = $type;
	    	$btt_vault->amount = $amount;
	    	$btt_vault->balance = $balance;
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

            if($vaults->balance > $limits){
                $data = array(
                    'status'  => 'error',
                    'message' => 'you have exceeded total distribution'
                );
                
            }else{
                $updated_vault = Vault::find($vault_id);
                $updated_vault->type = $type;
                $updated_vault->amount = $updated_vault->amount + $amount;
                $updated_vault->balance = $updated_vault->balance + $balance;
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
    			'balance' => $btt->balance,
    			'date'    => $btt->updated_at->diffForHumans()

    		);

    		array_push($pair_box, $data);
    	}

    	// return response
    	return response()->json($pair_box);
    }
}
