@extends('__layouts.client-skin')

@section('title')
    BTT | Transactions
@endsection

@section('contents')
    <!-- Main-Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Transaction History</h1>
            </div>
        </div>
    </div>
    <!--// Main-Content-->
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#create-account').click(function (){
            window.location.href = '/create/account';
        });
    </script>
@endsection


