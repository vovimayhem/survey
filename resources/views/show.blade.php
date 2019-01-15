@extends('layouts.default')

@section('content') 
<div class="row">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	
	<form action="{{ url('management/locations') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label class="form-label" for="field-1">Name</label>
			<span class="desc"></span>
			<div class="controls">
				<input type="text" class="form-control" name="name">
			</div>
		</div>

		<div class="text-right">
			<button type="submit" class="btn btn-success">Save</button>
			<a href="{{ route('management.locations.index') }}" class="btn btn-danger">Cancel</a>
		</div>
	</form>
</div>
@endsection