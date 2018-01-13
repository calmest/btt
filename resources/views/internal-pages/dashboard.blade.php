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
    <!-- Main-Content -->
    <div class="container">
        <br /><br />
        <div class="col-md-12">
            <h1 class="lead">Recent Updates</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>from</th>
                        <th>wallet id</th>
                        <th>amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="payments-card"></tbody>
            </table>
        </div>
    </div>
    <!--// Main-Content-->
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
                            <div class="alert alert-success">
                                <p class="text-success"> `+data.message+`</p>
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
                    alert("Error, Fail to send request !");
                }
            });

            return false;
        }
    </script>
    <script type="text/javascript">
        var logged_id = '{{ Auth::user()->id }}';
        // load transactions
        $.get('/account/transaction/history', function(data) {
            /*optional stuff to do after success */
            // console.log(data);
            $('.transaction-card').html('');
            var sn = 0;
            $.each(data, function(index, val) {
                /* iterate through array or object */
                // console.log(val);
                sn++;
                if(val.user_id == logged_id){
                    $('.transaction-card').append(`
                        <tr>
                            <td>`+sn+`</td>
                            <td>`+val.type+`</td>
                            <td>`+val.amount+`</td>
                            <td>`+val.rate+`</td>
                            <td>`+val.created_at+`</td>
                        </tr>
                    `);
                }
            });
        });

        
        // load transactions
        $.get('/account/transaction/received', function(data) {
            /*optional stuff to do after success */
            // console.log(data);
            $('.transaction-received').html('');
            var sn = 0;
            $.each(data, function(index, val) {
                /* iterate through array or object */
                // console.log(val);
                sn++;
                if(val.user_id == logged_id){
                    $('.transaction-received').append(`
                        <tr>
                            <td>`+sn+`</td>
                            <td>Received</td>
                            <td>`+val.amount+`</td>
                            <td>---</td>
                            <td>`+val.created_at+`</td>
                        </tr>
                    `);
                }
            });
        });


        // load payments history
        $.get('/account/payment/history', function(data) {
            /*optional stuff to do after success */
            $('.payments-card').html('');
            var sn = 0;
            $.each(data, function(index, val) {
                /* iterate through array or object */
                console.log(val);
                sn++;
                if(val.user_id == logged_id){
                    $('.payments-card').append(`
                    <tr>
                        <td>`+sn+`</td>
                        <td>`+val.from+`</td>
                        <td>`+val.to+`</td>
                        <td>`+val.amount+`</td>
                        <td>`+val.created_at+`</td>
                    </tr>
                `);
                }
            });

        });
    </script>
@endsection