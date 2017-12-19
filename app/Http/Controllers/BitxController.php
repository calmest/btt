<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitx;

class BitxController extends Controller
{
    // use btx 
    public function loadLastTrade()
    {
    	// get balance 
    	$poloniex = new Bitx();
    	$data = $poloniex->get_balances();

    	return response()->json($data);
    }

    // public function loadPair()
    // {
    // 	// get trading pairs 
    // 	$poloniex = new Bitx();
    // 	$data = $poloniex->get_trading_pairs();

    // 	return response()->json($data);
    // }
}
