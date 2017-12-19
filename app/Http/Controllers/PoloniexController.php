<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Btx;

class PoloniexController extends Controller
{
    // get balance information
    public function loadBalance()
    {
    	// get balance 
    	$poloniex = new Poloniex();
    	$data = $poloniex->get_balances();

    	return response()->json($data);
    }

    public function loadPair()
    {
    	// get trading pairs 
    	$poloniex = new Poloniex();
    	$data = $poloniex->get_trading_pairs();

    	return response()->json($data);

    }

    // // get balance information
    // public function loadhistory()
    // {
    // 	// get balance 
    // 	// $poloniex = new Poloniex();
    // 	// $data = $poloniex->get_balances();

    // 	// return response()->json($data);
    // }


    // public function loadTicker()
    // {
    // 	// get ticker
    // 	$poloniex = new Poloniex();
    // 	$data = $poloniex->get_balances();	
    // }

}
