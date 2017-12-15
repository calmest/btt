@extends('__layouts.skin')

@section('title')
    BTT | Login Account
@endsection

@section('contents')
	<br /><br /><br /><br /><br /><br />
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default" style="padding: 1em;">
				<div class="panel-heading">Admin Panel</div>
				<div class="panel-body">
					<form role="form" method="post" action="/admin/login">
						{{ csrf_field() }}
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="password" name="password" type="password" value="">
							</div>
							<hr />
							<div class="form-group">
								<input class="form-control" style="width: 100px;" placeholder="token" name="access_token" type="password" value=""> 
								<a href="/resend-token">resend token</a>
								<hr />
								<p><b>Note:</b> <span class="text-warning">check access code via sms/email</span></p>
							</div>
							<button class="btn btn-primary">Secured Login</button>
						</fieldset>
						<br />
						<p class="text-success">To many Login Attempt will fire hacklock for 24hrs</p>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
@endsection


@section('scripts')
    <script type="text/javascript">
        $('#create-account').click(function (){
            window.location.href = '/admin';
        });
    </script>
@endsection
