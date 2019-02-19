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
					<form action="{{url('admin/roles', [$role->id])}}" method="POST">
						<input type="hidden" name="_method" value="PUT">
						@csrf
						<div class="form-group">
							<label class="form-label" for="field-1">Role Name</label>
							<span class="desc"></span>
							<div class="controls">
								<input type="text" class="form-control" name="name" value="{{ $role->name }}">
							</div>
						</div>

						<div class="form-group">
							<div class="text-right">
								<button type="submit" class="btn btn-outline-success btn-sm">Update Role</button>
								<a href="{{ route('roles.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
