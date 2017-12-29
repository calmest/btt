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
    </script>
@endsection