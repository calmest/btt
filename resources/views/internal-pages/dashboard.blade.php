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
                    <button class="btn btn-default">Buy</button> <button class="btn btn-default">Sell</button>
                    <button class="btn btn-default">Send</button>
                </div>
                <br />
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>USD</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-usd"></i> 0.00000000</div>
                    <button class="btn btn-default">Buy</button> <button class="btn btn-default">Sell</button>
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
                    <button class="btn btn-default">Buy</button> <button class="btn btn-default">Sell</button>
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
            <div id="loan-form">
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
        </div>
    </div>
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
                        <button class="btn btn-default">Buy</button> <button class="btn btn-default">Sell</button>
                         <button class="btn btn-default">Send</button>
                        <br />
                    </div>
                    <br /><br />
                `);
            }else{
                $(".wallet-btt").html(`
                <div>
                    <h2>BTT</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> 0.00000000 </div>
                    <button class="btn btn-default">Buy</button> <button class="btn btn-default">Sell</button>
                     <button class="btn btn-default">Send</button>
                    <br />
                </div>
                <br /><br />
            `);
            }
        });

        $('#lendForm').click( function (e){
            e.preventDefault();
            // alert('seen !');
        });

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
    </script>
@endsection