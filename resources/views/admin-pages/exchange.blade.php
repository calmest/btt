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
				<button class="btn btn-default">
					<i class="fa fa-database"></i> BTT to 1USD: <i class="fa fa-usd"></i> 
				</button>
				<button class="btn btn-default">
					<i class="fa fa-database"></i> BTT to 1BTC: <i class="fa fa-btc"></i> 
				</button>
				<button class="btn btn-default">
					<i class="fa fa-database"></i> BTT to 1ETH: <i class="fa fa-database"></i> 
				</button>
			</div>
		</div>
		<div class="col-md-3">
			<div class="lead text-center">
				<p>Today's Trading Rate </p>
				<div class="small">
					<form class="btt-usd-rate" method="post" onsubmit="return setRateUSD()">
						<div class="form-group">
							<label>BTT to USD</label>
							<input type="number" name="rate" value="0.68363709" maxlength="15" required="" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-default">Set Today's Rate</button>
						</div>
					</form>
				</div>
				<hr />
				<div class="small">
					<form class="btt-usd-rate" method="post" onsubmit="return setRateBTC()">
						<div class="form-group">
							<label>BTT to BTC</label>
							<input type="number" name="rate" value="5.68363709" maxlength="15" required="" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-default">Set Today's Rate</button>
						</div>
					</form>
				</div>
				<hr />
				<div class="small">
					<form class="btt-usd-rate" method="post" onsubmit="return setRateETH()">
						<div class="form-group">
							<label>BTT to ETH</label>
							<input type="number" name="rate" value="2.68363709" maxlength="15" required="" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-default">Set Today's Rate</button>
						</div>
					</form>
				</div>
				<hr />
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		function setRateUSD() {
			// body...
			return false;
		}


		function setRateBTC() {
			// body...
			return false;
		}

		function setRateETH() {
			// body...
			return false;
		}
	</script>
@endsection