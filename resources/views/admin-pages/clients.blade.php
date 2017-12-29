@extends('__layouts.admin-skin')

@section('title')
    BTT Admin | Clients
@endsection


@section('contents')
<br />
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>S/N</th>
					<th>Name</th>
					<th>Email</th>
					<th>BTT Balance</th>
					<th>USD Balance</th>
					<th>BTC Balance</th>
					<th>ETH Balance</th>
					<th>Status</th>
					<th>Option</th>
				</thead>

				<tbody class="all-users"></tbody>
			</table>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		$.get('/admin/load/clients', function (e){
			$('.all-users').html('');
			var sn = 0;
			$.each(e, function (index, value){
				sn++;

				$('.all-users').append(`
					<tr>
						<td>`+sn+`</td>
						<td>`+value.name+`</td>
						<td>`+value.email+`</td>
						<td><i class="fa fa-database"></i> `+value.btt+` </td>
						<td><i class="fa fa-usd"></i> 0.0000000</td>
						<td><i class="fa fa-btc"></i> 0.0000000</td>
						<td><i class="fa fa-database"></i> 0.0000000</td>
						<td><span class="text-success">active</span></td>
						<td><a class="btn-link" href="#">freeze</a></td>
					</tr>
				`);
			})
		});
	</script>
@endsection