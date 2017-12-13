<!DOCTYPE HTML>
<html>

<head>
    <title>BTT</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Groovy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
    />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Font-Awesome-CSS -->
        <link href="/css/font-awesome.css" rel="stylesheet">
    <!--// Font-Awesome-CSS -->
    <!-- Required Css -->
        <link href="/css/style.css" rel='stylesheet' type='text/css' />
    <!--// Required Css -->
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!--//fonts-->
</head>

<body>
    <!-- Navigation -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top" style="background-color: rgba(000,000,000,0.50);">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/"> <img src="/public/img/logo.png" width="70" height="30" alt="BTT"></a> </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right" style="color:gold;">
            <!-- <li><a href="#contact-section" class="page-scroll"><i class="fa fa-money"></i> Wallet</a></li> -->
            <li><a href="#home" class="page-scroll"><i class="fa fa-user"></i> Instant Funds on Wallet</a></li>
            <li><a href="#home" class="page-scroll"><i class="fa fa-btc"></i> NGN/1BTC &#8358;</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
    <!--background-->
    <h1>BTT Login</h1>
    <!-- Main-Content -->
    <div class="main-w3layouts-form">
        <h2 class="sub-hdg-w3l">Login to your account</h2>
        <!-- main-w3layouts-form -->
        <form action="/login/account" method="post">
            {{ csrf_field() }}
            <div class="fields-w3-agileits">
                <span class="fa fa-user" aria-hidden="true"></span>
                <input type="text" name="email" required="" placeholder="email" />
            </div>
            <div class="fields-w3-agileits">
                <span class="fa fa-key" aria-hidden="true"></span>
                <input type="password" name="email" required="" placeholder="******" />
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
        </form>
        <br /><br />
        <input type="submit" value="Create Account" />
        <!--// main-w3layouts-form -->
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
    <!-- copyright -->
    <div class="copyright-w3-agile">
        <p>&copy; 2017 BTT All Rights Reserved</p>
    </div>
    <!--// copyright -->
    <!--//background-->

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>