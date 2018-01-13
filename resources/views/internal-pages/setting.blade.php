@extends('__layouts.client-skin')

@section('title')
    BTT | Account Setting
@endsection

@section('contents')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Setting</li>
            <li class=""><span class="small">USD: <i class="fa fa-usd"></i> <span class="usd_bal">0.00</span></span></li>
            
        </ol>
    </div><!--/.row-->
    <!-- Main-Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lead">Account Setting</h1>
                <hr />
                <div class="row">
                    <div class="col-md-5">
                        <h1 class="lead">Change Password</h1>
                        <form>
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" name="passA" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" name="passB" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default"><i class="fa fa-lock"></i> Update password</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-5">
                        <h1 class="lead">2Factor Authentication</h1>
                        <form>
                            <div class="form-group">
                                <label class="sms">Mobile</label>
                                <input type="text" name="sms" pattern="[0-9]*" required="" placeholder="+234" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default"><i class="fa fa-lock"></i> Send Verification Code</button>
                            </div>
                        </form>
                    </div>
                </div>
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


