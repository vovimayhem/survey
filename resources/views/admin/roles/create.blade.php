@extends('layouts.app')

@section('content')
<div class="container">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Role Form</div>
				<div class="card-body">
					<form method="POST" action="{{ url('admin/roles') }}">
						@csrf

						<div class="form-group">
							<label class="form-label" for="field-1">Role Name</label>
							<span class="desc"></span>
							<div class="controls">
								<input type="text" class="form-control" name="name">
							</div>
						</div>

						<div class="form-group">
							<div class="text-right">
								<button type="submit" class="btn btn-outline-success btn-sm">Create Role</button>
								<a href="{{ url('admin/roles') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
