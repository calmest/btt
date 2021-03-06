<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/datepicker3.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- Added jquery -->
    <!-- <script src="/js/jquery.js"></script> -->
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span style="color: gold;">BTT</span></a>
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">3 mins ago</small>
                                        <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">1 hour ago</small>
                                        <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="/images/logo.png" class="img-circle" width="50%" height="50%" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">BTT Alpha</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li><a href="javascript:void(0);"><i class="fa fa-database"></i> <span class="asset-bal"></span></a></li>
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/notifications"> <i class="fa fa-bell"></i>   Notifications <span class="total_loans"></span></a></li>
            <li><a href="/admin/clients">  <i class="fa fa-users"></i> Clients  <span class="total_clients"></span></a></li>
            <li><a href="/admin/wallets">   <i class="fa fa-copy "></i> Wallets</a></li>
            <li><a href="/admin/exchange"> <i class="fa fa-line-chart"></i> Exchange</a></li>
            <li><a href="/admin/loans">    <i class="fa fa-navicon"></i> Loans (Lending)</a></li>
            <li><a href="/admin/payments"> <i class="fa fa-money"></i> Payments</a></li>
            <li><a href="/admin/transaction"> <i class="fa fa-cog"></i> Transaction & API</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-bank">&nbsp;</em> VAULTS <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="/admin/vaults/1">
                        <span class="fa fa-arrow-right">&nbsp;</span> BTC VUALT
                    </a></li>
                    <li><a class="" href="/admin/vaults/2">
                        <span class="fa fa-arrow-right">&nbsp;</span> BTT VUALT
                    </a></li>
                    <li><a class="" href="/admin/vaults/3">
                        <span class="fa fa-arrow-right">&nbsp;</span> USD VUALT
                    </a></li>
                </ul>
            </li>
            <li><a href="/admin/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        
        @yield('contents')
        
    </div>  <!--/.main-->
    @yield('scripts')
    
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/chart-data.js"></script>
    <script src="/js/easypiechart.js"></script>
    <script src="/js/easypiechart-data.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/custom.js"></script>
    <script>
        $.get('/admin/load/vault', function (data){
            // console.log(data);
            $(".assets").html('');
            $.each(data, function (index, value){
                $(".assets").append(`
                    <tr>
                        <td>`+value.id+`</td>
                        <td>`+value.type+`</td>
                        <td>`+value.amount+`</td>
                        <td>`+value.rate+`</td>
                        <td>`+value.date+`</td>
                    </tr>
                `);
                $(".asset-bal").text(value.amount);
            });
        });

        // Count no of signed up clients
        $.get('/load/count/clients', function(client) {
            /*optional stuff to do after success */
            console.log(client);
            $('.total_clients').html(`
                (`+client.total_clients+`)
            `);
        });

        // Count no loan request
        $.get('/load/count/loans', function(loan) {
            /*optional stuff to do after success */
            console.log(loan);
            $('.total_loans').html(`
                (`+loan.total_loans+`)
            `);
        });


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