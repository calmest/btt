@extends('__layouts.client-skin')

@section('title')
    BTT | Price Alert
@endsection

@section('contents')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Price Alert</li>
            <li class=""><span class="small">USD: <i class="fa fa-usd"></i> <span class="usd_bal">0.00</span></span></li>
            
        </ol>
    </div><!--/.row-->
    
    <!-- Main-Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lead">Set a Price Alert</h1>
                <hr />
            </div>
            <div class="col-md-6 col-md-offset-3">
                <form>
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label> <i class="fa fa-usd"></i> Price</label><br />
                        </div>
                        <div class="form-group">
                            <input type="text" name="sms" pattern="[0-9]*" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default"><i class="fa fa-lock"></i> Send Verification Code</button>
                        </div>
                    </div>
                    </div>
                </form>
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


