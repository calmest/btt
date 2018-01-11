@extends('__layouts.client-skin')

@section('title')
    Client Dashboard | Dashboard
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
                        <input type="text" id="send_address" class="form-control" placeholder="wallet address" maxlength="15">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label> 
                        <input type="number" id="send_amount" class="form-control" placeholder="00.00" maxlength="15">
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
    <script type="text/javascript">

        $.get('/client/load/wallets', function (e){
            console.log(e);
            if(e.status !== 'info'){
                $(".wallet-btt").html(`
                    <div>
                        <h2>BTT</h2>
                        <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> `+e.bal+` </div>
                        <button class="btn btn-default" onclick="buyForm()">Buy</button> 
                        <button class="btn btn-default" onclick="sellForm()">Sell</button>
                        <button class="btn btn-default" onclick="sendForm()">Send</button>
                        <br />
                    </div>
                    <br /><br />
                `);
            }else{
                $(".wallet-btt").html(`
                <div>
                    <h2>BTT</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> 0.00000000 </div>
                    <button class="btn btn-default">Buy</button> 
                    <button class="btn btn-default">Sell</button>
                    <button class="btn btn-default">Send</button>
                    <br />
                </div>
                <br /><br />
            `);
            }
        });

        $('#lendForm').click( function (e){
            e.preventDefault();
            $("#loan-form").toggle();
        });

        function buyForm(){
            $("#buy-form").toggle();
        }
        function sellForm(){
            $("#sell-form").toggle();
        }
        function sendForm(){
            $("#send-form").toggle();
        }

        // calculate loan
        function calculatePer() {
            // body
            var amount = $("#amount").val();
            var rate = 0.02;

            // calculate price
            var percentInterest = amount * rate;
            // var total = parseInt(amount) + parseInt(percentInterest);

            $('.interest').html(`
                <b>Interest charge:</b> `+percentInterest+` <br />
            `);
        }

        // requesting loan
        function requestLoan()
        {
            // body
            var amount = $("#amount").val();
            var rate = 0.02;
            var token = $("input[name=_token]").val();

            // calculate price
            var percentInterest = amount * rate;

            var data = {
                amount: amount,
                interest: percentInterest,
                rate: rate,
                _token: token
            };

            $.ajax({
                type: "post",
                url:  "/send/loan/request",
                data: data,
                success: function (data){
                    console.log(data);
                    if(data.status == 'success'){
                        $('.success_msg').html(`
                            <div class="alert alert-success">
                                <p class="text-success">`+data.message+`</p>
                            </div>
                        `);
                    }else{
                        $('.error_msg').html(`
                            <div class="alert alert-danger">
                                <p class="text-danger">`+data.message+`</p>
                            </div>
                        `);
                    }
                },
                error: function (data){
                    alert('fail to send request....');
                }
            });

            return false;
        }

        // request buy
        function buyBtt(){
        
            $(".error_msg").html(`
                <div class="alert alert-danger">
                    <p class="text-danger">insufficient balance !!</p>
                </div>
            `);
            return false;
        }

        // request sell
        function sellBtt(){
        
            var token = $("input[name=_token]").val();
            var amount = $("#sell_amount").val();

            $.ajax({
                url: '/account/sell/btt',
                type: 'post',
                dataType: 'json',
                data: {
                    _token:token,
                    amount:amount
                },
                success: function (data){
                    console.log(data);
                    if(data.status == 'success'){
                        $('.success_msg').html(`
                            <div class="alert alert-success">
                                <p class="text-success">`+data.message+`</p>
                            </div>
                        `);
                    }else{
                        $('.error_msg').html(`
                            <div class="alert alert-danger">
                                <p class="text-danger">`+data.message+`</p>
                            </div>
                        `);
                    }
                },
                error: function (data){
                    alert('Error, fail to send request !');
                }
            });
            
            return false;
        }

        // request buy
        function sendBtt(){
            var walletId;
            var amount;
            
            $(".error_msg").html('insufficient balance !!');
            return false;
        }
    </script>
@endsection