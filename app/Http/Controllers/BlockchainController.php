<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

class BlockchainController extends Controller
{
    // load exchange
    public function loadExchange()
    {
    	$url     = 'https://btt-blockchain.herokuapp.com/';
    	$client  = new Client();
    	$request = $client->request('GET', $url);

    	// get request 
    	$status = $request->getStatusCode();
    	$header = $request->getHeader('content-type');
    	$body   = $request->getBody()->getContents();

    	// scanned results
    	$data = $this->scanResults($body);

    	// return response on Json Format
    	return response()->json($data);
    }

    // create wallets
    public function createWallets()
    {

    }


    // filtered results 
    public function scanResults($data)
    {
    	// decode results
    	$data = json_decode($data);
    	$data = collect($data->USD);
    	$data = $data->toArray();

    	return $data;
    }
}
