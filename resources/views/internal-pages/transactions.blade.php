@extends('__layouts.client-skin')

@section('title')
    BTT | Transactions
@endsection

@section('contents')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Transaction</li>
            <li class=""><span class="small">USD: <i class="fa fa-usd"></i> <span class="usd_bal">0.00</span></span></li>
            
        </ol>
    </div><!--/.row-->
    <!-- Main-Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lead">Transaction History</h1>
            </div>
            <div class="col-md-6">
                <hr>
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>type</th>
                            <th>amount</th>
                            <th>rate</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="transaction-card"></tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <h1 class="lead">Payments Logs</h1>
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
    <script type="text/javascript">
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
                $('.transaction-card').append(`
                    <tr>
                        <td>`+sn+`</td>
                        <td>`+val.type+`</td>
                        <td>`+val.amount+`</td>
                        <td>`+val.rate+`</td>
                        <td>`+val.created_at+`</td>
                    </tr>
                `);
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
                $('.payments-card').append(`
                    <tr>
                        <td>`+sn+`</td>
                        <td>`+val.from+`</td>
                        <td>`+val.to+`</td>
                        <td>`+val.amount+`</td>
                        <td>`+val.created_at+`</td>
                    </tr>
                `);
            });

        });
    </script>
@endsection


