@extends('__layouts.skin')

@section('title')
	BTT | Create Account
@endsection


@section('contents')
	<!-- Main-Content -->
    <div class="main-w3layouts-form">
        <h2 class="sub-hdg-w3l">Create Account</h2>
        <!-- main-w3layouts-form -->
        <form action="/login/account" method="post">
            {{ csrf_field() }}
            <div class="fields-w3-agileits">
                <span class="fa fa-user" aria-hidden="true"></span>
                <input type="text" name="name" required="" placeholder="name" />
            </div>
            <div class="fields-w3-agileits">
                <span class="fa fa-envelope" aria-hidden="true"></span>
                <input type="text" name="email" required="" placeholder="email" />
            </div>
            <div class="fields-w3-agileits">
                <span class="fa fa-key" aria-hidden="true"></span>
                <input type="password" name="password" required="" placeholder="******" />
            </div>
            <div class="fields-w3-agileits">
                <span class="fa fa-phone" aria-hidden="true"></span>
                <input type="text" name="phone" pattern="[0-9]*" maxlength="11" required="" placeholder="000 000-000****" />
            </div>
            <div class="remember-section-wthree">
                <div class="clear"> </div>
            </div>
            <input type="submit" value="Create Account"  />
        </form>
        <br /><br />
        <input type="submit" value="Login Account" id="login-account" />
        <!--// main-w3layouts-form -->
        <!-- Social icons -->
        <div class="footer_grid-w3ls">
            <h5 class="sub-hdg-w3l">or Signup with your social profile</h5>
            <ul class="social-icons-agileits-w3layouts">
                <li><a href="#" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-google-plus"></a></li>
            </ul>
        </div>
        <!--// Social icons -->
    </div>
    <!--// Main-Content-->
@endsection


@section('scripts')
	<script type="text/javascript">
		$('#login-account').click(function (){

            // get form data
            var name  = $("input[name=name]").val();
            var email = $("input[name=email]").val();
            var pass  = $("input[name=password]").val();
            var phone = $("input[name=phone]").val();
            var token = $("input[name=_token]").val();

            // prepare object
            var data = {
                name:name
                email:email
                pass:pass
                phone:phone
                token:token
            };

            // send ajax request
            $.ajax({
                type: "post",
                url:  "/create/account",
                data: data,
                cache: false,
                success: function (data){
                    console.log(data);
                    if(data.status == 'error'){
                        // show error messages
                        $('.error-msg').html();
                    }else{
                        // redirect to home page
                        window.location.href = '/client/dashboard';
                    }
                },
                error: function (data){
                    alert('Fail to process login request');
                    console.log(data);
                }
            });

            return false;
        });
	</script>
@endsection


