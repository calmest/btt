@extends('__layouts.skin')

@section('title')
    BTT | Login
@endsection

@section('contents')
    <!-- Main-Content -->
    <div class="main-w3layouts-form">
        <h2 class="sub-hdg-w3l">Create Account</h2>
        <form action="/login/account" method="post">
            {{ csrf_field() }}
            <div class="fields-w3-agileits">
                <span class="fa fa-user" aria-hidden="true"></span>
                <input type="text" name="email" required="" placeholder="email" />
            </div>
            <div class="fields-w3-agileits">
                <span class="fa fa-key" aria-hidden="true"></span>
                <input type="password" name="password" required="" placeholder="******" />
            </div>
            <div class="remember-section-wthree">
                <ul>
                    <li>
                        <label class="anim">
                            <input type="checkbox" class="checkbox">
                            <span> Remember me ?</span> 
                        </label>
                    </li>
                    <li> <a href="#">Forgot password?</a> </li>
                </ul>
                <div class="clear"> </div>
            </div>
            <input type="submit" value="Login" />
            <br />
            @if(session('error-status'))
                <p class="text-danger">{{ session('error-status') }}</p>
            @endif
        </form>
        <br /><br />
        <!-- Social icons -->
        <div class="footer_grid-w3ls">
            <h5 class="sub-hdg-w3l">or login with your social profile</h5>
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
        $('#create-account').click(function (){
            window.location.href = '/create/account';
        });
    </script>
@endsection


