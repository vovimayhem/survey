@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="box-body">
				<div class="form-group">
					Filters:
					<a href="/admin?filter=en">English</a> |
					<a href="/admin?filter=es">Spanish</a> |
					<a href="/admin?filter=newest">Newest</a> |
					<a href="/admin?filter=oldest">Oldest</a> |
					<a href="/admin">Clear</a> |
				</div>

				<div class="form-group">
					<form action="{{ route('search') }}" method="get" class="form-inline">
						<div class="form-group">
							<input type="text" class="form-control" name="input_search" placeholder="Case #">
						</div>

						<div class="form-group" align="rigth">
							<button class="btn btn-primary" type="submit">Search</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header">
					<div class="card-header">
						<div class="text-center">
							<h3>Survey results</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<td>Case #</td>
								<td>Q1</td>
								<td>Q2</td>
								<td>Q3</td>
								<td>Q4</td>
								<td>Q5</td>
								<td>Language</td>
								<td>Feedback</td>
								<td>Status</td>
								<td>Created At</td>
								<td>Updated At</td>
							</tr>
						</thead>
						<tbody>
							@foreach($results as $result)
							<tr>
								<td><a href="{{ url('admin/result/show', $result->id)}}"> {{ $result->case_number }}</a></td>
								<td>{{$result->question1}}</td>
								<td>{{$result->question2}}</td>
								<td>{{$result->question3}}</td>
								<td>{{$result->question4}}</td>

								@if($result->question5 == 'True')
								<td>True</td>
								@else
								<td>False</td>
								@endif

								@if($result->language == 'es')
								<td>Spanish</td>
								@else
								<td>English</td>
								@endif

								<td>{{ $result->feedback }}</td>
								<td>{{ $result->status }}</td>
								<td>{{ $result->created_at->format('F d, Y') }}</td>
								<td>{{ $result->updated_at->format('F d, Y') }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	{!! $results->appends(Request::except('page'))->render() !!}
</div>
@endsection
