<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div style="border:1px 1px 2px 1px #555;padding: 1em;">
		<h1>Account Activation</h1>
		<p>
			Dear {{ $data['name'] }}, <br /><br />

			Welcome to Bittruck, Thanks for registering with us, 
			please click <a href="localhost:8001/activation/by/email/?token={{ $data['token'] }}"> here </a> to verify your account. 

			<br /><br />

			You can also copy this code:<b>{{ $data['token'] }}</b> to activated your account.

			<br />
			Thanks

			<br /><br />
			Bittruck

		</p>
	</div>

</body>
</html>