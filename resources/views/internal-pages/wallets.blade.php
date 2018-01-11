@extends('__layouts.client-skin')

@section('title')
    BTT | Wallets
@endsection

@section('contents')
{{ csrf_field() }}
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">wallet</li>
            <li class=""><span class="small">USD: <i class="fa fa-usd"></i> <span class="usd_bal">0.00</span></span></li>
            
        </ol>
    </div><!--/.row-->
    <!-- Main-Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Wallets</h1>
                <div class="row">
                    <div class="col-md-4" style="font-size: 14px;">
                        <div class="error_msg"></div>
                        <div class="success_msg"></div>
                        <div class="wallet-btt"></div>
                        
                    </div>
                </div>
                <br /><br />
                <div class="row">
                    <div class="col-md-4 lead">
                        <div class="wallet">
                            you do not have any BTC wallet yet !
                        </div>
                        <button onclick="xcreate()" class="btn btn-defualt"><i class="fa fa-plus"></i> New BTC Wallet</button>
                    </div>
                    <div class="col-md-4 lead">
                        <div class="wallet">
                            you do not have any ETH wallet yet !
                        </div>
                        <button onclick="xcreate()" class="btn btn-defualt"><i class="fa fa-plus"></i> New ETH Wallet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Main-Content-->
@endsection

@section('scripts')
    <script type="text/javascript">
        $.get('/client/load/wallets', function (e){
            // console.log(e);
            if(e.status == 'info'){
                $(".wallet-btt").html(`
                    <button class="btn btn-defualt" onclick="createBTT()"> 
                        <i class="fa fa-plus"></i> New BTT Wallet
                    </button>
                `);
                $(".success_msg").html(`
                    `+e.message+`
                `);
            }else{
                $(".wallet-btt").html(`
                    <div>
                    <table class="table">
                        <tr>
                            <td>Address</td>
                            <td><i class="fa fa-copy"></i> `+e.addr+`</td>
                        </tr>
                        <tr>
                            <td>Balance</td>
                            <td><i class="fa fa-database"></i> `+e.bal+` </td>
                        </tr>
                    </table>
                        
                    </div>
                `);
            }
        });

        function xcreate(){
            alert('wallet services is currently not available at the moments ');
        };

        function createBTT(){
            var token = $("input[name=_token]").val();

            $.ajax({
                type: "post",
                url: "/client/create/wallet",
                data: {
                    _token:token
                },
                success: function (data){
                    console.log(data);
                    if(data.status == 'error'){
                        $(".error_msg").html(`
                            <div class="alert alert-danger">
                                <p class="text-danger">`+data.message+`</p>
                            </div>
                        `);
                    }else{
                        $(".error_msg").html(`
                            <div class="alert alert-success">
                                <p class="text-success">`+data.message+`</p>
                            </div>
                        `);
                    }
                },
                error: function (data){
                    console.log(data);
                    alert('fail to create wallet, try again !');
                }
            });
        }
    </script>
@endsection


