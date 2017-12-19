@extends('__layouts.skin')

@section('title')
	BTT | Create Account
@endsection

@section('contents')
	<!-- Main-Content -->
    <div class="main-w3layouts-form">
        <h2 class="sub-hdg-w3l">Create Account</h2>
        <!-- main-w3layouts-form -->
        <form method="post" id="signup-form" onsubmit="return checkClient()" >
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
            <div class="remember-section-wthree">
                <div class="clear"> </div>
            </div>
            <button id="create-account" style="padding: 0.8em;border-radius: 5px;">Create Account</button>
            <br /><br /><br />
            <div class="error-msg"></div>
            <div class="success-msg"></div>
        </form>
        <br /><br />

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
    <script type="text/javascript">
        function checkClient()
        {
            // get form data
            var name  = $("input[name=name]").val(); 
            var email = $("input[name=email]").val();
            var pass  = $("input[name=password]").val();
            var token = $("input[name=_token]").val();

            // prepare object
            var data = {
                _token:token,
                name:name,
                email:email,
                pass:pass
            };

            // send ajax request
            $.ajax({
                type: "post",
                url:  "/create/account",
                data: data,
                cache: false,
                success: function (data){
                    // console.log(data);
                    if(data.status == 'error'){
                        // show error messages
                        $('.error-msg').html(`
                            <div class="alert alert-danger">
                                <p class="text-danger">`+data.message+`</p>
                            </div>
                        `);
                    }

                    if(data.status == 'success'){
                        // alert('seen !');
                        // show error messages
                        $('.success-msg').html(`
                            <div class="alert alert-success">
                                <p class="text-success">`+data.message+`</p>
                                <p class="text-success">Click <a href="/">Here </a> to Login </p>
                            </div>
                        `);
                    }
                },
                error: function (data){
                    alert('Fail to process login request');
                    console.log(data);
                },
                then: function (){
                    
                }
            });

            return false;
        }
    </script>
@endsection

@section('scripts')
	
@endsection


