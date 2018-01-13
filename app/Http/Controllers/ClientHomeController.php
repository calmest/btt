<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Wallet;
use App\Vault;
use App\Payment;
use App\Transaction;
use App\Loan;
use App\Trade;
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

    // load clients wallets
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

    // job trade 
    public function jobTrade(Request $request)
    {
        $user_id = Auth::user()->id;
        $price   = $request->price;
        $qty     = $request->qty;

        // check wallets
        $wallets = Wallet::where('user_id', $user_id)->first();

        // wallets
        if($wallets->balance < $qty ){

            // data to array
            $data = array(
                'status' => 'error',
                'message' => 'you do not have sufficient balance '
            );
            
        }else{

            // Job trade
            $trade          = new Trade();
            $trade->user_id = $user_id;
            $trade->price   = $price;
            $trade->amount  = $amount;
            $trade->save();

            // data to array
            $data = array(
                'status' => 'success',
                'message' => 'Trade order placed successfully !'
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
            $wallets             = new Wallet();
            $wallets->client_id  = $user_id;
            $wallets->address    = $addr;
            $wallets->balance    = $ico;
            $wallets->save();

            # payments initials
            $from = "bittruckcoin";

            # create payments history
            $payments          = new Payment();
            $payments->user_id = $user_id;
            $payments->to      = $addr;
            $payments->from    = $from;
            $payments->amount  = $ico;
            $payments->save();

            # return message response
            $data = array(
                'status' => 'success',
                'message' => 'wallet successfully created !'
            );

        }

        return response()->json($data);
    }

    // load clients payments
    public function loadPayments()
    {
        # load clients payments
        $user_id = Auth::user()->id;

        # payment history
        $payments = Payment::where('user_id', $user_id)->get();

        $payment_box = [];
        foreach ($payments as $payment) {
            # code...
            $data = array(
                'id'         => $payment->id,
                'user_id'    => $payment->user_id,
                'to'         => $payment->to,
                'from'       => $payment->from,
                'amount'     => $payment->amount,
                'created_at' => $payment->created_at->diffForHumans() 
            );

            # push data
            array_push($payment_box, $data);
        }
        return response()->json($payment_box);
    }

    // load clients payments
    public function loadTransactions()
    {
        # load clients transactions
        $user_id = Auth::user()->id;

        # payment history
        $transactions = Transaction::where('user_id', $user_id)->get();
        $trans_box = [];
        foreach ($transactions as $transaction) {
            # code...
            $data = array(
                'id'         => $transaction->id,
                'user_id'    => $transaction->user_id,
                'type'       => $transaction->type,
                'rate'       => $transaction->rate,
                'amount'     => $transaction->amount,
                'created_at' => $transaction->created_at->diffForHumans() 
            );

            # push data
            array_push($trans_box, $data);
        }

        return response()->json($trans_box);
    }

    // load loans history
    public function loadLoans()
    {
        # load loans
        $user_id = Auth::user()->id;
        $loans = Loan::where('user_id', $user_id)->get();

        $loans_box = [];
        foreach ($loans as $loan) {
            # code...
            $data = array(
                'id'       => $loan->id,
                'user_id'  => $loan->user_id,
                'amount'   => $loan->amount,
                'rate'     => $loan->rate,
                'interest' => $loan->interest,
                'status'   => $loan->status,
                'date'     => $loan->created_at->diffForHumans()
            );

            array_push($loans_box, $data);
        }

        return response()->json($loans_box);
    }

    // request buy 
    public function buyBtt()
    {
        // amount
        $amount = $request->amount;
        // check if user have loan already
    }

    // request sell 
    public function sellBtt(Request $request)
    {
        // current logged user
        $client_id = Auth::user()->id;

        // amount
        $amount = $request->amount;

        // constant 
        $limit = 0.00044550;

        // check limit
        if($limit > $amount){
            $data = array(
                'status' => 'error',
                'message' => 'BTT must be above <b>0.00044550</b> before sell !!!' 
            );
        }else{
            // check user wallet balance
            $wallets = Wallet::where('client_id', $client_id)->first();
            if($wallets->balace < $amount){
                $data = array(
                    'status' => 'error',
                    'message' => 'Insufficient balance !!!' 
                );
            }else{
                $vault_id = Vault::where('type', 'btt')->first();

                $vaults = Vault::find($vault_id->id);
                $vaults->balance = bcadd($vaults->balance, $amount, 8);
                $vaults->update();

                $data = array(
                    'status' => 'success',
                    'message' => 'Sold BTT successfully !' 
                );
            }
        }

        // return response 
        return response()->json($data);
    }

    // request send
    public function sendBtt(Request $request)
    {
        // amount
        $amount    = $request->amount;
        $receiver  = $request->walletId;

        // validate ammount 
        if(is_numeric($amount)){
            // since client is recieving
            $type = "send";
            $rate = "0.5";

            // get sender 
            $client_id = Auth::user()->id;
            $client_wallet = Wallet::where('client_id', $client_id)->first();

            // from address
            $from = $client_wallet->address;

            // check address validity
            $check_address = Wallet::where('address', $receiver)->first();
            if($check_address !== null){
                // check if users has enough to send
                if($client_wallet->balance > $amount){
                    // deduct balance from account
                    $update_wallet = Wallet::find($client_wallet->id);
                    $update_wallet->balance = $update_wallet->balance - $amount;
                    $update_wallet->update();

                    // update receivers account
                    $update_rec_wallet = Wallet::find($check_address->id);
                    $update_rec_wallet->balance = $update_rec_wallet->balance + $amount;
                    $update_rec_wallet->update();

                    // create transaction logs
                    $transactions = new Transaction();
                    $transactions->user_id = $client_id;
                    $transactions->type    = $type;
                    $transactions->rate    = $rate;
                    $transactions->amount  = $amount;
                    $transactions->save();

                    // create payments 
                    $payments          = new Payment();
                    $payments->user_id = $client_id;
                    $payments->to      = $receiver;
                    $payments->from    = $from;
                    $payments->amount  = $amount;
                    $payments->save();

                    // response msg 
                    $msg = 'Transfer <i class="fa fa-database"></i> <b>'.$amount.'</b> successful !';

                    // response data
                    $data = array(
                        'status'  => 'success',
                        'message' => $msg
                    );
                }else{
                    // response data
                    $data = array(
                        'status'  => 'error',
                        'message' => 'Insufficent balance, Transaction not successful !'
                    );
                }
            }else{
                // response msg 
                $msg = 'Invalid Wallet address, Transfer Fail !';

                // response data
                $data = array(
                    'status'  => 'error',
                    'message' => $msg
                );
            }

            // return response complete
            return response()->json($data);
        }else{
            // response data
            $data = array(
                'status'  => 'error',
                'message' => 'Invalid amount !, Transaction not successful !'
            );
        }
    }

    // request loan
    public function requestLoan(Request $request)
    {
        // amount
        $user_id  = Auth::user()->id;
        $amount   = $request->amount;
        $rate     = $request->rate;
        $interest = $request->interest;
        $status   = "pending";

        // maturity date
        $maturity = 3600 * 30;
        $maturity_date = time() + $maturity;

        $already_loan = Loan::where('user_id', $user_id)->first();
        if($already_loan == null){
            
            $loan                = new Loan();
            $loan->user_id       = $user_id;
            $loan->amount        = $amount;
            $loan->rate          = $rate;
            $loan->interest      = $interest;
            $loan->status        = $status;
            $loan->maturity_date = $maturity_date;
            $loan->save();

            $msg = 'You loan request has been sent !, balance will be updated as soon as the loan request is accepted';
            $data = array(
                'status'  => 'success',
                'message' => $msg
            );

        }else{
            $msg = 'You still have an existing loan of '.$already_loan->amount.', you can not request another loan';
            $data = array(
                'status'  => 'error',
                'message' => $msg
            );
        }

        // request loan
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
