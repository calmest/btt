@extends('__layouts.admin-skin')

@section('title')
    BTT Admin | Notifications
@endsection

@section('contents')
<br />
	<div class="row">
		<div class="col-md-12">
			<h1>Notifications</h1>
		</div>
		<div class="col-md-12">
			<h1 class="lead">Incoming Loans Request</h1>
			<table class="table small">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Email</th>
						<th>BTT</th>
						<th>USD</th>
						<th>Amount</th>
						<th>Rate</th>
						<th>Interest</th>
						<th>Payback Date</th>
						<th>Date</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody class="load-loan-request"></tbody>
			</table>
		</div>

		<div class="col-md-12">
			<h1 class="lead">Accepted Loans Request</h1>
			<table class="table small">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Wallet id</th>
						<th>Amount</th>
						<th>Rate</th>
						<th>Interest</th>
						<th>Time Elapsed</th>
						<th>Total</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody class="load-accepted-request"></tbody>
			</table>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$.get('/load/loan/request', function(data) {
			/*optional stuff to do after success */
			console.log(data);
			var sn = 0;
			$(".load-loan-request").html();
			$.each(data, function(index, val) {
				/* iterate through array or object */
				sn++;
				$(".load-loan-request").html(`
					<tr>
						<td>`+sn+`</td>
						<td>`+val.email+`</td>
						<td>`+val.btt+`</td>
						<td>`+val.usd+`</td>
						<td>`+val.amount+`</td>
						<td>`+val.rate+`</td>
						<td>`+val.interest+`</td>
						<td>`+val.expired+`</td>
						<td>`+val.date+`</td>
						<td>
							<a class="btn-link small" href="/accept/loan/?id=`+val.id+`">Accept</a> -
							<a class="btn-link small" href="/reject/loan/?id=`+val.id+`">Reject</a>
						</td>
					</tr>
				`);
			});
		});

	</script>
@endsection




