<!DOCTYPE HTML>
<html>

<head>
    <title>@yield('title')</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="BTT Crypto, Get instant wallets and exchange BTC for BTT, Supported 24/7 withdraw and deposit.."
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
    <link rel="icon" href="/images/ico-set.png">
    
    <!-- jQuery library -->
    <script src="/js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
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
<style type="text/css">
    html body {
        font-size: 12px;
    }
    .ico-set {
        position: absolute;
        top: 2px;
        width: auto;
        height: auto;
    }
</style>
<body>
    <!-- Navigation -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top" style="background-color: rgba(000,000,000,0.50);">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="/"> 
                <img src="/images/ico-set.png" class="ico-set">
            </a> 
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right" style="color:gold;">
            <!-- <li><a href="#contact-section" class="page-scroll"><i class="fa fa-money"></i> Wallet</a></li> -->
            <li><a href="#home" class="page-scroll"><i class="fa fa-copy"></i> <span style="color: gold;">GET A FREE WALLET</span></a></li>
            <li><a href="javascript:void(0);" class="page-scroll"><i class="fa fa-usd"></i> 
                <span style="color: gold;"><span class="btx-usd"></span> 1BTC-USD </span></a>
            </li>
            <li><a href="javascript:void(0);" class="page-scroll"><i class="fa fa-btc"></i> 
                <span style="color: gold;">0.0000008 1BTC-BTT</span></a>
            </li>
            <li><a href="/create/account" class="page-scroll"><i class="fa fa-sign-in"></i> <span style="color: gold;">SIGN UP</span></a></li>
            <li><a href="/login/account" class="page-scroll"><i class="fa fa-sign-out"></i> <span style="color: gold;">LOGIN</span></a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
    <!--background-->
    <br /><br />
    <!-- Main-Content -->
    @yield('contents')

    <div class="">
        
    </div>
    <!--// Main-Content-->
    <!-- copyright -->
    <div class="copyright-w3-agile">
        <p>&copy; 2017 BTT All Rights Reserved</p>
    </div>
    <!--// copyright -->
    <!--//background-->
    @yield('scripts')
    <!-- <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script> -->
    <script type="text/javascript">
        $.get('/api/load/exchange', function (data){
            // console.log(data);
            $('.btx-usd').text(data.buy);
        });

        var refreshfeeds = function (){
            $.get('/api/load/exchange', function (data){
                // console.log(data);
                $('.btx-usd').text(data.buy);
            });
        };

        setInterval(refreshfeeds, 1000 * 30);
    </script>
</body>

</html>