@extends('__layouts.client-skin')

@section('title')
    BTT | Transactions
@endsection

@section('contents')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Exchange</li>
            <li class=""><span class="small">USD: <i class="fa fa-usd"></i> <span class="usd_bal">0.00</span></span></li>
            
        </ol>
    </div><!--/.row-->
    <!-- Main-Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Exchange History</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="lead text-center">
                    <p>Today's Exchange </p>
                    <div class="load-today-exchange"></div>
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Site Traffic Overview
                                    <ul class="pull-right panel-settings panel-button-tab-right">
                                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                            <em class="fa fa-cogs"></em>
                                        </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <ul class="dropdown-settings">
                                                        <li><a href="#">
                                                            <em class="fa fa-cog"></em> BTT/USD
                                                        </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">
                                                            <em class="fa fa-cog"></em> BTT/BTC
                                                        </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">
                                                            <em class="fa fa-cog"></em> BTT/ETH
                                                        </a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                                <div class="panel-body">
                                    <div class="canvas-wrapper">
                                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.row-->
                </div>

                <div class="col-sm-12">
                <h1 class="lead text-center">Trading Activities monitor's Here</h1>
                 
                <table class="table text-center">
                    <tbody>
                        <tr>
                            <td>
                                <button class="btn btn-default">Bid</button>
                                <br />
                                <table class="table text-center">
                                    <tbody>
                                        <tr>
                                            <td>Amount</td>
                                            <td>Price</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <button class="btn btn-default">Offer/Ask</button>
                                <br />
                                <table class="table text-center">
                                    <tbody>
                                        <tr>
                                            <td>Amount</td>
                                            <td>Price</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <!--// Main-Content-->
@endsection

@section('scripts')
    <script type="text/javascript">
        // scripts
    </script>
@endsection


