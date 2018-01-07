@extends('__layouts.admin-skin')

@section('title')
    BTT Admin | Exchange
@endsection


@section('contents')
<br />
	<div class="row">
		<div class="col-md-12">
			<h1>Today's Exchange</h1>
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
						BTT Currency Exchange Traffic Overview
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
		<div class="col-md-3">
			<div class="lead text-center">
				<p>Today's Trading Rate </p>
				<div class="small">
					<form class="btt-usd-rate" method="post" onsubmit="return setRate()">
						{{ csrf_field() }}
						<div class="form-group">
							<label>BTT to USD</label>
							<input type="text" name="btt_usd" value="0.683637" maxlength="15" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>BTT to BTC</label>
							<input type="text" name="btt_btc" value="5.683637" maxlength="15" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>BTT to ETH</label>
							<input type="text" name="btt_eth" value="2.683637" maxlength="15" required="" class="form-control">
						</div>

						<div class="form-group">
							<button class="btn btn-default">Set Today's Rate</button>
						</div>

						<div class="success_msg"></div>
						<div class="error_msg"></div>
					</form>
				</div>
				<hr />
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		function setRate() {
			// body...
			var token   = $("input[name=_token]").val();
			var bttUSD  = $("input[name=btt_usd]").val();
			var bttBTC  = $("input[name=btt_btc]").val();
			var bttETH  = $("input[name=btt_eth]").val();

			// data to json
			var data = {
				_token:token,
				btt_usd:bttUSD,
				btt_btc:bttBTC,
				btt_eth:bttETH
			}

			// send ajax
			$.ajax({
				url: '/admin/upload/rate',
				type: 'post',
				dataType: 'json',
				data: data,
				success: function (data){
					console.log(data);
					if(data.status == 'success'){
						$(".success_msg").html(`
							<p class="text-success">`+data.message+`</p>
						`);
					}else{
						$(".error_msg").html(`
							<p class="text-danger">`+data.message+`</p>
						`);
					}
					// $(".btt-usd-rate")[0].reset();

					$(".success_msg").fadeOut(9000);
					refreshExchangeRate();
				},
				error: function (data){
					console.log(data);
					alert('Error, Fail to send request');
				}
			});

			return false;
		}

		$.get('/admin/load/exchange', function(data) {
			/*optional stuff to do after success */
			console.log(data);
			$(".load-today-exchange").html('');
			$.each(data, function(index, val) {
				/* iterate through array or object */
				$(".load-today-exchange").html(`
					<button class="btn btn-default">
						<i class="fa fa-database"></i> BTT to 1USD: <br /><br /><i class="fa fa-usd"></i> `+val.btt_usd+`
					</button>
					<button class="btn btn-default">
						<i class="fa fa-database"></i> BTT to 1BTC: <br /><br /><i class="fa fa-btc"></i> `+val.btt_btc+`
					</button>
					<button class="btn btn-default">
						<i class="fa fa-database"></i> BTT to 1ETH: <br /><br /><i class="fa fa-database"></i> `+val.btt_eth+`
					</button>
				`);
			});
		});

		function refreshExchangeRate(){
			$.get('/admin/load/exchange', function(data) {
				/*optional stuff to do after success */
				console.log(data);
				$(".load-today-exchange").html('');
				$.each(data, function(index, val) {
					/* iterate through array or object */
					$(".load-today-exchange").html(`
						<button class="btn btn-default">
							<i class="fa fa-database"></i> BTT to 1USD: <br /><br /><i class="fa fa-usd"></i> `+val.btt_usd+`
						</button>
						<button class="btn btn-default">
							<i class="fa fa-database"></i> BTT to 1BTC: <br /><br /><i class="fa fa-btc"></i> `+val.btt_btc+`
						</button>
						<button class="btn btn-default">
							<i class="fa fa-database"></i> BTT to 1ETH: <br /><br /><i class="fa fa-database"></i> `+val.btt_eth+`
						</button>
					`);
				});
			});
		}
	</script>
@endsection



