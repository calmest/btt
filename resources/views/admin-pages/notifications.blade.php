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
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$.get('/load/loan/request', function(data) {
			/*optional stuff to do after success */
			console.log(data);
		});
	</script>
@endsection