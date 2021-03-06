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
				<div class="card-header">URL Builder</div>
				<div class="card-body">
					<form method="POST" action="{{ url('admin') }}">
						@csrf

						<div class="form-group">
							<label class="form-label" for="field-1">Case #</label>
							<span class="desc"></span>
							<div class="controls">
								<input type="text" class="form-control" name="case_number">
							</div>
						</div>

						<div class="form-group">
							<label class="form-label" for="field-1">Language</label>
							<span class="desc"></span>
							<div class="controls">
								<select class="form-control input-sm m-bot15" name="lang">
									<option value="">--Choose a Language--</option>
									<option value="1">English</option>
									<option value="2">Spanish</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="text-right">
								<button type="submit" class="btn btn-outline-success btn-sm">Generate</button>
								<a href="{{ url('/admin') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
