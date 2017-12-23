
@extends('__layouts.admin-skin')

@section('title')
    BTT Admin | Vault
@endsection


@section('contents')
<br />
	<div class="row">
		<div class="col-md-12">
			<h1>ALL ADMIN VAULT </h1>
			<hr />

			<div class="row">
				<div class="col-md-4">
					<h3>Upload Asset</h3>
					<div class="error_msg"></div>
					<div class="success_msg"></div>

					<form id="add-form" method="post" onsubmit="return addToBtt()">
						{{ csrf_field() }}
						<div class="form-group">
							<select name="type" id="type" class="form-control">
								<option value="btt">BTT</option>
								<option value="btt_classic">BTT Classic</option>
							</select>
						</div>
						<div class="form-group">
							<input id="amount" type="numeric" class="form-control" name="amount" placeholder="0.00000000" required="">
						</div>

						<div class="form-group">
							<button class="btn btn-info col-md-6">ADD TO BTT VAULT</button>
						</div>
					</form>
					<br />
				</div>
				<div class="col-md-6">
					<h3>Crypto Assets</h3>
					<table class="table"> 
						<thead>
							<tr>
								<th>S/N</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Exchange Rate</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody class="assets"></tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<!-- All javascripts here -->
	<script type="text/javascript">
		function addToBtt()
		{
			var type   = $("#type").val();
			var amount = $("#amount").val();
			var token  = $("input[name=_token]").val();

			var data = {
				type:type,
				amount:amount,
				_token:token
			};

			$.ajax({
				type: "POST",
				url: "/admin/update/vault",
				data:data,
				success: function (data){
					// console.log(data);
					if(data.status == 'success'){
						$('.success_msg').html(`
							<p class="text-success">`+data.message+`</p>
						`);
					}else{
						$('.error_msg').html(`
							<p class="text-danger">`+data.message+`</p>
						`);
					}
					$("#add-form")[0].reset();
				},
				error: function (data){
					alert('fail to send request to add vault balance !');
				}
			});

			return false;
		}
	</script>
@endsection