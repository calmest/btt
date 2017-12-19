<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/datepicker3.css" rel="stylesheet">
    <link href="/css/client-style.css" rel="stylesheet">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="position: absolute; margin-top: 0px;">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="/images/logo.png" class="img-circle" width="50%" height="50%" alt="">
            </div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li><a href="/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="/account/transaction"><em class="fa fa-calendar">&nbsp;</em> Transaction</a></li>
            <li><a href="/account/exchange"><em class="fa fa-bar-chart">&nbsp;</em> Exchange</a></li>
            <li><a href="/account/price-alert"><em class="fa fa-toggle-off">&nbsp;</em> Price Alert</a></li>
            <li><a href="/account/charts"><em class="fa fa-clone">&nbsp;</em> Charts</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Wallets <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="/account/btt-wallet" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> <i class="fa fa-bitcoin"></i> BTT 
                    </a></li>
                    <li><a class="/account/eth-wallet" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> <i class="fa fa-bitcoin"></i> ETH 
                    </a></li>
                    <li><a class="/account/btc-wallet" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> <i class="fa fa-bitcoin"></i> BTC 
                    </a></li>
                </ul>
            </li>
            <li><a href="#"><em class="fa fa-cog">&nbsp;</em> Setting </a></li>
            <li><a href="/admin/login"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->
        @yield('contents')
    </div>  <!--/.main-->
    @yield('scripts')
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/chart-data.js"></script>
    <script src="/js/easypiechart.js"></script>
    <script src="/js/easypiechart-data.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/custom.js"></script>
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
            });
        };
    </script>
        
</body>
</html>