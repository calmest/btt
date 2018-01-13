@extends('__layouts.client-skin')

@section('title')
    Client | Dashboard
@endsection

@section('contents')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Dashboard</li>
            <li class=""><span class="small">USD: <i class="fa fa-usd"></i> <span class="usd_bal">0.00</span></span></li>
        </ol>
    </div><!--/.row-->
	<div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <div class="wallet-btt"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>BTC</h2>
                   	<div style="padding: 2em;font-size: 21px;"><i class="fa fa-btc"></i> 0.00000000</div>
                    <button class="btn btn-default">Buy</button> 
                    <button class="btn btn-default">Sell</button>
                    <button class="btn btn-default">Send</button>
                </div>
                <br />
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>ETH</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> 0.000000</div>
                    <button class="btn btn-default">Buy</button> 
                    <button class="btn btn-default">Sell</button>
                    <button class="btn btn-default">Send</button>
                </div>
                <br />
            </div>
        </div>
    </div><!--/.row-->

    <!-- Loan request -->
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-default" id="lendForm"><i class="fa fa-money"></i> Request Loan</button>
            <hr />
            {{-- Loan form section --}}
            <div id="loan-form" style="display: none;">
                <form method="post" onsubmit="return requestLoan()">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="amount">Amount</label> 
                        <input type="number" onkeyup="return calculatePer()" id="amount" class="form-control" placeholder="00.00" maxlength="15">
                    </div>
                    <hr />
                    <div class="form-group">
                        <span class="interest"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Send Request</button>
                    </div>
                    <div class="success_msg"></div>
                    <div class="error_msg"></div>
                </form>
            </div>

            {{-- Buy form section --}}
            <div id="buy-form" style="display: none;">
                <form method="post" onsubmit="return buyBtt()">
                    <h1 class="lead">Enter Buy Amount</h1>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="amount">Amount</label> 
                        <input type="number" id="buy_amount" class="form-control" placeholder="00.00" maxlength="15" required="">
                    </div>
                    <hr />
                    <div class="form-group">
                        <button class="btn btn-default">Buy</button>
                    </div>
                    <div class="success_msg"></div>
                    <div class="error_msg"></div>
                </form>
            </div>

            {{-- Sell form section --}}
            <div id="sell-form" style="display: none;">
                <form method="post" onsubmit="return sellBtt()">
                    <h1 class="lead">Enter Sell Amount</h1>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="amount">Amount</label> 
                        <input type="text" id="sell_amount" class="form-control" placeholder="00.00" maxlength="15" required="">
                    </div>
                    <hr />
                    <div class="form-group">
                        <button class="btn btn-default">Sell</button>
                    </div>
                    <div class="success_msg"></div>
                    <div class="error_msg"></div>
                </form>
            </div>

            {{-- Send form section --}}
            <div id="send-form" style="display: none;">
                <form method="post" onsubmit="return sendBtt()">
                    <h1 class="lead">Enter Amount & Wallet ID</h1>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="amount">Address</label> 
                        <input type="text" id="send_address" class="form-control" placeholder="wallet address" required="">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label> 
                        <input type="text" id="send_amount" class="form-control" placeholder="00.00" maxlength="15" required="">
                    </div>
                    
                    <hr />
                    <div class="form-group">
                        <button class="btn btn-default">Send Bittruckcoin</button>
                    </div>
                    <div class="success_msg"></div>
                    <div class="error_msg"></div>
                </form>
            </div>
        </div>
    </div>
    <br /><br />
@endsection

@section('scripts')
    {{-- include btt scripts --}}
    <script type="text/javascript" src="/js/btt.js"></script>
    <script type="text/javascript">
        // request buy
        function sendBtt(){
            // wallet id 
            var token    = $("input[name=_token]").val();
            var walletId = $("#send_address").val();
            var amount   = $("#send_amount").val();
            
            // ajax setup
            var data = {
                _token:token,
                walletId:walletId,
                amount:amount
            }

            // ajax post request 
            $.ajax({
                url: '/account/send/btt',
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(data){
                    console.log(data);
                    // return messages
                    if(data.status == 'success'){
                        $('.success_msg').html(`
                            <p class="text-success"> `+data.message+`</p>
                        `);
                    }else{
                        $('.error_msg').html(`
                            <p class="text-danger">`+data.message+`</p>
                        `);
                    }
                },
                error: function (data){
                    alert("Error, Fail to send request !");
                }
            });

            return false;
        }
    </script>
@endsection