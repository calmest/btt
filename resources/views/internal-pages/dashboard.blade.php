@extends('__layouts.client-skin')

@section('title')
    Client Dashboard | Dashboard
@endsection

@section('contents')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->
	<div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>BTC Wallet</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-btc"></i> 0.00336545</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>BTT Wallet</h2>
                   	<div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> 0.23653562</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>USD Wallet</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-usd"></i> 580.00</div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <br />
                    <h2>ETH Wallet</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> 0.000000</div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    XBTC/BTT
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                            <em class="fa fa-cogs"></em>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 1
                                        </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 2
                                        </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 3
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
    
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>XBTC/USD</h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>XBTC/BTT</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>XBTC/ETH</h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>XBTC/ZMR</h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
@endsection

@section('scripts')


@endsection